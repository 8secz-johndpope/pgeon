<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Vote extends Model
{
    protected $fillable = [
        'user_id',
        'answer_id',
        'vote'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function answer() {
        return $this->belongsTo('App\Answer');
    }
 
   public static function cast_vote($user_id, $answer_id, $vote_direction) {
      $voted = Vote::where('user_id', $user_id)->where('answer_id',$answer_id)->first();
      $vote = NULL;
      if($vote_direction == "up"){
        //to maintian max and min vote..if vote goes above 1 per user, nothing will happen
        if ($voted) {
           if ($voted->vote == 0 || $voted->vote == -1  ) {
              $vote = $voted->vote + 1;
           }
        }else {
           $vote = 1;
        }   
      }elseif ($vote_direction == "down"){
        //to maintian max and min vote..if vote goes below -1 per user, nothing will happen
        if ($voted) {
           if ($voted->vote == 0 || $voted->vote == 1  ) {
              $vote = $voted->vote - 1;
           }
        }else {
           $vote = -1;
        }   
      }
     
      if(isset($vote)) {
        $sql = 'REPLACE INTO votes SET user_id = '.$user_id.', answer_id = '.$answer_id.', vote =  '.$vote;
        DB::statement($sql);
        return $vote;
      }
     return false;
  }
  

         
      
    
}

