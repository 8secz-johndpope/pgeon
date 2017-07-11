@extends('layouts.app')

@section('content')
<div class="log-in">
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
		<!-- CONTENT -->

         <div class="contents white-bg conntents-padding">

             <div class="nav_details regs_form">

                 <div class="title text-center"><h2>Register</h2></div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <div >
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Name">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div >
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required  placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div >
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">

                            <div >
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required  placeholder="Confirm Password">
                            </div>
                        </div>

                      <div class="submit_panel">
                            <div class="col-md-6 col-md-offset-4">
                              <input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" value="Register">
                               <button class="cancel">Cancel</button>
                            </div>
                        </div>
                    </form>



                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
<!--Other form fields above the button-->
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
        
        </div>
    </div>
    <hr>

</form>
                  </div>
      </div>

      <div class="footer_nav">
          <ul>
              <li><a href="">Home</a></li>
              <li><a href="">Search</a></li>
              <li><a href="">About</a></li>
              <li><a href="">Contact</a></li>
          </ul>
      </div>
   </div>
 </div>
</div>
</section>
</div>
@endsection
