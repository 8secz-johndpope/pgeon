@extends('layouts.app-no-top-bar', ['back' => false])

@section('content')



   <div class="signup-group">
      <div class="row mlr38 tc">
        <a class="db pg-btn pointer cw-twitter flex items-center justify-center login__btn" href="{{ url('/auth/twitter') }}">
          <div class="dib flex items-center w6">
            {{Helper::read_svg("img/svg/twitter.svg")}}
              <span> Connect with Twitter </span>
          </div>
        </a>
        <a class="db pg-btn pointer cw-fb flex items-center justify-center  login__btn" href="{{ url('/auth/facebook') }}">
          <div class="dib flex items-center w6">
            {{Helper::read_svg("img/svg/facebook.svg")}}
              <span>
                Connect with Facebook
             </span>
          </div>
        </a>
        <a class="db pg-btn pointer sw-email flex items-center justify-center login__btn" href="/register">
          <div class="dib flex items-center w6">
            <svg></svg>
            <span> Signup with Email </span>
          </div>
        </a>
      </div>
    </div>

    <div class="ah-login tc mt50p">
      <p>Already have an account? <a href="/login">Tap to login</a></p>
    </div>    


 



@endsection
