<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class NotificationQuestionPosted extends Model {


    protected $table = 'notification_question_posted';

    private static $pagination_count = 10;

    // Create the relationship to users
    public function notification() {
        return $this->belongsTo('App\Notification');
    }



  






    /**
     * Insert the question to the table.
     * @return object
     */
    public static function insert( $target_user, $question_id) {

        $notification_id =  Notification::insert($target_user);
       // $notification_id = $notification->insert($target_user)
        
        $nqp = new NotificationQuestionPosted;
        $nqp->timestamps = false;
        $nqp->question_id = $question_id;
        $nqp->notification_id = $notification_id;
        $nqp->save();
     
        
       // return $question;
    }

 

}



