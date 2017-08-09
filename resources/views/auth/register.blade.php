@extends('layouts.app')

@section('content')



      <div class="container p-t-md log-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="contents white-bg conntents-padding">

                     <div class="nav_details regs_form">

                         <div class="title text-center"><h2>Register</h2></div>

                            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                    
                                
                             <div class="formgroup{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name"></label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="Name">
                                 
                                  @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                             </div>
                                
                             <div class="formgroup">
                                <label for="email"></label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required  placeholder="Email">
                                  @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                             </div>
                             <div class="formgroup">
                                <label for="pw"></label>
                                <input type="text" id="pw" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                             </div>
                             <div class="formgroup">
                                <label for="cpw"></label>
                                <input type="text" id="cpw" name="cpassword" name="password_confirmation" required  placeholder="Confirm Password">
                             </div>

                             <div class="submit_panel">
                                 <input class="btn btn-primary-outline btn-sm" type="submit" value="Register" name="register">
                                 <a href="/" class="cancel">Cancel</a>
                             </div>
                         </form>

                     </div>
                 </div>

                 <div class="footer_nav">
                     <ul>
                         <li><a href="/">Home</a></li>
                         <li><a href="{{ route('register') }}">Register</a></li>
                         <li><a href="">Search</a></li>
                         <li><a href="">About</a></li>
                         <li><a href="">Contact</a></li>
                     </ul>
                 </div>
                </div>
            </div>
        </div>



@endsection
