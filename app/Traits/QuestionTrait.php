<?php // Code in app/Traits/MyTrait.php

namespace App\Traits;
use App\Question;
use App\Answer;
use App\Vote;
use Helper;
trait QuestionTrait
{
  
    
    
    protected function get_questions_from_followers($p, $c)
    {
        $fetched_questions = Question::get_live_questions_from_followers($p, $c);
        
        $questions[] = array();
        foreach($fetched_questions as $key => $question){
            $questions [$key]['id'] = $question->id;
            $questions [$key]['question'] = ($question->question);
            $questions [$key]['avatar'] =  Helper::avatar($question->avatar);
            $questions [$key]['slug'] = Helper::slug($question->user_id ,$question->slug);
            $questions [$key]['user_id'] = $question->user_id;
            $questions [$key]['expiring_at'] = Question::question_validity_status($question->expiring_at);
            
            
        }
        
        return response()->json($questions);
    }
    
    
    protected function get_featured($p, $c)
    {
        $fetched_questions = Question::get_live_featured_questions($p, $c);
        
        $questions[] = array();
        foreach($fetched_questions as $key => $question){
            $questions [$key]['id'] = $question->id;
            $questions [$key]['question'] = ($question->question);
            $questions [$key]['avatar'] =  Helper::avatar($question->avatar);
            $questions [$key]['slug'] = Helper::slug($question->user_id ,$question->slug);
            $questions [$key]['user_id'] = $question->user_id;
            $questions [$key]['expiring_at'] = Question::question_validity_status($question->expiring_at);
            
            
        }
        
        return response()->json($questions);
    }

    
}