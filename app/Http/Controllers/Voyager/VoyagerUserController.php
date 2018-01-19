<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use App\Answer;
use App\User;
use App\Tag;
use Validator;
use HTML;

class VoyagerUserController
{
    public function index()
    {
      $users = User::orderBy('created_at', 'desc')->paginate(10);
  //    print_r($users);
    //  exit;
      return view('voyager.users.index', ['users' => $users, 'page_title' => 'Users', 'sort' =>'new']);
    }


      public function edit($id)
      {
        $user = User::find($id);
        return view('voyager.users.edit', ['user' => $user]);

      }



      public function show($id)
      {
        $user = User::find($id);
        return view('voyager.users.show', ['user' => $user]);

      }


      public function destroy($id)
    	{
    		// delete
    		$user = User::find($id);
        $user->delete();
    		// redirect
    		Session::flash('message', 'Successfully deleted the user!');
    		return Redirect::to('voyager.users.index');
    	}



      public function update($id)
    {
      
        $rules = array(
            'featured'       => 'required',

        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->route('users.edit', ['id' => $id])
                ->withErrors($validator);
        } else {
            // store
            $user = User::find($id);
            $user->featured      = Input::get('featured');
            $user->save();

            // redirect
            Session::flash('message', 'User Successfully updated!');
            return redirect('/admin/users');
        }
    }
}
