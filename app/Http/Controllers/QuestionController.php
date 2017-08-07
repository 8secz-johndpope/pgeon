<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\Answer;
use App\Question;
use App\Tag;

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
            return view('questions.show', ['question' => $question]);
        }
        
    }

    /**
     * Insert question in DB
     * POST /questions
     * @return Redirect
     */
    public function insert()
    {
        if(Auth::user()->role_id == 3) {
         $question = Question::insert(Auth::user()->id, Request::get('question'), Request::get('hours'), Request::get('mins'));
         return Redirect::to('ask');
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
            
            /*
            $questions[] = array();
            foreach($fetched_questions as $key => $question){
                $questions [$key]['id'] = $question->id; 
                $questions [$key]['question'] = $question->question; 
                $questions [$key]['avatar'] = $question->avatar ? '/uploads/avatars/'.$question->avatar:  asset('img/profile-placeholder.svg');
                $questions [$key]['expiring_at'] = Question::question_validity_status($question->expiring_at);
                
                
            }
            */
            return response()->json($fetched_questions);
        }else {
            
            return view('questions.index');
        }
        
        
    }

    
    /**
     * GET /question/ask
     * @return Redirect
     */
    public function ask()
    {
        $questions = Question::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('questions.ask',['questions' => $questions]);
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
