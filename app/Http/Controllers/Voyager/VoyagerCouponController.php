<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Cartalyst\Stripe\Stripe;

use App\Answer;
use App\Question;
use App\Tag;
use Validator;
use HTML;

class VoyagerCouponController
{
    public function index()
    {

      $stripe = new Stripe(env('STRIPE_SECRET'), env('STRIPE_API_VERSION'));

      $coupons = $stripe->coupons()->all();

       return view('voyager.coupons.index', ['coupons' => $coupons['data'], 'page_title' => 'Coupons', 'sort' =>'new']);
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
      
dd($coupon);              //$question = Question::find($id);
              //return view('voyager.questions.show', ['question' => $question]);
      

      }


      public function destroy($id)
    	{
    		// delete
    		$question = Question::find($id);
        $question->delete();
    		// redirect
    		Session::flash('message', 'Successfully deleted the question!');
    		return Redirect::to('voyager.questions.index');
    	}



      public function update($id)
    {
        $rules = array(
            'question'       => 'required',

        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->route('questions.edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $question = Question::find($id);
            $question->question       = Input::get('question');
            $question->status      = Input::get('status');
            $question->featured      = Input::get('featured');
            $question->save();

            // redirect
            Session::flash('message', 'Question Successfully updated!');
            return redirect()->route('questions.index');
        }
    }
}
