<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use App\Helpers\Helper;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Question;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    use Billable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password','provider', 'provider_id', 'banner'
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

    public function question_counters() {
        return $this->hasOne('App\QuestionCounter');
    }

    public function question_last_posted() {
        return $this->hasOne('App\QuestionLastPosted');
    }


    public function subs() {
        return $this->hasOne('App\Subscription');
    }

    
    public function user_activation() {
        return $this->hasOne('App\UserActivation');
    }
  
    public static function convoDetails($user_id) {
        $sql = "
                    
        
        SELECT ans_by_uid, q_by_uid, q_by_uid, ans_by_slug, q_by_slug, answer, UNIX_TIMESTAMP(created_at) as created_at, question  from (
        SELECT answers.user_id as ans_by_uid, questions.user_id as q_by_uid, au.slug as ans_by_slug, qu.slug as q_by_slug, answers.created_at, answers.answer, question FROM questions 
        INNER JOIN users qu ON questions.user_id = qu.id 
        INNER JOIN answers ON questions.id = answers.question_id 
        INNER JOIN users au ON answers.user_id = au.id 
        WHERE questions.user_id = '$user_id' AND questions.accepted_answer > 0
        
        UNION ALL 
        
        
        SELECT answers.user_id as ans_by_uid, questions.user_id as q_by_uid, au.slug as ans_by_slug, qu.slug as q_by_slug, answers.created_at, answers.answer, question FROM answers 
        	INNER JOIN users au ON au.id = answers.user_id
        	INNER JOIN questions ON questions.id = answers.question_id
        	INNER JOIN users qu ON qu.id = questions.user_id
        WHERE answers.user_id='$user_id' AND questions.accepted_answer > 0
        )  AS tmp  ORDER BY created_at DESC
        
        ";
        
        
        $users = DB::select( DB::raw($sql) );
        
        return $users;
        
  }
    
    

  public static function fetchConvoCountBetween($user1, $user2) {
    $sql = "

    SELECT   COUNT(ans_id) no_of_replies from (
        SELECT    answers.id as ans_id FROM questions
        INNER JOIN answers ON questions.id = answers.question_id

        WHERE questions.user_id = '$user1'   AND answers.user_id = '$user2'  AND questions.accepted_answer > 0

        UNION ALL

        SELECT    answers.id as ans_id FROM questions
        INNER JOIN answers ON questions.id = answers.question_id
        INNER JOIN users ON answers.user_id = users.id

        WHERE questions.user_id = '$user2' AND answers.user_id = '$user1'  AND questions.accepted_answer > 0
        ) 
    AS tmp
    
    

  
     
           
             
";
    $result = DB::select( DB::raw($sql) );
//      echo $sql;
    
   
    return $result[0]->no_of_replies;
    
    
}

/** fetch number of replies given to a user from a user  **/
public static function fetchRepliesCount($user_id , $replied_by) {
    $sql = "SELECT  COUNT(answers.id) no_of_replies FROM questions
    INNER JOIN answers ON questions.id = answers.question_id
    WHERE questions.user_id = '$user_id'  AND answers.user_id = '$replied_by' AND expiring_at < ".time();
    $result  = DB::select( DB::raw($sql) );
    return $result[0]->no_of_replies;
}



  /** can be deleted..but very useful to get the accumulation of convo between the users... so will be kept here for long*/
  
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
  
  
  public static function eligible_to_ask() {

    $eligible_to_ask = false;
    if (Auth::user()->id && Auth::user()->role_id == 3) {
        $eligible_to_ask = true;  
    }

    return $eligible_to_ask;  
  }

  public static function get_last_posted_timestamp($user_id) {
    $lq = QuestionLastPosted::where('user_id', $user_id)->first();
    return ($lq)? strtotime($lq->posted_at):0;
  }

  public static function deleteEntities($id) {
      //delte all Q's,A's,V's
    $qs =  Question::where('user_id', '=', $id)->get();
    foreach ($qs as $key => $val) {
        $q = Question::find($val->id);
        $q->votes()->delete();
        $q->delete(); //will delete A's
    }

    UserFollowing::where('user_id', '=', $id)
                    ->orWhere('followed_by', '=', $id)  
                    ->delete();

    
    $u = User::find($id);
    $u->email = NULL;
    $u->avatar = "";
    $u->password = "";
    $u->provider = "";
    $u->provider_id = "";
    $u->slug = "";
    $u->deleted = 1;
    $u->save();

    return true;
                    

    }

    
}

