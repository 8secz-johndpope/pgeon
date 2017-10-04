<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

  #Route::get('/', 'Auth\LoginController@showLoginForm');

Route::get('/', 'HomeController@index');

  Route::group(['prefix' => 'admin'], function () {
      Voyager::routes();
      Route::group(['middleware' => 'admin.user'], function()
      {
            Route::resource('questions', 'Voyager\VoyagerQuestionController');
            Route::post('question/{id}/publish', 'Voyager\VoyagerQuestionController@publish')->name('voyager.publish');
      });
  });

  Auth::routes();

  //Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');;



  Route::get('bubble', 'UserController@notification_count');
  //


  // User Routes
  //Route::get('user/{id}', 'UserController@index')->name('profile');


  Route::get('user/{id}', 'UserController@getProfile');
  Route::get('user/{id}/questions', 'UserController@questions');
  Route::get('user/{id}/answers', 'UserController@answers');
  Route::get('user/{id}/participation', 'UserController@participation');
  Route::get('user/{id}/topanswers', 'UserController@getAcceptedAnswersOfUser');

  Route::get('user/{id}/topresponders', 'UserController@topResponders');  

  // User Routes
  Route::get('level/{level}', 'LevelController@index');
  Route::get('questions/{format?}', 'QuestionController@index');
  Route::get('question_details/{id}', 'QuestionController@details');
  Route::get('responses/{format?}', 'QuestionController@responses');
  
  Route::group(array('middleware' => 'auth'), function()
  {
    Route::get('bubble', 'UserController@notification_count');
    
    Route::get('notifications/{format?}', 'NotificationController@index');
    // Question Routes
    Route::get('questions/new', 'QuestionController@newest');
    Route::get('question/{id}/{format?}', 'QuestionController@show');
    Route::post('end_now/{id}', 'QuestionController@end_now');
    Route::delete('question/{id}', 'QuestionController@destroy');
    Route::delete('delete_questions/{ids}', 'QuestionController@delete_questions');
    
    
    Route::get('get_votes/{id}/', 'QuestionController@get_votes');
    Route::get('get_votes_with_count/{id}', 'QuestionController@get_votes_with_count');
    
    Route::post('accept_answer', array('before'=>'csfr', 'uses'=>'QuestionController@accept_answer' ) );  
    Route::post('question', array( 'before'=>'csfr','uses'=>'QuestionController@insert' ) );
    Route::get('my-questions', 'QuestionController@ask')->name('ask');

    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::post('profile', 'UserController@update');
    Route::post('subscribe', 'UserController@subscribe');
    Route::get('settings', 'UserController@settings');
    Route::get('membership', 'UserController@membership');
    Route::get('notifications', 'UserController@notifications');


    Route::get('/people', 'HomeController@people')->name('people');
    Route::get('/search', 'HomeController@search')->name('search');

    Route::get('/followers', 'HomeController@followers');
  });


  // Answer Routes
  Route::post('answer', array( 'uses'=>'AnswerController@insert' ) );
  Route::post('answer/update', array( 'uses'=>'AnswerController@update' ) );
  Route::delete('answer/{id}', array('uses'=>'AnswerController@destroy' ) );
  Route::post('set_chosen_answer', array('uses'=>'AnswerController@set_chosen_answer' ) );
  



  // Create a quick API to get data for the tags
  Route::group(['prefix'=>'api','middleware' => 'auth'], function(){
      Route::get('find', function(Illuminate\Http\Request $request){
          $keyword = $request->input('keyword');
          $tags = DB::table('tags')->where('name','like','%'.$keyword.'%')
              ->select('tags.id','tags.name','tags.display')
              ->get();
          return json_encode($tags);
      })->name('api.tags');
  });

  // Votes
  Route::post('vote', array( 'before'=>'csfr','uses'=>'VoteController@vote' ) );
  //Route::get('votes/{qid}', array( 'before'=>'csfr','uses'=>'VoteController@index' ) );
 // Route::post('vote/question', array( 'before'=>'csfr','uses'=>'VoteController@vote_question' ) );

  //userfollowing

  Route::post('follow', array( 'uses'=>'UserFollowingController@insert' ) );
  Route::post('unfollow', array( 'uses'=>'UserFollowingController@destroy' ) );

  Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
  Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


  Route::get('{slug}', [
    'uses' => 'UserController@getProfileBySlug'
])->where('slug', '([A-Za-z0-9\-\/]+)');
