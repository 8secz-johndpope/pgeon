<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


use App\UserFollowing;

class UserFollowingController extends Controller
{


    /**
     * Insert question in DB
     * POST /questions
     * @return Redirect
     */
    public function insert()
    {
		

		UserFollowingController::followtheuser(Request::get('user_id'));
        return response()->json(['status' => 'done']);
    }


	public static function followtheuser($uid) {
		//can't follow yourself
		if($uid == Auth::user()->id) {
			abort(403);
		}

		UserFollowing::insert(['user_id' =>  $uid, 'followed_by' => Auth::user()->id]);
        
        /** notify the star who is being followed **/
        NotificationController::insertUserFollowed($uid, Auth::user()->id);
	}


	public static function follow($uid){

		UserFollowingController::followtheuser($uid);
		return true;
	}
    /**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		// delete
		$uf = UserFollowing::where(
       ['user_id' =>  Request::get('user_id'), 'followed_by' => Auth::user()->id]
    );
		$uf->delete();

		/** TODO notify the unlucky guy who is being unfollowed 
		 * Logic : if there is a notification unseen from the follower who just unfollowed before the receiver read the notification, remove the notification..
		 * delete WHERE meta->followed_by Auth::user()->id AND target_user Request::get('user_id')
		 * **/
		//NotificationController::insertAnswerAccepted(Request::get('user_id'), Auth::user()->id);
		return response()->json(['status' => 'done']);
	}
}
