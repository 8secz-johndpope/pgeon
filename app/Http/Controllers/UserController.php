<?php

namespace App\Http\Controllers;


use App\Answer;
use App\Question;
use App\User;
use App\UserFollowing;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Image;
use Route;
use Helper;


class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index($id)
    {
        $user = User::findOrFail($id);

        if (!$user)
            abort(404, "Page Not Found");

        $questions = Question::where('user_id', '=', $id)->take(10)->orderBy('id','DESC')->get();
        $answers = Answer::where('user_id', '=', $id)->take(10)->orderBy('id','DESC')->get();
        return view('user.index')->with('questions',$questions)->with('user',$user)->with('answers',$answers)->with('page_title', $user->name . '');
    }

    public function questions($id)
    {
        $user = User::findOrFail($id);
        $questions = Question::where('user_id', '=', $id)->orderBy('id','DESC')->paginate(10);
        return view('user.questions')->with('questions',$questions)->with('user',$user)->with('page_title', $user->name . ' Questions');
    }

    public function answers($id)
    {
        $user = User::findOrFail($id);
        $answers = Answer::where('user_id', '=', $id)->orderBy('id','DESC')->paginate(10);
        return view('user.answers')->with('user',$user)->with('answers',$answers)->with('page_title', $user->name . 'Answers');
    }

    public function participation($id) {
        $user = User::findOrFail($id);
        $questions = User::get_participation($id);

        return view('user.participation')->with('user',$user)->with('questions',$questions)->with('page_title', $user->name . 'Answers');
    }

    public function profile () {
      $user = Auth::user();
      $error = "";
      return view('user.profile')->with('user',$user)->with('error',$error);

    }

    public function security () {
      $user = Auth::user();
      $error = "";
      return view('user.security')->with('user',$user)->with('error',$error);

    }

    
    public function step2 () {
  
        return view('user.step2');
        
    }
    

    public function membership () {
      $user = Auth::user();

       $followers_counts = UserFollowing::get_followers_count($user->id);
      $error = "";
      if($user->subscribedToPlan('pgeon_monthly','main')) {
        $plan = "Monthly";
        $user_type = "Member";
      }elseif($user->subscribedToPlan('pgeon_yearly','main')) {
        $plan = "Yearly";
        $user_type = "Member";
      }else {
        $plan = "Free";
        $user_type = "Standard";
      }

      return view('user.membership')->with('user',$user)->with('error',$error)->with('plan', $plan)->with('followers_counts', $followers_counts)->with('user_type', $user_type);

    }


    public function preferences () {

        /*

        $followers_counts = UserFollowing::get_followers_count($user->id);
        $error = "";
        if($user->subscribedToPlan('pgeon_monthly','main')) {
            $plan = "Monthly";
            $user_type = "Member";
        }elseif($user->subscribedToPlan('pgeon_yearly','main')) {
            $plan = "Yearly";
            $user_type = "Member";
        }else {
            $plan = "Free";
            $user_type = "Standard";
        }
        */
        $user = Auth::user();
        return view('user.preferences')->with('subscribed_to_newsletter',$user->subscribed_to_newsletter);

    }


    public function notifications () {
      $user = Auth::user();
      $error = "";
      return view('user.notifications')->with('user',$user)->with('error',$error);

    }



    private function slugCheck() {
        
    }
    
    public function subscribe()
    {
         $user = Auth::user();
         $stripeToken = Request::input('stripeToken');
         $plan = Request::input('plan');
         try {
           $user->newSubscription('main', $plan)->create($stripeToken, [
              'email' => $user->email,
        ]);

            $user->role_id = 3;
            $user->save();
             return back()->with('success','Subscription is completed.');
         } catch (Exception $e) {
             return back()->with('success',$e->getMessage());
         }

    }


    public function update(){
      $user = Auth::user();

       if (Request::input('step2') == 1) {
           $view = "user.step2";
           $success_view = "/questions";
       }else {
           $success_view = '/profile';
           $view = "user.profile";
       }
       
    	// Handle the user upload of avatar
    	if(Input::hasFile('avatar')){
        $image = Input::file('avatar');
        $filename  = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('/uploads/avatars/' . $filename);
        Image::make($image->getRealPath())->resize(200, 200)->save($path);
    		$user->avatar = $filename;
    	}





//only save the slug if he is a member
    //  if($user->role_id == 3) {

      if (Request::input('slug')) {


        $validator = Validator::make(Request::all(), [
             'slug' => 'max:25|alpha_num',

         ]);


         if ($validator->fails()) {
             flash('Invalid display name. Should not contain special chars and should not exceed 25 letters.');
             return view($view)->with('user',$user);
         }

         $routes = [];
         $slugs = User::select('slug')->whereNotIn('id', [$user->id])->get();

         foreach ($slugs as $key => $val) {
             $routes[]  = $val['slug'];
         }

         // You need to iterate over the RouteCollection you receive here
         // to be able to get the paths and add them to the routes list
         foreach (Route::getRoutes() as $route)
         {
             $routes[] = $route->uri;
         }

         $slug = Request::input('slug');

         if (in_array ($slug, $routes)) {
             flash("'$slug' taken! Try another one.");
             return view($view)->with('user',$user);
         }


         $user->slug = $slug;

      //}
      }

      if (Request::input('bio')) {
        $user->bio = Request::input('bio');
      }


      if (Request::input('subscribed_to_newsletter') != null ) {
          $user->subscribed_to_newsletter = Request::input('subscribed_to_newsletter');
      }

      $user->save();
    
      return redirect($success_view)->with('user',$user);

    }

    public function getProfileBySlug($slug) {
        $user = User::where('slug', '=', $slug)->first();
        return $this->showPublicProfile($user);
    }

    public function getProfile($id) {
          $user =  User::find($id);
          return $this->showPublicProfile($user);
    }

    private function showPublicProfile($user) {
      if(!$user)
            return view('user.usernotfound');
          else {
              $replies = User::replies($user->id);
             
              
         
              $is_following = false;
              if (Auth::user()) {
                  $current_user = Auth::user();
                  $followings = UserFollowing::get_followers($current_user->id)->toArray();
                  if (in_array($user->id, $followings)) {
                      $is_following = true;
                  }
              }
                          
              return view('user.public_profile')->with('user',$user)->with('replies', $replies)->with('points', User::get_points($user->id))->with('is_following', $is_following);
          }
    }

   public function topResponders($user_id) {
      $users = User::get_users_of_accepted_answers($user_id);
      return response()->json($users);
   }

    public static function fetchConvoFromTargetUser($answered_by, $question_by) {
        
        $convo = User::fetchQandA($answered_by, $question_by);
        return response()->json($convo);
        
    }


    public function points() {
      return $this->id;
    }

    public function notification_count() {
        $user = Auth::user();
        return $user->notifications()->where('seen','=',0)->count();
    }

    public static function getAcceptedAnswersOfUser($user_id) {
        $topAnswers = User::get_accepted_answers_of_user($user_id);
        $response = array();

        foreach ($topAnswers as $key => $val) {
            $val->created_at =  Helper::calcElapsed($val->expiring_at);
            $response[] = $val;
        }

        return response()->json($response);
    }
}
