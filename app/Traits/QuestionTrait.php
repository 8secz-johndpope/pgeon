<?php // Code in app/Traits/MyTrait.php

namespace App\Traits;
use App\Question;
use App\Answer;
use App\Vote;
use Helper;
trait QuestionTrait
{
    protected function get_questions()
    {
        $fetched_questions = Question::get_live_questions();
        
        $questions[] = array();
        foreach($fetched_questions as $key => $question){
            $questions [$key]['id'] = $question->id;
            $questions [$key]['question'] = $question->question;
            $questions [$key]['avatar'] =  Helper::avatar($question->avatar);
            $questions [$key]['name'] = $question->name;
            $questions [$key]['user_id'] = $question->user_id;
            $questions [$key]['expiring_at'] = Question::question_validity_status($question->expiring_at);
            
            
        }
        
        return response()->json($questions);
    }
    
    
    protected static function live_qs_w_top_a()
    {
        
        $fetched_questions = Question::get_live_questions();
        
        $questions[] = array();
        foreach($fetched_questions as $key => $question){
            $answer_id = Vote::get_top_voted_answer_id($question->id);
            if($answer_id) {
                $answer = Answer::find($answer_id);
                $questions [$key]['id'] = $question->id;
                $questions [$key]['question'] = $question->question;
                $questions [$key]['avatar'] =  Helper::avatar($question->avatar);
                $questions [$key]['name'] = $question->name;
                $questions [$key]['answer'] = $answer;
                $questions [$key]['user_id'] = $question->user_id;
                $questions [$key]['expiring_at'] = Question::question_validity_status($question->expiring_at);
            }
            
            
            
        }
        
        return response()->json($questions);
        
        
    }
    
}