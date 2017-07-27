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
    public function show($question_id)
    {
        $question = Question::find($question_id);

        if (!$question)
            abort(404, "Page Not Found");

        $answers = Answer::get_sorted($question_id);
      //  $answer_ids = Answer::get_answer_ids($question_id);
        return view('questions.show', [ 'answers' => $answers, 'question' => $question]);
    }

    /**
     * Insert question in DB
     * POST /questions
     * @return Redirect
     */
    public function insert()
    {
        $question = Question::insert(Auth::user()->id, Request::get('question'), Request::get('hours'), Request::get('mins'));
         return Redirect::to('ask');
    //    return Redirect::to('question/'.$question->id.'/'.\App\Question::get_url($question->question));
    }

    /**
     * Get the top questions according to votes
     * GET /questions/
     * @return Redirect
     */
    public function index()
    {

        $questions = Question::get_live_questions();
        return view('questions.index', ['questions' => $questions]);
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
