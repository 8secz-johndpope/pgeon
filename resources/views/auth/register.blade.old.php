@extends('layouts.app-no-top-bar')

@section('content')



    





    <div class="display-name-section mt50p">
      <div class="row pl-20 pr-20">
        <div class="dn-top mb20p">
          <h2 class="m0">Signup</h2>
        </div>

        <div class="dn-form mb15p">
        <form class="m-x-auto text-center app-login-form" role="form" method="POST" id="frm_register" action="{{ route('register') }}">
                        {{ csrf_field() }}

            <div class="pgn-textfield mb10p" id="signup_email">



              <input class="pgn__input azure-caret" type="email" value="{{ old('email') }}" id="signup_email_input" name="email" disabled>


              <label class="pgn__label" for="signup_email_input">Email</label>
              @if ($errors->has('email'))
                <p class="pgn-textfield-errorMessage">{{ $errors->first('email') }} </p>
              @endif
            </div>
            <div class="pgn-textfield mb15p">
              <input class="pgn__input azure-caret" type="password" id="signup_password" name="password" disabled>
              <label class="pgn__label" for="signup_password">Password</label>
              <span class="input__rightbtn dn" id="show_password">
                Show
              </span>
              <p class="pgn-textfield-errorMessage"></p>
            </div>
            <input class="pg-btn pointer btn-submit m0" type="submit" value="Signup Now">

          </form>
        </div>
        <div class="agreement">
          <p class="m0">By creating an account and signing up to Pgeon, I accept the <a href="/signup/terms">Terms of Service</a> and <a href="/signup/policy">Privacy Policy</a></p>
        </div>
      </div>
    </div>
























  <div class="container-fluid container-fill-height">
    <div class="container-content-middle">
    
        <form class="m-x-auto text-center app-login-form" role="form" method="POST" id="frm_register" action="{{ route('register') }}">
                        {{ csrf_field() }}
        <a href="/" class="app-brand m-b-md" style="width:55px">
                        <img src="{{URL::asset('img/pgeon-logo-mobile.svg')}}" alt="Pgeon">
                    </a>
          <div class="continue_with">
                        <ul>
                            <li>
                                <a href="{{ url('/auth/twitter') }}"><span class="fab fa-twitter fa-lg" style="float: left;margin-left: 10px"></span>Continue with Twitter</a>
                            </li>
                            <li>
                                <a href="{{ url('/auth/facebook') }}"><span class="fab fa-facebook fa-lg" style="float: left;margin-left: 10px"></span>Continue with Facebook</a>
                            </li>
                        </ul>
                    </div>
        <hr>
        <p style="text-align: left;margin-left: 5px">Or sign up with email</p>

        
        <!-- <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <input name="name" value="{{ old('name') }}" required type="text" class="form-control" placeholder="Name">
           @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
           @endif
        </div> -->



        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <input  id="email" name="email" value="{{ old('email') }}" type="email" required class="form-control" placeholder="Email">

        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <input type="password" class="form-control"  id="pw" name="password" required  placeholder="Password">
           @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

        </div>
        <div class="form-group">
          <input type="password" id="cpw" name="password_confirmation" required  class="form-control" placeholder="Confirm password">

        </div>
        <div class="m-b captcha-container" style="margin-top: 10px;float: right">

          <a href="/" style="padding-right: 10px">Back</a>

          <invisible-recaptcha sitekey="6Lff8j8UAAAAABzFzl1iB44SwsOgtJckdUbO8C9A" :validate="captcha_validate" :callback="captcha_callback" class="btn btn-primary" type="submit" id="do-something-btn" :disabled="captcha_loading" >
   Sign up
</invisible-recaptcha>
        </div>
      </form>

    </div>
  </div>






@endsection
