@extends('layouts.app')

@section('content')

<section class="log-in">

  <div class="container-fluid">
    <div class="row">

      <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
		<!-- CONTENT -->

         <div class="contents white-bg conntents-padding">

             <div class="nav_details regs_form">

                 <div class="title text-center"><h2>Log in</h2></div>

                 <div class="continue_with">
                     <ul>
                        <li><a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"  href=""><i class="fa fa-twitter"></i> Continue with Twitter</a></li>
                         <li><a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" href=""><i class="fa fa-facebook"></i> Continue with Facebook</a></li>
                     </ul>
                 </div>

                 <hr>

                 <p >Or use email and password</p>

               <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                   {{ csrf_field() }}

                   <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                       <div >
                           <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                           @if ($errors->has('email'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('email') }}</strong>
                               </span>
                           @endif
                       </div>
                   </div>


                   <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                       <div >
                           <input id="password" type="password" class="form-control" name="password" required>

                           @if ($errors->has('password'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('password') }}</strong>
                               </span>
                           @endif
                       </div>
                   </div>


                   <div class="form-group">
                       <div class="col-md-6 col-md-offset-4">
                           <div class="checkbox">
                               <label>
                                   <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                               </label>
                           </div>
                       </div>
                   </div>

                     <div class="submit_panel text-center">
                         <input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Login" name="register">
                         <a class="pull-right" href="{{ route('password.request') }}">Forgot my password</a>
                     </div>
                 </form>

             </div>
         </div>

         <div class="footer_nav">
             <ul>
                 <li><a href="">Home</a></li>
                 <li><a href="">Register</a></li>
                 <li><a href="">Search</a></li>
                 <li><a href="">About</a></li>
                 <li><a href="">Contact</a></li>
             </ul>
         </div>
      </div>
    </div>
  </div>
</section>


@endsection
