@extends('layouts.app')

@section('content')


<div class="container-fluid container-fill-height">
            <div class="container-content-middle">
                <form role="form" class="m-x-auto text-center app-login-form" method="POST" action="{{ route('login') }}">
                  {{ csrf_field() }}
                    <a href="/" class="app-brand m-b-lg">
                        <img src="{{URL::asset('img/pgeon-logo.svg')}}" alt="Pgeon">
                    </a>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>


                    </div>
                    <div class="form-group m-b-md">
                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                       <input id="password" type="password" class="form-control" name="password" required>

                    </div>
                    <div class="m-b-lg">
                        <input class="btn btn-primary" type="submit" value="Log In" name="register">

                                           <a href="{{ route('register') }}" class="btn btn-default">Sign up</a>

                    </div>
                    <div class="row">

                      <a class="btn btn-default btn-twitter" href="{{ url('/auth/twitter') }}"><i class="fa fa-twitter"></i> Login with Twitter<span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 2267.31px; height: 2267.31px; transform: translate(-50%, -50%) translate(777px, 18px);"></span></span></a>
                       <a class="btn btn-default btn-facebook" href="{{ url('/auth/facebook') }}" ><i class="fa fa-facebook"></i> Login with Facebook<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></a>
                    </div>
                    <footer class="screen-login">
                        <a href="{{ route('password.request') }}" class="text-muted">Forgot password</a>
                    </footer>
                </form>
            </div>
        </div>




@endsection
