<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use App\Helpers\Helper;


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
         'email', 'password','provider', 'provider_id'
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

	
    public function user_followings() {
        return $this->hasMany('App\UserFollowing');
    }
  
    public function questions() {
        return $this->hasMany('App\Question');
    }

    public function notifications() {
        return $this->hasMany('App\Notification','target_user');
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

    

   public function last_question() {
        $q = $this->questions()->orderBy('expiring_at', 'desc')->take(1)->get();
        if(isset($q[0])) {
            return $q[0];
        }
        return null;
   }
    
  public function last_question_time() {
      $q = $this->questions()->orderBy('expiring_at', 'desc')->take(1)->get();
      if(isset($q[0])) {
          return $q[0]->expiring_at;
      }
      return 0;
      
  }
  
 
  
  
  public function has_active_question() {
    
      if ($expiring_at = $this->last_question_time() ) {
          if($expiring_at >= time())
            return $q[0]->expiring_at;
      }
    return false;    
    
    
  }
  
  
  public static function replies($user_id) {
      $sql = "
            SELECT uid,name, avatar, slug, COUNT(ans_id) no_of_replies from (
                SELECT users.id as uid, users.name , users.avatar, users.slug, answers.id as ans_id FROM questions
                INNER JOIN answers ON questions.id = answers.question_id
                INNER JOIN users ON answers.user_id = users.id
    
                WHERE questions.user_id = '$user_id'   AND questions.accepted_answer > 0
    
                UNION ALL
    
                SELECT users.id as uid, users.name, users.avatar, users.slug,  answers.id as ans_id  FROM answers
                INNER JOIN questions ON questions.id = answers.question_id
                INNER JOIN users ON questions.user_id = users.id
                WHERE answers.user_id = '$user_id' 
                AND questions.accepted_answer > 0
                ) 
            AS tmp GROUP by uid, name, avatar, slug
            ORDER BY COUNT(ans_id) DESC   
               
";
      $users = DB::select( DB::raw($sql) );
//      echo $sql;
      
      $result = array();
      foreach ($users as $key => $val) {
          //   $val->points = User::get_points($val->id);
          $val->no_of_replies = $val->no_of_replies;
          $val->slug = ($val->slug)? $val->slug : "/user/".$val->uid;
          $result [] = $val;
          
      }
      return $result;
      
      
  }
  
  /** fetch users who are all have given answers to the selected users **/
  public static function fetch_most_replied_results($user_id, $limit_str = "" ) {
  
  	$sql = "SELECT users.id, users.name, users.avatar, users.slug, COUNT(answers.id) no_of_replies FROM questions
              INNER JOIN answers ON questions.id = answers.question_id
              INNER JOIN users ON answers.user_id = users.id 
                
              WHERE questions.user_id = '$user_id'  AND expiring_at < ".time()." GROUP BY users.id ORDER BY COUNT(users.id) DESC $limit_str";
      $users = DB::select( DB::raw($sql) );
      $result = array();
      foreach ($users as $key => $val) {
      //   $val->points = User::get_points($val->id);
         $val->no_of_replies = $val->no_of_replies;
         $val->slug = ($val->slug)? $val->slug : "/user/".$val->id;
         $result [] = $val;
          
      }
      return $result;
  }
    
  
  /** fetch the users who posted something and got responses from the selected user **/
  public static function fetch_responded_results($user_id ) {
      
      $sql = "
            SELECT users.id, users.name, users.avatar, users.slug, COUNT(answers.id) no_of_replies FROM answers
            INNER JOIN questions ON questions.id = answers.question_id
            INNER JOIN users ON questions.user_id = users.id
             WHERE answers.user_id = '$user_id'
             AND expiring_at < ".time()."
             GROUP BY users.id
            ORDER BY COUNT(users.id) DESC
 ";
      $users = DB::select( DB::raw($sql) );
      $result = array();
      foreach ($users as $key => $val) {
          $val->no_of_replies = $val->no_of_replies;
          $val->slug = ($val->slug)? $val->slug : "/user/".$val->id;
          $result [] = $val;
          
      }
      return $result;
  }
  
  
  
  
  /** fetch the responses of a user to a target user **/
  public static function fetchQandA($answered_by, $question_by ) {
      
      $sql = "
            SELECT answers.answer, answers.id, questions.question, questions.expiring_at, answers.user_id as ans_by, questions.user_id as q_by   FROM answers
            INNER JOIN questions ON questions.id = answers.question_id
            INNER JOIN users ON questions.user_id = users.id
             WHERE questions.accepted_answer > 0 AND (answers.user_id = '$answered_by'
             AND questions.user_id = '$question_by') OR
             (answers.user_id = '$question_by'
                AND questions.user_id = '$answered_by')
             AND expiring_at < ".time()."  
           
 ";
      
      $users = DB::select( DB::raw($sql) );
      $result = array();
      foreach ($users as $key => $val) {
          $val->expiring_at = Helper::calcElapsed($val->expiring_at);
          $result [] = $val;
          
      }
      return $result;
  }
  
 /* 
  public static function get_users_of_accepted_answers_top10($user_id) {
    
    return User::fetch_most_replied_results($user_id, " LIMIT 10");
    
  }
  */
  
  
  public static function get_users_of_accepted_answers($user_id) {
    
    return User::fetch_most_replied_results($user_id);
    
  }
  
  

  public static function get_pending_answers_count($user_id) {
      
  }
  //public function points() {
    
    //return $this->votes->sum('vote');
    
  //}
  
  
 
  
  public static function get_points($user_id) {
      
      
     /* $sql = " 
      SELECT COUNT(accepted_answer)  AS points  FROM `questions` INNER JOIN answers on answers.id = questions.accepted_answer
      WHERE answers.user_id = $user_id ";*/
      
     $sql = "
      SELECT IFNULL(SUM(vote),0)  AS points  FROM `votes` INNER JOIN answers on answers.id = votes.answer_id
      WHERE answers.user_id = $user_id ";
    
      $result = DB::select( DB::raw($sql) );
      
      return $result[0]->points;
      
  }
  
  
  public static function get_accepted_answers_of_user($user_id) {
      
      $SQL = "SELECT question, answer, expiring_at,  users.name as creator FROM `questions` 
                INNER JOIN answers ON questions.accepted_answer = answers.id
                INNER JOIN users ON questions.user_id = users.id
                WHERE answers.user_id = $user_id;";
      $records = DB::select( DB::raw($SQL) );
      return $records;
      
  }
  
}

