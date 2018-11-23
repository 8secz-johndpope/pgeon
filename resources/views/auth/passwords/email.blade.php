@extends('layouts.app-no-top-bar', ['back' => '/login'])

@section('content')


        <div class="display-name-section mt50p">
            <div class="pl-20 pr-20">
                <div class="dn-top mb20p">
                    <h2>Forgot Password?</h2>
                </div>

                <div class="dn-form for-pw">

                    <form role="form" class="m-x-auto text-center app-login-form" method="POST" action="{{ route('password.email') }}">
                  {{ csrf_field() }}

   
   @if (session('status'))
                       


            <div class="rtol mb20p">
                <div class="rtol-box">
                    <p class="m0 mb15p">Password reset instruction has been sent to the registered email address. </p>
                    <a class="m0 pg-btn pointer btn-submit" href="/login/email" >
                        Return to Login
                    </a>
                </div>
            </div>

            <div class="agreement edas">
                <p>If the email doesn’t arrive soon, please check your spam folder.</p>
            </div>


                    @endif

                      <div class="pgn-textfield mb15p">
                        <input class="pgn__input" type="email" id="email-address" name="email"  value="{{ old('email') }}">
                        <label class="pgn__label" for="email-address">Email</label>
                      </div>

       @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif

                      <p class="ac" id="status-message"></p>

                      <input class="pg-btn btn-submit pointer m0" type="submit" name="submit" value="Send Instruction">
                    </form>
                </div>

            </div>
        </div>


  
        
        
@endsection
