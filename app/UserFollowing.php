<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


use App\UserFollowing;

class UserFollowing extends Model
{
    //use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'followed_by',
    ];



    public function user() {
        return $this->belongsTo('App\User');
    }

   
    public static function get_followers($user_id) {
        return UserFollowing::where('user_id', $user_id)->pluck('followed_by');
    }
   
    public static function get_followed_by($user_id) {
        return UserFollowing::where('followed_by', $user_id)->pluck('user_id');
    }
    public static function get_followers_count($user_id) {
        return UserFollowing::where('user_id', $user_id)->count();
    }




}
