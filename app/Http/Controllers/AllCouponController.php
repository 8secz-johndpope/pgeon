<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Helper;
use App\LocalCoupon;
use App\LocalCouponUsage;
use Cartalyst\Stripe\Stripe;

class AllCouponController extends Controller {

    /**
     * Show the homepage
     * @return View
     */
    public function apply($coupon) {

        $user = Auth::user();
        if (!$user) {
            abort(403, 'Access denied');
        }
        if($user->subscribed('main')) {
            return response()->json(array('error' => 'Already subscribed to a plan.'), 403);
        }  
       
        //check if there is a coupon for that id
        $lc = LocalCoupon::where('coupon_code', $coupon)->first();
        if($lc) {
            if($lc->coupon_validity <  date('Y-m-d')) {
                return response()->json(array('error' => 'This coupon expired.'), 403);
            }
            //fetch the redeemed count
            $lc_count = LocalCouponUsage::where('coupon_id', $lc->id)->count();
            if($lc_count >= $lc->max_redemptions) {
                return response()->json(array('error' => 'Maximum coupon redemption limit reached.'), 403);
            }

            //everythin ok..
            return response()->json(array('data' => $coupon, 'type' => 'local', 'local_coupon_id' => $lc->id));
        }else {
               //try it in stripe
               
               $stripe = new Stripe(env('STRIPE_SECRET'), env('STRIPE_API_VERSION'));
               //$obj = $stripe->coupons()->find($coupon);
               $coupons = $stripe->coupons()->all();
               $obj = null;

               foreach($coupons["data"] as $key => $c)
               {
                   if($c['id'] == $coupon) {
                        $obj = $c;
                   }
               }
               if(!$obj) {
                   return response()->json(array('error' => 'This coupon is invalid.'), 403);
               }
          

               if(($obj['max_redemptions'] > 0 ) && ($obj['times_redeemed'] >=  $obj['max_redemptions']) ) {
                return response()->json(array('error' => 'Maximum coupon redemption limit reached.'), 403);
            }


                if(!$obj['valid']) {
                return response()->json(array('error' => 'This coupon is invalid.'), 403);
               }


            return response()->json(array('data' => $coupon, 'type' => 'stripe', 'local_coupon_id' => 0));
        }
               
       
    }


    /** we insert the local coupon in this table so membership is correctly fetched uniformly for stripe and non stripe coupons */

    public function subscribe($coupon_id) {
        $user = Auth::user();
        if (!$user) {
            abort(403, 'Access denied');
        }
        if($user->subscribed('main')) {
            return response()->json(array('error' => 'Already subscribed to a plan.'), 403);
        }  

        $plan = "main";
        $stripe_plan = "pgeon_yearly";

        DB::table('subscriptions')->insert([
            ['name' =>  $plan, 'stripe_plan' => $stripe_plan, 'user_id' => $user->id, 'created_at' => time(),  'updated_at' => time()],
        ]);

        $lc = new LocalCouponUsage();
        $lc->coupon_id = $coupon_id;
        $lc->user_id = $user->id;
        $lc->save();



        $user->role_id = 3;
        $user->save();

        return response()->json(array('success' => 'Subscription is completed.'));
    }
   
}
