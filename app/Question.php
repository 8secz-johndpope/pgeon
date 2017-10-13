<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Question extends Model {




    private static $pagination_count = 10;

    // Create the relationship to users
    public function user() {
        return $this->belongsTo('App\User');
    }

    // Create the relationship to answers
    public function answers() {
        return $this->hasMany('App\Answer');
    }

    public function notification_question_posted() {
        return $this->hasMany('App\NotificationQuestionPosted');
    }
  
    public function votes() {
        return $this->hasManyThrough('App\Vote','App\Answer');
    }

    public function formatted_h_m() {
      return str_pad($this->active_hours,2,"0",STR_PAD_LEFT). ' hrs '.str_pad($this->active_mins,2,"0",STR_PAD_LEFT).' mins';

    }

    public static function get_live_questions() {


    //  $user_id = Auth::user()->id;
      $now = time();


        //TODO will be converted to stored proc in future
      //follower's live Qs
      /*$questions = DB::select( DB::raw("
                            SELECT q.id, q.question, u.avatar, q.expiring_at, u.name FROM questions q INNER JOIN user_followings uf
                              ON q.user_id = uf.user_id
                              INNER JOIN users u ON u.id = uf.user_id
                              WHERE uf.followed_by = $user_id and q.expiring_at > '$now'") );
         and q.expiring_at > '$now'
         */
      
      // all live Qs
      $sql = "SELECT q.id, q.question, u.avatar, q.expiring_at, q.user_id, u.name FROM questions q  
                              INNER JOIN users u ON u.id = q.user_id 
                              and q.expiring_at > '$now'";
      $questions = DB::select( DB::raw($sql) );
        // and q.expiring_at > '$now'

    return $questions;
    }



    /**
     * Get the number of answers for a question
     * @return mixed
     */
    public function answer_count() {
        return $this->answers()
            ->selectRaw('count(*) as total, question_id')
            ->groupBy('question_id');
    }




    public static function question_validity_status($expiring_at){

        
        $added_time = $expiring_at;

        //some life left
        if ($added_time > time()) {
          $remaining_time = $added_time - time();
          return $remaining_time;
        }else {
          return 0;
        }
        

    }



    /**
     * Insert the question to the table.
     * @return object
     */
    public static function insert($user_id, $question_text, $days, $hours, $mins ) {

        $question = new Question;
        $question->question = $question_text;
        $question->user_id = $user_id;
      //  echo date("d-M-Y H:i:s", strtotime('+'.$days.' days +'.$hours.' hour +'.$mins.' minutes', time()));
     //   exit;
     
      //always insert as GMT+0...which is what php date() returns..don't depend on mysql date
        $question->expiring_at = strtotime('+'.$days.' days +'.$hours.' hour +'.$mins.' minutes', time());
       
         $question->save();
         
        foreach($question->user->user_followings as $key => $val) {
            
            NotificationQuestionPosted::insert($val['followed_by'], $question->id);
        }
              
        return $question;
        
      
    }

    // this is a recommended way to declare event handlers
        protected static function boot() {
            parent::boot();

            static::deleting(function($question) { // before delete() method call this
                 $question->answers()->delete();
                 $question->votes()->delete();
                 // do the rest of the cleanup...
            });



        }
        
        

}


