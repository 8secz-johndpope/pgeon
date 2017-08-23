<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;


use Illuminate\Support\Facades\DB;

use App\Question;

class User extends Authenticatable
{
    use Notifiable;

    use Billable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function votes() {
        return $this->hasMany('App\Vote');
    }

    public function user_following() {
        return $this->hasMany('App\UserFollowing');
    }
  
    public function questions() {
        return $this->hasMany('App\Question');
    }


    public static function get_participation($user_id) {

        $questions = Question::join('answers', 'questions.user_id', '=', 'answers.user_id')
            ->select(['questions.*'])
            ->distinct()
            ->with('answer_count')
            ->where([
                ['questions.user_id', '=', $user_id],
                ['answers.user_id', '=', $user_id],
            ])
            ->paginate(10, ['questions.*']);

        return $questions;
    }

  public function has_active_question() {
    

    $q = $this->questions()->orderBy('expiring_at', 'desc')->take(1)->get();
    if(isset($q[0])) {
      if ($q[0]->expiring_at >=  date("Y-m-d H:i:s", time())) {
        return $q[0]->expiring_at;
      }
    }
    
    return false;    
    
    
  }
  
  
  public static function get_users_of_accepted_answers($user_id) {
    
    $sql = "SELECT users.name, users.avatar, users.slug, COUNT(users.id) AS accepted_answers FROM questions
              INNER JOIN answers ON questions.accepted_answer = answers.id
              INNER JOIN users ON answers.user_id = users.id 
              WHERE questions.user_id = '$user_id' GROUP BY users.id ORDER BY COUNT(users.id) DESC";
      $users = DB::select( DB::raw($sql) );
      return $users;
    
  }
  
  public function points() {
    
    return $this->votes->sum('vote');
    
  }
}

