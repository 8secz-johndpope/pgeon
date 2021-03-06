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
        
        $questions = array();
        foreach($fetched_questions as $key => $question){

            $temp['id'] = $question->id;
            $temp['question'] = ($question->question);
            $temp['name'] = ($question->name);
            $temp['avatar'] =  Helper::avatar($question->avatar);
            $temp['slug'] = Helper::slug($question->user_id ,$question->slug);
            $temp['expiring_at'] = Question::question_validity_status($question->expiring_at);
            //u is prepended to avoid automatic sorting
            $questions["u".$question->user_id][] = $temp;
            
            
            
        }
        
        return response()->json($questions);
    }
    
    
    protected function get_featured($p, $c)
    {
        $fetched_questions = Question::get_live_featured_questions($p, $c);

        
        $questions = array();
        foreach($fetched_questions as $key => $question){
            
            $temp['id'] = $question->id;
            $temp['question'] = ($question->question);
            $temp['name'] = ($question->name);
            $temp['avatar'] =  Helper::avatar($question->avatar);
            $temp['slug'] = Helper::slug($question->user_id ,$question->slug);
            $temp['expiring_at'] = Question::question_validity_status($question->expiring_at);
            //u is prepended to avoid automatic sorting
            $questions["u".$question->user_id][] = $temp;
            
            
        }

        //print_r($questions);

        
        return response()->json($questions);
    }

    
}