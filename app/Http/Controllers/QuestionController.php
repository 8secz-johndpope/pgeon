<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\Answer;
use App\Question;
use App\Tag;
use Helper;

class QuestionController extends Controller
{
    /**
     * Display the question
     * @param  int  $question_id
     * @return Response
     */
    public function show($question_id,$format=null)
    {
        $question = Question::find($question_id);

        if (!$question)
            abort(404, "Page Not Found");

        if ($format == "json") {
            $answers = Answer::get_sorted($question_id);
          //  return response()->json(array(array("answer"=> 'sdfssf', "name" => 'namamamsm')));
              return response()->json($answers);
        }
      //  $answer_ids = Answer::get_answer_ids($question_id);
        else {
            $user_answered_votes = Answer::get_current_user_votes_for_question($question->id);
            
            if ($question->expiring_at > time()) {
                $question->expiring_at = Question::question_validity_status($question->expiring_at);
                return view('questions.show', ['question' => $question, 'user_answered_votes' => $user_answered_votes]);  
            }else {
              if (Auth::user()->id == $question->user_id) {
                return view('questions.showexpiredowner', ['question' => $question, 'user_answered_votes' => $user_answered_votes]); 
              }else {
                  return view('questions.showexpired', ['question' => $question, 'user_answered_votes' => $user_answered_votes]);   
              }
               
            }
            
            
        }
        
    }

    /**
     * Insert question in DB
     * POST /questions
     * @return Redirect
     */
    public function insert()
    {
        $user = Auth::user();
        if($user->role_id == 3 && !$user->has_active_question()) {
         $question = Question::insert(Auth::user()->id, Request::get('question'), Request::get('hours'), Request::get('mins'));
         return Redirect::to('my-questions');
       }else {
          Auth::logout();
          return Redirect::to('/');
       }
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
            $fetched_questions = Question::get_live_questions();
            
            
            $questions[] = array();
            foreach($fetched_questions as $key => $question){
                $questions [$key]['id'] = $question->id; 
                $questions [$key]['question'] = $question->question; 
                $questions [$key]['avatar'] =  Helper::avatar($question->avatar);
              $questions [$key]['name'] = $question->name;
                
                $questions [$key]['expiring_at'] = Question::question_validity_status($question->expiring_at);
                
                
            }
            
            return response()->json($questions);
        }else {
            
            return view('questions.index');
        }
        
        
    }

  
  public function details($id) {
    $question = Question::find($id);
    $details = array();
    $details ['id'] = $question->id; 
    $details ['question'] = $question->question; 
    $details ['name'] = $question->user->name;
    $details ['avatar'] =  Helper::avatar($question->avatar);
    $details ['expiring_at'] = Question::question_validity_status($question->expiring_at);
    return response()->json($details);

    
    
  }
  
  public static function accept_answer() {
    
    $question = Question::find(Request::get('question_id'));

    if (!$question)
        abort(404, "Page Not Found");
    
    if (Auth::user()->id == $question->user_id) {
        $question->accepted_answer = Request::get('answer_id');  
        $question->save();
        return Redirect::to('question/'.$question->id);
    }
    
    
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
        
        if ($user->role_id != 3 ) {
          abort(403, 'Access denied');
        }
      //  $lq_expiring_at = $user->has_active_question();
        $lq_expiring_at = $user->last_question_time();
      
      //exit;
        $questions = Question::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('questions.ask',['questions' => $questions, 'lq_expiring_at' => $lq_expiring_at]);
    }

    /**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$question = Question::find($id);
		$question->delete();
		// redirect
		Session::flash('message', 'Successfully deleted the question!');
		return Redirect::to('questions');
	}
  
    
}
