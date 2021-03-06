<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use App\Question;
use App\User;
use App\UserFollowing;
use Helper;
use Jenssegers\Agent\Agent;
use Twilio;


class HomeController extends Controller {

    /**
     * Show the homepage
     * @return View
     */
    public function index() {
        //if we change soemthing here it should be changed in Questioncontroller index as well

        

        $agent = new Agent();

        if(Auth::user()) {
            $show = 'questions';
        }else {
            if($agent->isMobile()) {
                $show = 'questions';
            }else {
                $show = 'desktop';
            }
        }
        if($show == 'questions') {

            $eligible_to_ask = false;
            if(Auth::user()) {
                $eligible_to_ask = User::eligible_to_ask();
            }
    
            return view('questions.index',['eligible_to_ask' => $eligible_to_ask]);

        }else {
            return view('desktop.index' );
        }

      
    }

    public function sendsms(Request $request) {


         $message =  $request->get('message');

         $num =  $request->get('num');

         //'+917418414091'
       //  echo $num; 
        Twilio::message($num, $message);


    }
    public function desktop(Request $request) {
        return view('desktop.index' );
    }

    public function cpwd(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not match with the one provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New password cannot be same as your current password. Please choose a different password.");
        }
      /*  $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);*/

        $this->validate($request, [ 'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password successfully changed!");
    }



    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }

    public function followers() {
      $current_user = Auth::user()->id;

      $iam_following1 = UserFollowing::where('followed_by', '=', $current_user)->get();
      $my_followers1 = UserFollowing::where('user_id', '=', $current_user)->get();
      $iam_following = array();

      foreach( $iam_following1 as $value ) {



          $avatar =  Helper::avatar($value->user->avatar);

          $lq_created_at = User::get_last_posted_timestamp($value->user->id);
          $convo_count_between = User::fetchConvoCountBetween($current_user, $value->user->id);
          $iam_following[] = array('user_id' => $value->user_id, 'name' => $value->user->name, 'last_posted' => Helper::user_posted_since($lq_created_at), 'avatar' =>  $avatar, 'url' => $value->user->slug , 'convo_count' => $convo_count_between);

      }
      $my_followers = array();
      foreach( $my_followers1 as $value ) {
          $follower = User::find($value->followed_by);

            $avatar =  Helper::avatar($follower->avatar);
            $lq_created_at = User::get_last_posted_timestamp($follower->id);
            $replies_count = User::fetchRepliesCount($current_user, $follower->id);
            $my_followers[] = array('user_id' => $follower->id, 'name' => $follower->name, 'last_posted' => Helper::user_posted_since($lq_created_at), 'avatar' => $avatar, 'url' => $follower->slug , 'convo_count' => $replies_count);
      }

    return response()->json(['iam_following' => $iam_following,
                              'my_followers' => $my_followers,
                              'iam_following_count' => $iam_following1->count(),
                              'my_followers_count' => $my_followers1->count()]);

    }

    public function people() {
        return view('people');
    }


    public function search(Request $request) {
        $current_user = Auth::user()->id;
        $q = $request->input('q');
        $users = array();
        $msg = '';
        if (isset($q)) {
        //  //  ['role_id', '=', '3'],
        		 $sql = "SELECT users.*,  user_followings.id as af  FROM users
        		 				 LEFT JOIN user_followings ON users.id = 	user_followings.user_id
        		 				 AND user_followings.followed_by = $current_user
                              WHERE (slug LIKE '%$q%' OR name LIKE '%$q%') ";

    			 $results = DB::select( DB::raw($sql) );
        		//$results = User::where( [['name', 'LIKE',  "%$q%"]])->orWhere([['slug', 'LIKE',  "%$q%"]]);->get();


        if ($results) {

        foreach ($results as $value) {

          //skip the current user in search
          if($value->id == $current_user)
            continue;
          //if he is a member and has a slug..search will give us role 3 anyway
          if($value->name )
            $value->nameorslug = $value->name;
          else
            $value->nameorslug = $value->slug;


          if ($value->role_id == 2 ) {
            $value->last_posted =  'Is not a Pgeon member';
          }else {
            $value->last_posted =  Helper::user_posted_since(User::get_last_posted_timestamp($value->id));
          }




//           if($value->user_following) {
//           foreach ($value->user_following as $uf) {

//               if ($uf->followed_by ==  Auth::user()->id)  {
//                 $af = true;
//                 continue;
//               }
//           }
//           }
          $users[] = array('obj' => $value);
        }
        }else {
        	$msg = 'No one out there like that it seems!';

        	}
        }



        return view('search',['users' => $users, 'msg' => $msg, 'q' => $q]);
    }
}
