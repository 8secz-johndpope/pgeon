<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Cartalyst\Stripe\Stripe;

use App\LocalCoupon;
use App\LocalCouponUsage;

use App\User;

use Validator;
use HTML;

class VoyagerCouponController
{
    public function index()
    {
      
      $coupons = null;
      $stripe = new Stripe(env('STRIPE_SECRET'), env('STRIPE_API_VERSION'));
      
      $coupons = $stripe->coupons()->all();

     // SELECT local_coupons.*, count(1) AS redeem_count FROM `local_coupons` INNER JOIN local_coupon_usages on local_coupons.id = local_coupon_usages.coupon_id
//GROUP by coupon_id
    
   //   $local_coupons = LocalCoupon::all();
      
   $local_coupons =  DB::select("SELECT local_coupons.*, count(1) AS redeem_count FROM `local_coupons` LEFT JOIN local_coupon_usages on local_coupons.id = local_coupon_usages.coupon_id
   GROUP by coupon_id");


       return view('voyager.coupons.index', ['coupons' => $coupons['data'], 'local_coupons' => $local_coupons, 'page_title' => 'Coupons', 'sort' =>'new']);
    }

    public function create()
    {
      return view('voyager.coupons.add');

    }

    public function beneficiaries($id) {
      $lcu = DB::table('local_coupon_usages')
            ->join('users', 'users.id', '=', 'local_coupon_usages.user_id')
            ->where('coupon_id',$id)
            ->select('users.id', 'users.email', 'users.slug' , 'users.role_id')
            ->get();

     
      return view('voyager.coupons.beneficiaries', ['users' => $lcu]);
    }



    public function stripDown($user_id) {
      $user = User::find($user_id);


      DB::table('subscriptions')->where('user_id', $user_id)->delete();

      $user->role_id = 2;
      $user->save();
      return back()->with('success','Subscription is completed.');
    }
   


    public function ins()
    {
   


      $cv = Input::get('coupon_validity');
      LocalCoupon::create([
        'coupon_code' => Input::get('coupon_code'),
        'description' => Input::get('description'),
        'max_redemptions' => Input::get('max_redemptions'),
        'coupon_validity' => $cv]);

        return redirect('admin/coupons');
      
    }


      public function edit($id)
      {
        $question = Question::find($id);
        return view('voyager.questions.edit', ['question' => $question]);

      }


      

      public function publish($id)
      {
        $question = Question::find($id);
        $question->published_at = gmdate("Y-m-d H:i:s");
        $question->save();

        return view('voyager.questions.edit', ['question' => $question]);

      }

      public function show($id)
      {
        $stripe = new Stripe(env('STRIPE_SECRET'), env('STRIPE_API_VERSION'));

          $coupon = $stripe->coupons()->find($id);
      
//dd($coupon);              //$question = Question::find($id);
              //return view('voyager.questions.show', ['question' => $question]);
      

      }


      public function destroy($id)
    	{
        
        LocalCouponUsage::where('coupon_id',$id)->delete();
        
        // delete
    		$question = LocalCoupon::find($id);
        $question->delete();


    		// redirect
    		Session::flash('message', 'Successfully deleted the coupon!');
        return redirect('admin/coupons');
    	}



}
