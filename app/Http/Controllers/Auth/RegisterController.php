<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Config;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/search';
    protected $backUrl = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        //from login.blade
      //  Session::put('backUrl', base64_decode($request->get('backUrl')));
        $this->middleware('guest');
        
        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

      

       /* $messsages = array(
            'slug.required'=>'You cant leave Email field empty',
            'slug.alpha_num'=>'Cannot contain special characters',
            'slug.max'=>'The field cannot exceed :max chars',
        );*/
        return Validator::make($data, [
            // 'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        
        
        return User::create([
            // 'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
            
        ]);
    }
    
    
    public function register(Request $request)
    {


           
        $validator =  $this->validator($request->all())->validate();

        // $validator = $this->validator($request->all());
        
        // if ($validator->fails()) {
        //     $this->throwValidationException(
        //         $request, $validator
        //         );
        // }
        
        // Removed to prevent auto login
        //Auth::guard($this->getGuard())->login($this->create($request->all()));


        $user = $this->create($request->all());
        
        User::generateSlug($user);

        Auth::login($user);

       
        $skip_url = (session('backUrl'))?session('backUrl'):'/skip';
       // return redirect($this->redirectPath());
        return redirect('/step2')->with('skip_url', $skip_url);
    
    }

    public function showsignup(Request $request) {

       // echo Session::get('backUrl');exit;
        return view('auth.showsignup');
    }
}
