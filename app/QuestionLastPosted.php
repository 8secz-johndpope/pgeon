<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class QuestionLastPosted extends Model
{
    //use Notifiable;
    protected $table = 'question_last_posted';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id'
    ];



    public function user() {
        return $this->belongsTo('App\User');
    }

   
    public static function insert($user_id ) {
        $lp = new QuestionLastPosted;
        $lp->user_id = $user_id;
        $lp->posted_at = date("Y-m-d H:i:s");
        $lp->save();

    }

   

}
