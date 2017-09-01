<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Notification extends Model {



    public function notification_question_posted() {
        return $this->hasMany('App\NotificationQuestionPosted','');
    }
   




    /**
     * Insert the question to the table.
     * @return object
     */
    public static function insert($target_user ) {

        $notification = new Notification;
        $notification->target_user = $target_user;
        $notification->timestamps = false;
        
        //always insert as GMT+0...which is what php date() returns..don't depend on mysql date
        $notification->created_at = time();
        $notification->save();
        return $notification->id;
    

    }
    
    public static function get_posted_questions() {
        
        $sql = "SELECT question_id FROM notification_question_posted nqp
                              INNER JOIN notifications n ON n.id = nqp.notification_id
                              WHERE target_user=".Auth::user()->id." AND seen=0;";
        $questions = DB::select( DB::raw($sql) );
        
        if(!$questions) {
           return false;
        }
        $response = array();
        foreach($questions as $key => $val) {
            $question = Question::find($val->question_id);
            $response[] = array('uname' => $question->user->name, 'question' => $question->question, 'question_id' => $question->id);
        }
        
        return $response;
    }
    



}



