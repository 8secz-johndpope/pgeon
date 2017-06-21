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
        $question = UserFollowing::insert(['user_id' =>  Request::get('user_id'), 'followed_by' => Auth::user()->id]);
        return response()->json(['status' => 'done']);
      //  return Redirect::to('question/'.$question->id.'/'.\App\Question::get_url($question->question));
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

		return response()->json(['status' => 'done']);
	}
}
