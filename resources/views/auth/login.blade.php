@extends('layouts.app')

@section('content')



        <div class="container-fluid container-fill-height">
        
            <div class="container-content-middle">
             <form role="form" class="m-x-auto text-center app-login-form" method="POST" action="{{ route('login') }}">
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
                    <p style="text-align: left;margin-left: 5px">Or use email and password</p>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                     @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                      @endif
                        <input class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                     @if ($errors->has('password'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                    @endif
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="m-b" style="margin-top: 10px;float: right">
                        <a href="{{ route('register') }}" class="btn btn-default">Sign up</a>
                        <button  type="submit" class="btn btn-primary">Log In</button>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-muted" style="float: left;margin-left: 5px;margin-top: 5px">Forgot password</a>
                </form>
            </div>
        </div>
        








@endsection
