<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

use App\Answer;
use App\Question;
class AnswerController extends Controller
{

    /**
     * Insert an answer
     * POST /answers
     * @return Response
     */
    public function insert()
    {
        Answer::insert(Request::get('answer'),Request::get('question_id'),Auth::user()->id);
        
       // return Redirect::to('question/'.Request::get('question_id').'/'.Request::get('question_url'));

    }

    /**
     * Update the answer from jquery
     * @return Response
     */
    public function update() {
        $answer = Answer::update_answer(Request::get('pk'),Request::get('value'));
        if($answer)
            return Response::json(array('status'=>1));
        else
            return Response::json(array('status'=>0));
    }

  
  	public function destroy($id)
	{
      
        
		// delete
		$answer = Answer::find($id);
        if($answer->user_id == Auth::user()->id){
          //only owner can delete it
          $answer->delete();  
        }
		
		//echo 'sdfsd';exit;
      
        
	}
	
	    
	public static function set_chosen_answer() {
	    
	    $question = Question::find(Request::get('question_id'));
	    if (Auth::user()->id == $question->user_id) {
	        //remove existing chosen answer
	        Answer::where('question_id', Request::get('question_id'))
	        ->update(['manually_chosen_as_top' => 0]);
	        
	        Answer::where('id', Request::get('answer_id'))
	        ->update(['manually_chosen_as_top' => 1]);
	        
	        return Response::json(array('status'=>1));
	    }
	 }
    	 
	 
	 
	
}
