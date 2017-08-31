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

   
    




}
