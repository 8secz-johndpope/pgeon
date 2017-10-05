@extends('layouts.app-no-logo')

@section('content')

<div class="container-fluid container-fill-height">
            <div class="container-content-middle">
            @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <form role="form"  method="POST" class="m-x-auto text-center app-login-form" action="{{ route('password.request') }}">
                {{ csrf_field() }}
                 <input type="hidden" name="token" value="{{ $token }}">
                    <a href="/" class="app-brand" style="width:55px">
                        <img src="{{URL::asset('img/pgeon-logo-mobile.svg')}}" alt="brand">
                    </a>
                    <h4 style="text-decoration:underline">Reset your password</h4>
                    <p style="text-align: center;margin-left: 5px">Enter a combination of letters, numbers, and symbols for increased security.</p>
                   
                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <input id="email" type="email" placeholder="Confirm your email here" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                    
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password" placeholder="New password..">
                         @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <input  id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm new password..">
                        @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="m-b" style="margin-top: 10px;float: right">
                    <button type="submit" class="btn btn-primary">Continue</button>
                    </div>
                </form>
            </div>
            







@endsection
