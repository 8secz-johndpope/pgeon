@extends('layouts.app-no-top-bar', ['back' => 'signup'])

@section('content')


<div class="display-name-section mt50p">
  <div class="pl-20 pr-20">
    <div class="dn-top mb20p">
      <h2>Login</h2>
    </div>

    <div class="dn-form mb15p">
      <form action="{{ route('login') }}" method="POST" class="login__form" id="login__form" >
      {{ csrf_field() }}
        <div class="pgn-textfield mb10p">
          <input class="pgn__input azure-caret" name="email" type="email" id="login_email" >
          <label class="pgn__label" for="login_email">Email</label>

          @if ($errors->has('email'))
            <p class="pgn-textfield-errorMessage" data-error="email">{{ $errors->first('email') }} </p>
          @endif
        </div>

        <div class="pgn-textfield mb15p password_showable">
          <input class="pgn__input azure-caret" type="password" name="password" id="login_password">
          <label class="pgn__label" for="login_password" >Password</label>
          <span class="input__rightbtn dn" id="show_password">
            Show
          </span>

            @if ($errors->has('password'))

                <p class="pgn-textfield-errorMessage" data-error="password" >{{ $errors->first('password') }} </p>
            @endif
        </div>


        <input class="m0 pg-btn btn-submit pointer" type="submit" name="submit" value="Login Now">
      </form>
    </div>

    <div class="forgot_password">
      <a href="{{ route('password.request') }}">Forgot Password?</a>
    </div>
  </div>
</div>





























@endsection
