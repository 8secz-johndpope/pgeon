<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Question;
use App\User;
use App\UserFollowing;
use Helper;
class HomeController extends Controller {

    /**
     * Show the homepage
     * @return View
     */
    public function index() {
        $uf = array();
        if(Auth::user()) {
            $uf = UserFollowing::get_followers(Auth::user()->id);
          }
        return view('questions.index',['uf' => $uf]);
    }
    
    

    public function followers() {
      $current_user = Auth::user()->id;

      $iam_following1 = UserFollowing::where('followed_by', '=', $current_user)->get();
      $my_followers1 = UserFollowing::where('user_id', '=', $current_user)->get();

      $iam_following = array();
      foreach( $iam_following1 as $value ) {

        if($value->user->slug)
          $url = $value->user->slug;
        else
          $url = "/user/".$value->user_id;

          $avatar =  Helper::avatar($value->user->avatar);
          $lq_created_at = User::get_last_posted_timestamp($value->user->id);
          
          $iam_following[] = array('user_id' => $value->user_id, 'user' => $value->user->name, 'last_posted' => Helper::user_posted_since($lq_created_at), 'avatar' =>  $avatar, 'url' => $url);

      }
      $my_followers = array();
      foreach( $my_followers1 as $value ) {
          $follower = User::find($value->followed_by);

          if($follower->slug)
            $url = $follower->slug;
          else
            $url = "/user/".$follower->id;
            $avatar =  Helper::avatar($follower->avatar);
            $lq_created_at = User::get_last_posted_timestamp($follower->id);
            
            $my_followers[] = array('user_id' => $follower->id, 'user' => $follower->name, 'last_posted' => Helper::user_posted_since($lq_created_at), 'avatar' => $avatar, 'url' => $url);
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
                              WHERE (slug LIKE '%$q%') ";
                              
    			 $results = DB::select( DB::raw($sql) );
        		//$results = User::where( [['name', 'LIKE',  "%$q%"]])->orWhere([['slug', 'LIKE',  "%$q%"]]);->get();

    			
        if ($results) {
       
        foreach ($results as $value) {
        
          //skip the current user in search
          if($value->id == $current_user)
            continue;
          //if he is a member and has a slug..search will give us role 3 anyway
          if($value->slug )
            $value->url = $value->slug;
          else {
            $value->url = "/user/".$value->id;
          }
          

          $value->last_posted =  Helper::user_posted_since(User::get_last_posted_timestamp($value->id));
          
        
       
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
        
        

        return view('search',['users' => $users, 'msg' => $msg]);
    }
}
