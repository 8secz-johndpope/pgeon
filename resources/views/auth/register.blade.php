@extends('layouts.app-no-top-bar', ['back' => false])

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

              @if ($errors->has('password'))
                <p class="pgn-textfield-errorMessage">{{ $errors->first('password') }} </p>
              @endif

            </div>
            <invisible-recaptcha sitekey="6Lff8j8UAAAAABzFzl1iB44SwsOgtJckdUbO8C9A" :validate="captcha_validate" :callback="captcha_callback" class="pg-btn pointer btn-submit m0" type="submit" id="do-something-btn" :disabled="captcha_loading" >
   Signup Now
</invisible-recaptcha>
          </form>
        </div>
        <div class="agreement">
          <p class="m0">By creating an account and signing up to Pgeon, I accept the <a href="/terms-of-service">Terms of Service</a> and <a href="/privacy-policy">Privacy Policy</a></p>
        </div>
      </div>
    </div>






























@endsection
