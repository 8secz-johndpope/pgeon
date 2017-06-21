<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Question;
use App\User;
use App\UserFollowing;

class HomeController extends Controller {

    /**
     * Show the homepage
     * @return View
     */
    public function index() {
        $questions = Question::orderBy('created_at', 'desc')->paginate(10);
        $tags = Tag::distinct()->orderBy('name', 'asc')->get();
        return view('index')->with('questions', $questions)->with('tags', $tags)->with('page_title','Q&A - Interview Questions');
    }

    public function followers() {
      $current_user = Auth::user()->id;

      $iam_following1 = UserFollowing::where('followed_by', '=', $current_user)->get();
      $my_followers1 = UserFollowing::where('user_id', '=', $current_user)->get();


      $iam_following = array();
      foreach( $iam_following1 as $value ) {
          $iam_following[] = array('user_id' => $value->user_id, 'user' => $value->user->name, 'bio' => $value->user->bio);

      }
      $my_followers = array();
      foreach( $my_followers1 as $value ) {
          $my_followers[] = array('user_id' => $value->user_id, 'user' => $value->user->name, 'bio' => $value->user->bio);
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
        $q = $request->input('q');
        $results = User::where(
          [ ['name', 'LIKE',  "%$q%"],
            ['role_id', '=', '3'],
        ])->get();
        $users = array();
        foreach ($results as $value) {
          $af = false;
          foreach ($value->user_following as $uf) {
              if ($uf->followed_by ==  Auth::user()->id)  {
                $af = true;
                continue;
              }
          }
          $users[] = array('obj' => $value, 'already_followed' => $af);
        }

        return view('search',['users' => $users]);
    }
}
