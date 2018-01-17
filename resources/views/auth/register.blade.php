@extends('layouts.app-no-logo')

@section('content')



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
                                <a href="{{ url('/auth/twitter') }}"><span class="icon icon-twitter" style="float: left;margin-left: 10px"></span>Continue with Twitter</a>
                            </li>
                            <li>
                                <a href="{{ url('/auth/facebook') }}"><span class="icon icon-facebook" style="float: left;margin-left: 10px"></span>Continue with Facebook</a>
                            </li>
                        </ul>
                    </div>
        <hr>
        <p style="text-align: left;margin-left: 5px">Or sign up with email</p>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <input  id="email" name="email" value="{{ old('email') }}" required class="form-control" placeholder="Email">
           @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
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
