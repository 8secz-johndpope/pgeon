<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

use App\Vote;
use Log;

class VoteController extends Controller
{
  
    public static function index() {
            
    } 
  
    public function vote_question()
    {

        // Is the current and past vote the same?
        // If so, remove all votes. They want to nullify vote..
        $voted = Vote::where('user_id', Auth::id())->where('question_id',Request::get('question_id'))->first();

        if (isset($voted->id)) {
            Vote::destroy($voted->id);
            $ajax_response = array(
                'status' => 'success',
                'msg' => 'vote nullified on question id ' .Request::get('question_id'),
            );
        } else {
            Vote::updateOrCreate(
                ['question_id' => Request::get('question_id'),'user_id' => Auth::user()->id],
                ['vote' => Request::get('vote')]
            );
            $ajax_response = array(
                'status' => 'success',
                'msg' => 'vote casted on question id ' .Request::get('question_id'),
            );
        }

        return Response::json($ajax_response);
    }

    public function vote()
    {
      if(Auth::user()->id == Request::get('user_id')) {
        
        $vote = Vote::cast_vote(Auth::user()->id, Request::get('answer_id'),Request::get('vote_direction'));
        //echo $vote;
          return Response::json(array('vote' => $vote));
    
           }
            
    }
}
