<?php

namespace App\Http\Controllers;


use App\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Image;
use Route;


class NotificationController extends Controller
{
    

    public function index($format=null)
    {
        
        
        
//         $question = Question::find($question_id);
        
//         if (!$question)
//             abort(404, "Page Not Found");
            
            if ($format == "json") {
                $get_posted_question = Notification::get_posted_questions();
                return response()->json($get_posted_question);
               // $answers = Answer::get_sorted($question_id);
                //  return response()->json(array(array("answer"=> 'sdfssf', "name" => 'namamamsm')));
               // return response()->json($answers);
            }
//             //  $answer_ids = Answer::get_answer_ids($question_id);
             else {
                 
                 
                 
        
                 return view('notifications.index', ['user_id' => Auth::user()->id]);
//                 if ($question->expiring_at > time()) {
//                     $question->expiring_at = Question::question_validity_status($question->expiring_at);
//                     return view('questions.show', ['question' => $question, 'user_answered_votes' => $user_answered_votes]);
//                 }else {
//                     if (Auth::user()->id == $question->user_id) {
//                         return view('questions.showexpiredowner', ['question' => $question, 'user_answered_votes' => $user_answered_votes]);
//                     }else {
//                         return view('questions.showexpired', ['question' => $question, 'user_answered_votes' => $user_answered_votes]);
//                     }
                    
//                 }
                
                
           }
            
    }
    

    

   

    

   



    
    
}
