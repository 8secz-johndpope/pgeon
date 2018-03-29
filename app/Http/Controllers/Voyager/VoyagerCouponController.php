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
use Validator;
use HTML;

class VoyagerCouponController
{
    public function index()
    {
      
      $coupons = null;
      $stripe = new Stripe(env('STRIPE_SECRET'), env('STRIPE_API_VERSION'));
      
      $coupons = $stripe->coupons()->all();

    
      $local_coupons = LocalCoupon::all();
      
       return view('voyager.coupons.index', ['coupons' => $coupons['data'], 'local_coupons' => $local_coupons, 'page_title' => 'Coupons', 'sort' =>'new']);
    }

    public function create()
    {
      return view('voyager.coupons.add');

    }


    public function ins()
    {
   

      LocalCoupon::create([
        'coupon_code' => Input::get('coupon_code'),
        'description' => Input::get('description'),
        'max_redemptions' => Input::get('max_redemptions'),
        'coupon_validity' => Input::get('coupon_validity')]);

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
    		// delete
    		$question = LocalCoupon::find($id);
        $question->delete();
    		// redirect
    		Session::flash('message', 'Successfully deleted the coupon!');
        return redirect('admin/coupons');
    	}



}
