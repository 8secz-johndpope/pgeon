<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;

class Answer extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function question() {
        return $this->belongsTo('App\Question');
    }
    public function votes() {
        return $this->hasMany('App\Vote');
    }

    /**
     * Insert an answer
     */
    public static function insert($answer_text, $question_id, $user_id) {
      
        if(Answer::where([['user_id', '=', $user_id],['question_id', '=', $question_id]])->exists()) {
          echo 'Already answered';
          exit;    
        }
      
        $question = Question::find($question_id);
      
        if( $user_id ==  $question->user_id){
          echo 'Can\'t answer your own question';
          exit;    
        }
      
        if ($question->expiring_at <  time()) {
          echo 'question expired';
          exit;    
        }
      
      
        
        $answer = new Answer;
        $answer->answer = $answer_text;
        $answer->user_id = $user_id;
        $answer->question_id = $question_id;
        $answer->save();
        return $answer;
    }

  

    /**
     * Update an answer
     */
    public static function update_answer($answer_id,$answer) {
        $answer_data = Answer::whereId($answer_id)->first();
        $answer_data->answer = $answer;
        if($answer_data->save())
            return true;
    }

    /**
     * Get answers and sort by vote sum()
     * @param $question_id
     * @return mixed
     */
    public static function get_sorted($question_id) {
   //     $answer = Answer::where('question_id', '=', $question_id)->join('users', 'users.id', '=', 'answers.user_id')->join('votes', 'votes.answer_id', '=', 'answers.id')->get(array('answer','name','answers.user_id','answers.id'));
     
        $sql = "SELECT sum(vote) as vote_count, answer,name,answers.user_id,answers.id FROM answers
                    INNER JOIN users ON users.id = answers.user_id
                    LEFT JOIN votes on votes.answer_id = answers.id
                    WHERE question_id= ".$question_id." GROUP BY answers.user_id ORDER by vote_count DESC
                ";
        
        $answer = DB::select( DB::raw($sql) );
        return $answer;
      
      
    }

    /**
     * Get answers and sort by vote sum()
     * @param $question_id
     * @return mixed
     */
    public static function get_answer_ids($question_id) {
        $answer_ids = Answer::select('user_id')->distinct()->where('question_id', $question_id)->get()->toArray();

        $answer_array = array();
        foreach($answer_ids as $var)
            $answer_array[] = $var['user_id'];

        return $answer_array;
    }

  
 
    

    
    public static function get_chosen_answer($question_id) {
       return Answer::where('question_id', $question_id)->where('manually_chosen_as_top', 1)->get();
    }
    
    

    /** fetch the responses of a user to a target user **/
    public static function fetchR($answered_by, $question_by ) {
        
        $sql = "
            SELECT answers.answer, answers.id, questions.question, UNIX_TIMESTAMP(answers.created_at) as created_at, answers.user_id as ans_by, questions.user_id as q_by   FROM answers
            INNER JOIN questions ON questions.id = answers.question_id
            INNER JOIN users ON questions.user_id = users.id
             WHERE questions.accepted_answer > 0 AND (answers.user_id = '$answered_by'
             AND questions.user_id = '$question_by')  order by expiring_at desc ";
        
        $users = DB::select( DB::raw($sql) );
        $result = array();
        foreach ($users as $key => $val) {
            $val->ago = Helper::calcElapsed($val->created_at);
            $result [] = $val;
            
        }
        return $result;
    }
    
    
    /** JAN - 3 can be deleted..but can be useful 
     *  fetch the responses of a user to and fro a target user **/
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
    
    
}
