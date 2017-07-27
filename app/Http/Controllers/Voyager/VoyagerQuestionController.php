<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use App\Answer;
use App\Question;
use App\Tag;
use Validator;
use HTML;

class VoyagerQuestionController
{
    public function index()
    {
      $questions = Question::orderBy('created_at', 'desc')->paginate(10);
      return view('voyager.questions.index', ['questions' => $questions, 'page_title' => 'Questions', 'sort' =>'new']);
    }


      public function edit($id)
      {
        $question = Question::find($id);
        return view('voyager.questions.edit', ['question' => $question]);

      }


      public function publish($id)
      {
        $question = Question::find($id);
        $question->published_at = date("Y-m-d H:i:s");
        $question->save();

      //  $question->status      =
      //  $question->save();

        return view('voyager.questions.edit', ['question' => $question]);

      }

      public function show($id)
      {
        $question = Question::find($id);
        return view('voyager.questions.show', ['question' => $question]);

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
            $question->save();

            // redirect
            Session::flash('message', 'Question Successfully updated!');
            return redirect()->route('questions.index');
        }
    }
}
