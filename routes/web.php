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

//   Route::post(
//     'stripe/webhook',
//     '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook'
// );

//Route::get('stripe/webhook', 'WebhookController@log');

Route::stripeWebhooks('handle-webhook'); 


Route::get('/', 'QuestionController@index');
Route::get('/u_s', 'UserController@status');
  Route::group(['prefix' => 'admin'], function () {
      Voyager::routes();
      Route::group(['middleware' => 'admin.user'], function()
      {
            
            Route::get('coupon/{id}', 'Voyager\VoyagerCouponController@beneficiaries');
            Route::get('coupons/', 'Voyager\VoyagerCouponController@index');
            Route::get('coupons/create', 'Voyager\VoyagerCouponController@create');
            Route::post('coupons/ins', 'Voyager\VoyagerCouponController@ins');
            Route::get('coupons/delete/{id}', 'Voyager\VoyagerCouponController@destroy');
            Route::get('coupon/stripdown/{user_id}', 'Voyager\VoyagerCouponController@stripDown');
            Route::resource('questions', 'Voyager\VoyagerQuestionController');
            Route::resource('users', 'Voyager\VoyagerUserController');
            //just an override
              Route::get('users', 'Voyager\VoyagerUserController@index')->name('voyager.users.index');
            Route::post('question/{id}/publish', 'Voyager\VoyagerQuestionController@publish')->name('voyager.publish');
      });
  });

  Auth::routes();



  Route::get('bubble', 'UserController@notification_count');



  Route::get('user/{id}', 'UserController@getProfile');
  Route::get('user/{id}/questions', 'UserController@questions');
  Route::get('user/{id}/answers', 'UserController@answers');
  Route::get('user/{id}/topanswers', 'UserController@getAcceptedAnswersOfUser');

  Route::get('user/{id}/topresponders', 'UserController@topResponders');  

  
  // User Routes
  Route::get('qff/{p}/{c}', 'QuestionController@fromfollowers');
  Route::get('featuredq/{p}/{c}', 'QuestionController@featured');
  Route::get('question_details/{id}', 'QuestionController@details');
  Route::get('rff/{p}/{c}', 'QuestionController@responsesfromfollowers');
  Route::get('featuredr/{p}/{c}', 'QuestionController@featuredresponses');
  
   Route::get('question/{id}/{format?}', 'QuestionController@show');
   
   /** r/user/2/user/54 or r/john/jac or r/user/1/jac or r/jac/user/54 **/
   Route::get('r/{keyw1orslug1}/{id1orslug2}/{keyw2?}/{id2?}', 'UserController@fetchOneWayConvoFromTargetUser');
  Route::get('fetchconvo/{answered_by}/{question_by}', 'UserController@fetchConvoFromTargetUser');
  
  Route::get('get_vote_count_for_question/{id}', 'QuestionController@get_vote_count_for_question');

  Route::get('pa/{base64_code}', 'EmailChangeController@processActivation');

  Route::group(array('middleware' => 'auth'), function()
  {
     
    Route::get('coupon/apply/{coupon}', 'AllCouponController@apply');
    Route::post('coupon/subscribe/{coupon_id}', 'AllCouponController@subscribe'  );


    Route::get('cpwd','HomeController@showChangePasswordForm');
    Route::post('cpwd','HomeController@cpwd');
    
      
    Route::post('reportQ', 'QuestionController@reportQ');

    Route::post('changeemail', 'EmailChangeController@changeEmail');

    Route::delete('user', 'UserController@delete');
    Route::delete('usersso', 'UserController@deletesso');

    Route::get('bubble', 'UserController@notification_count');
    
    Route::post('markasseen', 'NotificationController@markAsSeen');
    Route::get('live', 'QuestionController@live');
    Route::get('pending', 'QuestionController@pending');
    Route::get('published', 'QuestionController@published');
    Route::get('notifications/{format?}', 'NotificationController@index');
    // Question Routes
    Route::get('questions/new', 'QuestionController@newest');
   
    Route::post('end_now/{id}', 'QuestionController@end_now');
    Route::delete('notification', 'NotificationController@destroy');
    Route::delete('question/{id}', 'QuestionController@destroy');
    Route::delete('delete_questions/{ids}', 'QuestionController@delete_questions');
    
    
    Route::get('get_votes/{id}/', 'QuestionController@get_votes');
    Route::get('get_votes_with_count/{id}', 'QuestionController@get_votes_with_count');
    
    
    Route::post('accept_answer', array('before'=>'csfr', 'uses'=>'QuestionController@accept_answer' ) );  
    Route::post('question', array( 'before'=>'csfr','uses'=>'QuestionController@insert' ) );
    Route::get('my-questions', 'QuestionController@ask')->name('ask');

    
    Route::get('step2', 'UserController@step2');
    
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::post('profile', 'UserController@update');
    Route::post('updatecard', 'UserController@updatecard');
    Route::post('subscribe', 'UserController@subscribe');
    Route::post('unsubscribe', 'UserController@unsubscribe');
    Route::get('security', 'UserController@security');
     Route::get('membership', 'UserController@membership');
    Route::get('notifications', 'UserController@notifications');
    Route::get('preferences', 'UserController@preferences');

    
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
  

  

  Route::any('{vue_q}', [
    'uses' => 'QuestionController@index'
  ])->where('vue_q', '(questions)');

  Route::any('{vue_r}', [
    'uses' => 'QuestionController@responses'
  ])->where('vue_r', '(responses)');

  //Route::get('responses', 'QuestionController@responses');

  Route::get('{slug}', [
    'uses' => 'UserController@getProfileBySlug'
])->where('slug', '([A-Za-z0-9\-\/]+)');

