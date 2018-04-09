<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class UserActivation extends Model
{
    //use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'act_code', 'new_email',
    ];



    public function user() {
        return $this->belongsTo('App\User');
    }

   
    public static function get_followers($user_id) {
       // return UserFollowing::where('user_id', $user_id)->pluck('followed_by');
    }
   


    public static function makeActivationCode($id, $email){

        UserActivation::where('new_email', $email)->delete();
        $ua = new UserActivation();
        $ua->new_email = $email;
        $ua->user_id = $id;
        $act_code = bin2hex(random_bytes(2));
        $base64_code = base64_encode($email.'####'.$act_code);
        $ua->act_code = $act_code;
        if($ua->save())
            return $base64_code;
        else 
            return false;    

    }

    public static function validateCodeAndChangeEmail($email, $act_code){
        
   
        $ua = UserActivation::where('new_email', $email)->where('act_code',$act_code)->first();
        if($ua) {
            $user = User::find($ua->user_id);
            $user->email = $email;
            $user->save();
            return true;
        }
        return false;
    }


}
