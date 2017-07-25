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

  Route::get('/', 'Auth\LoginController@showLoginForm');


  Route::group(['prefix' => 'admin'], function () {
      Voyager::routes();
      Route::group(['middleware' => 'admin.user'], function()
      {
            Route::resource('questions', 'Voyager\VoyagerQuestionController');
      });
  });

  Auth::routes();

  //Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');;

  Route::get('/people', 'HomeController@people')->name('people')->middleware('auth');
  Route::get('/search', 'HomeController@search')->name('search')->middleware('auth');;

  Route::get('/followers', 'HomeController@followers')->middleware('auth');;


  //
  Route::get('/profile', 'UserController@profile')->name('profile');
  Route::post('profile', 'UserController@update');
  Route::post('subscribe', 'UserController@subscribe');
  Route::get('settings', 'UserController@settings');
  Route::get('membership', 'UserController@membership');
  Route::get('notifications', 'UserController@notifications');

  // User Routes
  //Route::get('user/{id}', 'UserController@index')->name('profile');


  Route::get('user/{id}', 'UserController@getProfile');
  Route::get('user/{id}/questions', 'UserController@questions');
  Route::get('user/{id}/answers', 'UserController@answers');
  Route::get('user/{id}/participation', 'UserController@participation');

  // User Routes
  Route::get('level/{level}', 'LevelController@index');

  // Question Routes
  Route::get('questions/', 'QuestionController@index');
  Route::get('questions/new', 'QuestionController@newest');
  Route::get('question/{id}/{question}', 'QuestionController@show');
  Route::post('question', array( 'before'=>'csfr','uses'=>'QuestionController@insert' ) );
  Route::get('question/ask', function () {
      return view('questions.ask', ['tags' => App\Tag::get()]);
  });

  // Answer Routes
  Route::post('answer', array( 'before'=>'csfr','uses'=>'AnswerController@insert' ) );
  Route::post('answer/update', array( 'before'=>'csfr','uses'=>'AnswerController@update' ) );

  // Tag Routes
  Route::get('tag/{id}', 'TagController@show_new');
  Route::get('tag/{id}/top', 'TagController@show_top');
  Route::get('tag/{id}/most_answered', 'TagController@show_most_answered');
  Route::get('tag/{id}/unanswered', 'TagController@show_unanswered');

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
  Route::post('vote/answer', array( 'before'=>'csfr','uses'=>'VoteController@vote_answer' ) );
  Route::post('vote/question', array( 'before'=>'csfr','uses'=>'VoteController@vote_question' ) );

  //userfollowing

  Route::post('follow', array( 'uses'=>'UserFollowingController@insert' ) );
  Route::post('unfollow', array( 'uses'=>'UserFollowingController@destroy' ) );

  Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
  Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


  Route::get('{slug}', [
    'uses' => 'UserController@getProfileBySlug'
])->where('slug', '([A-Za-z0-9\-\/]+)');
