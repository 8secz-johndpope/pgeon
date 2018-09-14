<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Config;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/questions';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        /** flow 
         * backUrl is mainly for redirecting user to question detail page where they were visiting before login/signup
         * for login simply redirect to questions if no backurl
         * FOR registration
         *      login.blade will carry backUrl to registration controller
         *      it will passt it to step2.
         *      step2 submit is handled in usercontroller update..it will set redirct url after submit to backurl
         *      finally backUrl session will be deleted on question detail page 
         */
        Session::put('backUrl', URL::previous());
       
        
    }

    /**
    * Redirect the user to the GitHub authentication page.
    *
    * @return Response
    */
//    public function redirectToProvider($provider)
//    {
       
//        return Socialite::driver($provider)->redirect();
//    }



    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->scopes([
            "publish_actions, manage_pages", "publish_pages"])->redirect();
    }



    /**
     * Obtain the user information from Facebook.
     *
     * @return void
     */
    public function handleProviderFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $array_user = $this->findOrCreateUser($user, 'facebook');
       $authUser = $array_user['user'];
       $registered_new =  $array_user['registred_new'];
       Auth::login($authUser, true);
       if($registered_new)
            return redirect('/step2');
       else 
           return redirect($this->redirectTo());
    }

   /**
    * Obtain the user information from GitHub.
    *
    * @return Response
    */
   public function handleProviderCallback($provider)
   {
       $user = Socialite::driver($provider)->user();

       $array_user = $this->findOrCreateUser($user, $provider);
       $authUser = $array_user['user'];
       $registered_new =  $array_user['registred_new'];
       Auth::login($authUser, true);
       if($registered_new)
            return redirect('/step2');
       else 
           return redirect($this->redirectTo());
        
       

       // $user->token;
   }


   public function findOrCreateUser($user, $provider)
   {
 
       $authUser = User::where('provider_id', $user->id)->first();
       if ($authUser) {
           $registred_new = false;
       }else{
            
           $authUser = User::create([
           'name'     => $user->name,
           'email'    => $user->email,
           'provider' => $provider,
           'provider_id' => $user->id,

       ]);
       User::generateSlug($authUser);

        $registred_new = true;
       }
       return array('user' => $authUser, "registred_new" => $registred_new);
   }

   protected function redirectTo()
   {
       return Session::get('backUrl') ? Session::get('backUrl') :   $this->redirectTo;
       
   }
   
}
