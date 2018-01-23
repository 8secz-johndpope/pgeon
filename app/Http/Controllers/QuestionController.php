<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

use App\User;

use App\Answer;
use App\Vote;
use App\Question;
use App\UserFollowing;
use App\QuestionCounter;
use Helper;
use Illuminate\Support\Facades\Mail;

use App\Traits\QuestionTrait;
use App\Mail\QuestionReported;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    use QuestionTrait; 
    /**
     * Display the question
     * @param  int  $question_id
     * @return Response
     */
    public function show($question_id,$format=null)
    {
     
        Session::forget('backUrl');
        $question = Question::find($question_id);

        if (strstr(URL::previous(), "step2")) {
            $back = "/questions";
        }else {
            $back = URL::previous();
        }


        if (!$question)
            abort(410);


        if ($format == "json") {
            $answers = Answer::get_sorted($question_id);
              return response()->json($answers);
        }
      //  $answer_ids = Answer::get_answer_ids($question_id);
        else {
            
            if(!session('hasVisited'))  {
                session(['hasVisited' => '1']);
                Question::pageHit($question->id);
            }
            //non signed in
            if(Auth::guest()) {
             
                //if it is a live quest
                if ($question->expiring_at > time()) {
                    $lq_expiring_in = Question::question_validity_status($question->expiring_at);
                    return view('questions.showguest', ['question' => $question, 'lq_expiring_in' => $lq_expiring_in]);
                }else {
                        $answer = Answer::find($question->accepted_answer);
                        return view('questions.showguestexpired', ['question' => $question, 'answer' => $answer]);
                    
                }
                
            }else {
                

                
                
                //if it is a live quest
                if ($question->expiring_at > time()) {
                    $lq_expiring_in =  Question::question_validity_status($question->expiring_at);
                    //if owner
                    if (Auth::user()->id == $question->user_id) {
                        //    
                        return Redirect::to('my-questions');
                    }else {
                        return view('questions.show', ['question' => $question, 'lq_expiring_in' => $lq_expiring_in, 'back' => $back]);
                    }
                }else {
                   
                    $answer = Answer::find($question->accepted_answer);
                  if (Auth::user()->id == $question->user_id) {
                      
                      return view('questions.showexpiredowner', ['question' => $question,  'answer' => $answer]); 
                  }else {
                      
                      
                      return view('questions.showexpired', ['question' => $question,  'answer' => $answer, 'back' => $back]);   
                  }
                   
                }
            }
            
        }
        
    }
    
   
    public static function get_vote_count_for_question($question_id) {
        
        $sql = "SELECT count(1) AS vote_count FROM votes
                    INNER JOIN answers ON answers.id = votes.answer_id
                    WHERE question_id= ".$question_id;
        
        $rec = DB::select( DB::raw($sql) );
        
        
        return response()->json($rec[0]);
    }

    /**
     * Insert question in DB
     * POST /questions
     * @return Redirect
     */
    public function insert()
    {
        $user = Auth::user();
        if(!User::eligible_to_ask()) {
            abort(401);
        }
        if($user->role_id != 3) {

            $total_posted = QuestionCounter::get_weekly_counter($user->id);
            if ($total_posted >=  env('QS_ALLOWED_PER_WEEK'))
                abort(401);

            $matchThese = array('user_id'=>Auth::user()->id);
            QuestionCounter::updateOrCreate($matchThese,['questions_posted'=>$total_posted + 1]);    
            
        }
            $question = Question::insert(Auth::user()->id, (Request::get('question')), Request::get('days'), Request::get('hours'), Request::get('mins'));
            
            /** insert notifications for all followers **/
            if($question->id) {
                NotificationController::insertQuestionPostedToFollowers($question->id,Auth::user()->id);
            }
            
         return Redirect::to('my-questions');
       
    //    return Redirect::to('question/'.$question->id.'/'.\App\Question::get_url($question->question));
    }

    /**
     * Get the top questions according to votes
     * GET /questions/
     * @return Redirect
     */
    public function index($format=null)
    {
        
        if ($format == "json") {
           return $this->get_questions();
        }else {
//if we change soemthing here it should be changed in homecontroller index as well
                    
        $eligible_to_ask = false;
        if(Auth::user()) {
            $eligible_to_ask = User::eligible_to_ask();
        }

        return view('questions.index',['eligible_to_ask' => $eligible_to_ask]);
           
        }
        
        
    }

    
    public function fromfollowers($p, $c)
    {
        
        return $this->get_questions_from_followers($p, $c);
    }
    
    //$paginate_count, $current_page
    public function featured($p, $c)
    {
        
        return $this->get_featured($p, $c);
    }

    
    
  public function details($id) {
    $question = Question::find($id);
    $details = array();
    $details ['id'] = $question->id; 
    $details ['question'] = ($question->question); 
    $details ['name'] = Helper::slug($question->user->id,$question->user->slug) ;
    $details ['avatar'] =  Helper::avatar($question->avatar);
    $details ['expiring_at'] = Question::question_validity_status($question->expiring_at);
    return response()->json($details);

    
    
  }
  
  public static function accept_answer() {
    
    $question = Question::find(Request::get('question_id'));

    if (!$question)
        abort(404, "Page Not Found");
    
    if (Auth::user()->id == $question->user_id) {
        $question->expiring_at = time();
        $question->accepted_answer = Request::get('answer_id');  
        $question->save();
        /**notify the answerer**/
        NotificationController::insertAnswerAccepted($question->id, $question->user_id, Request::get('answered_by'));
        
        ///**TODO notify users for votes garnered***/
        //NotificationController::insertVotesGarnered(->id, $question->user_id, Request::get('answered_by'));
        return Redirect::to('my-questions');
    }
    
    
  }
  
  public static function end_now($id) {
      
      $question = Question::find($id);
      if (Auth::user()->id == $question->user_id) {
          $question->expiring_at = time();
          $question->save();
          return 'good';
      }
      abort(403, 'Access denied');
  }
  
  public static function cancel_now($id) {
      
      $question = Question::find($id);
      if (Auth::user()->id == $question->user_id) {
          $question->expiring_at = time();
          $question->save();
          return 'good';
      }
      abort(403, 'Access denied');
      
      
  }
  
  public static function get_votes($id) {
    
     $sql = "SELECT answer_id, vote FROM votes v  
                              INNER JOIN answers a ON a.id = v.answer_id 
                              WHERE a.question_id = '$id' AND v.user_id = ".Auth::user()->id;
     $votes = DB::select( DB::raw($sql) );
    //$votes_response = array();
   // foreach ($votes as $key => $val)  {
   //   $votes_response[$val->answer_id] = $val->vote;
    //}
    return response()->json($votes);
  } 
    
  
    public static function get_votes_with_count($id) {
    
     $sql = "SELECT answer_id,  SUM(vote) as votecount FROM votes v  
                              INNER JOIN answers a ON a.id = v.answer_id 
                              WHERE a.question_id = '$id' GROUP BY v.answer_id";
     $votes = DB::select( DB::raw($sql) );
    //$votes_response = array();
   // foreach ($votes as $key => $val)  {
   //   $votes_response[$val->answer_id] = $val->vote;
    //}
    return response()->json($votes);
  } 

     /**
     * GET /question/ask
     * @return Redirect
     */
    public function ask()
    {
        $user = Auth::user();
     
        $total_posted = 0;
        $total_count_exhausted = false;
        if ($user->role_id != 3 ) {
         // abort(403, 'Access denied');
            $total_posted = QuestionCounter::get_weekly_counter($user->id);
            if ($total_posted >=  env('QS_ALLOWED_PER_WEEK')) {
                $total_count_exhausted = true;
            }    
        }
        
        

        $questions = Question::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        
        $lq = (sizeof($questions)>0)?$questions[0]:null;
        $lq_created_at = ($lq)?$lq->created_at->timestamp:0;
        
        $pending = array();
        $published = array();
        $live = array();
        
        foreach ($questions as $key => $val) {
            $answer = array();
            //live
            if($val->expiring_at > time()) {
                $temp = array('question' => $val);
                $live [] = $temp;
                
            } else  {   //expired/ ended  
                if($val->accepted_answer == 0) { //pending
                    $temp = array('question' => $val);
                    $pending [] = $temp;
                    
                }else if ($val->accepted_answer > 0){
                    //publisehd
                    $temp = array('question' => $val);
                    $published [] = $temp;
                }
            }
            
            
           
        }
        return view('questions.ask',[
            'pending' => $pending, 'published' => $published, 'live' => $live, 'lq_created_at' => $lq_created_at, 'total_posted' =>  $total_posted, 'qs_allowed' => env('QS_ALLOWED_PER_WEEK'),'total_count_exhausted' => $total_count_exhausted, 'role_id' => $user->role_id]);
         
        
    }
    
    
    public function pending() {
        $user = Auth::user();
      /*   
        if ($user->role_id != 3 ) {
            abort(403, 'Access denied');
        }
       */  
        $questions = Question::where('user_id', $user->id)->where('expiring_at', '<', time())->where('accepted_answer', '=', 0)->orderBy('created_at', 'desc')->get();
        
        $pending = array();
        
        foreach ($questions as $key => $val) {
            
            $answer = array();
                /** check whether pending question will have an answer chosen for publishing **/
                $chosen = Answer::get_chosen_answer($val->id);
                
                
                if(count($chosen)) {
                    $answer = $chosen[0];
                }else {
                    /** get if it has top voted answer **/
                    $answer_id = Vote::get_top_voted_answer_id($val->id);
                    if($answer_id)
                        $answer = Answer::find($answer_id);
                        
                        
                }
                $temp = array('question' => $val, 'answer' => $answer);
                                
                $pending [] = $temp;
                
        }
        
        return view('questions.pending',['questions' => $questions, 'pending' => $pending]);
    }
    
    public function published() {
        
        $user = Auth::user();
    
        /*
        if ($user->role_id != 3 ) {
            abort(403, 'Access denied');
        }*/
        
        
        $questions = Question::where('user_id', $user->id)->where('expiring_at', '<', time())->where('accepted_answer', '>', 0)->orderBy('created_at', 'desc')->get();
        
        
        $published = array();
        
        foreach ($questions as $key => $val) {
                $answer = Answer::find($val->accepted_answer);
                
                
                $temp = array('question' => $val, 'answer' => $answer);
                $published [] = $temp;
         
        }
        
        //dd($published);
        //exit;
        return view('questions.published',['questions' => $questions,  'published' => $published]);
        
    }
    
    
    public function live() {
        
        $user = Auth::user();
       /* 
        if ($user->role_id != 3 ) {
            abort(403, 'Access denied');
        }
        */
        
        $questions = Question::where('user_id', $user->id)->where('expiring_at', '>', time())->orderBy('created_at', 'desc')->get();
        
        
        $live = array();
        
        foreach ($questions as $key => $val) {
            
          //  dd($val->answers()->votes);
            $val->expiring_in = Question::question_validity_status($val->expiring_at);
            $live [] = $val;
          
            
        }
        
        
        
        //exit;
          return view('questions.live',['questions' => $live, 'display_name' => $user->slug]);
        
    }
    
    public function featuredresponses($p, $c)
    {
        $offset = $c*$p;
        $fetched_questions = Question::where('accepted_answer', '>', 0)
                                     ->join('users', 'users.id', '=', 'questions.user_id')
                                     ->where('users.featured', '=', 1)
                                     ->orderBy('questions.created_at', 'desc')->offset($offset)->limit($p)->get();
        
        $questions[] = array();
        foreach ($fetched_questions as $key => $question) {
            $answer = Answer::find($question->accepted_answer);
            $questions [$key]['id'] = $question->id;
            $questions [$key]['question'] = ($question->question);
            $questions [$key]['avatar'] =  Helper::avatar($question->user->avatar);
            $questions [$key]['name'] = $question->user->name;
            $questions [$key]['answer'] = $answer->answer;
            $questions [$key]['answered_by'] = Helper::slug($answer->user->id,$answer->user->slug) ;
            $questions [$key]['user_id'] = $question->user_id;
            $questions [$key]['slug'] = Helper::slug($question->user->id,$question->user->slug) ;
            $questions [$key]['ago'] = Helper::calcElapsed($question->expiring_at);
        }
        
        return response()->json($questions);
    }
    
    
    
    public function responsesfromfollowers($p, $c)
    {
        
        $uf = UserFollowing::get_followed_by(Auth::user()->id);
        //print_r($uf);
        
        $offset = $c*$p;
        $fetched_questions = Question::where('accepted_answer', '>', 0)->whereIn('user_id', $uf)->orderBy('created_at', 'desc')->offset($offset)->limit($p)->get();
        
        $questions[] = array();
        foreach ($fetched_questions as $key => $question) {
            $answer = Answer::find($question->accepted_answer);
            $questions [$key]['id'] = $question->id;
            $questions [$key]['question'] = ($question->question);
            $questions [$key]['avatar'] =  Helper::avatar($question->user->avatar);
            $questions [$key]['name'] = $question->user->name;
            $questions [$key]['answer'] = $answer->answer;
            $questions [$key]['user_id'] = $question->user_id;
            $questions [$key]['slug'] = Helper::slug($question->user->id,$question->user->slug) ;
            $questions [$key]['rslug'] = Helper::shared_slug($question->user->id,$question->user->slug,$answer->user->id,$answer->user->slug) ;
            $questions [$key]['rslug_formatted'] = Helper::shared_formatted_string($question->user->id,$question->user->slug,$answer->user->id,$answer->user->slug) ;
            $questions [$key]['ago'] = Helper::calcElapsed($question->expiring_at);
        }
        
        return response()->json($questions);
        
    }
    
    public function  responses() {

        $eligible_to_ask = false;
        if(Auth::user()) {
            $eligible_to_ask = User::eligible_to_ask();
        }
            return view('questions.responses', ['eligible_to_ask' =>  $eligible_to_ask, 'mmm' => 'sfsfd']);
    }

    
    /**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public static function destroy($id)
	{
	    $question = Question::find($id);
		// delete
	    if (Auth::user()->id == $question->user_id) {
		 
		  $question->delete();
	    }
		// redirect
	//	Session::flash('message', 'Successfully deleted the question!');
	//	return Redirect::to('questions');
	}
  
	
	public function delete_questions($Qs) {
	    foreach ( explode(",", $Qs) as $key => $id) {
	        Question::destroy($id);
	    }
	}
	
	public function reportQ() {
	    
	    
	    $qid = Request::get('qid');
	    $user_slug = Helper::slug(Auth::user()->id ,Auth::user()->slug);
	    
	    Mail::to('russ@pgeon.com')
	        ->cc('prasanth@object90.com')
	        ->send(new QuestionReported($qid, $user_slug));
	}
	
	/*public static function accept_answer($question_id, $answer_id) {
	    
	    $question = Question::find($question_id);
	    if (Auth::user()->id == $question->user_id) {
	        $question->accepted_answer = $answer_id;
	        $question->save();
	        return 'good';
	    }
	    abort(403, 'Access denied');
	}
    */
}
