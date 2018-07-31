@extends('layouts.app-no-top-bar', ['back' => true])

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
                        <div class="alert alert-success">
                            {{ session('status') }}
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
