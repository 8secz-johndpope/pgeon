<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class QuestionCounter extends Model
{
    //use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'questions_posted'
    ];



    public function user() {
        return $this->belongsTo('App\User');
    }

   
    public static function get_weekly_counter($id)
    {
        $qc = QuestionCounter::where('user_id', $id)->value('questions_posted');
        return (int) $qc; 
        
    } 

   

}
