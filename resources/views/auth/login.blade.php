@extends('layouts.app')

@section('content')



     <div class="container p-t-md log-in">
         <form role="form" class="" method="POST" action="{{ route('login') }}">
                  {{ csrf_field() }}
             
            <div class="row">
                <div class="col-md-12">
                    <div class="contents white-bg conntents-padding">
                        <div class="nav_details regs_form">
                            <div class="title text-center">
                                <h2>Log in</h2>
                            </div>
                            <div class="continue_with">
                                <ul>
                                    <li>
                                        <a href="{{ url('/auth/twitter') }}"><i class="fa fa-twitter"></i> Continue with Twitter</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/auth/facebook') }}"><i class="fa fa-facebook"></i> Continue with Facebook</a>
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <p>Or use email and password</p>
                            <form action="">
                                <div class="formgroup{{ $errors->has('email') ? ' has-error' : '' }}">
                                    @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                                    <label for="email"></label>
                                    <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                                </div>
                                <div class="formgroup">
                                     @if ($errors->has('password'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                    @endif
                                    <label for="pw"></label>
                                    <input type="password" id="password" name="password" placeholder="Password">
                                </div>
                                <div class="submit_panel">
                                    <input class="btn btn-primary-outline btn-sm" type="submit" value="Login" name="register">
                                    <button class="cancel">Cancel</button>
                                    <a class="pull-right" href="{{ route('password.request') }}" style="padding-top: 8px">Forgot my password</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer_nav">
                        <ul>
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">Register</a>
                            </li>
                            <li>
                                <a href="">About</a>
                            </li>
                            <li>
                                <a href="">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
         </form>
        </div>




@endsection
