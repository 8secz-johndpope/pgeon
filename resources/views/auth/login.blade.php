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
                        <button class="btn btn-default">Sign up</button>
                    </div>
                    <footer class="screen-login">
                        <a href="{{ route('password.request') }}" class="text-muted">Forgot password</a>
                    </footer>
                </form>
            </div>
        </div>




@endsection
