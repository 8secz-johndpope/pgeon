@extends('layouts.app')

@section('content')

   <div class="container-fluid container-fill-height">
            <div class="container-content-middle">
                <form role="form" class="m-x-auto text-center app-login-form" method="POST" action="{{ route('password.email') }}">
                  {{ csrf_field() }}
                    <a href="/" class="app-brand" style="width:55px">
                        <img src="{{URL::asset('img/pgeon-logo-mobile.svg')}}" alt="brand">
                    </a>
                    <p style="text-align: left;margin-left: 5px">Forgot password</p>
                    
                     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input placeholder="Email" class="form-control" type="email" id="email" name="email"  value="{{ old('email') }}" required>
                          @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                    </div>
                    <div class="m-b" style="margin-top: 10px;float: right">
                        <a href="/login" style="padding-right: 10px">Back</a>
                        <input type="submit" class="btn btn-primary"  value="Send" >
                    </div>
                </form>
            </div>
        </div>
        
        
        







@endsection
