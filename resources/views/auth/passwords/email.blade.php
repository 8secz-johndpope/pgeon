@extends('layouts.app')

@section('content')



  <div class="container p-t-md log-in lost">
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="login_head">
                         <div class="title text-center"><h2>Lost password</h2></div>
                     </div>

                     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                     <div class="contents white-bg conntents-padding">

                         <div class="nav_details regs_form">



                              <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                                 <div class="formgroup{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email"></label>
                                    <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                     @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                 </div>

                                 <div class="submit_panel">
                                     <input class="btn btn-primary-outline btn-sm" type="submit" value="Send" name="send">
                                     <a class="cancel" href="/">Cancel</a>
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
