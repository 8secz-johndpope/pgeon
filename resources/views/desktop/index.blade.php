@extends('layouts.app-desktop')

@section('content')

<main>
			<div class="left-half">
				<h1 class="main-heading">Discover Popular Opinions</h1>
				<p class="description">A mobile-web application that helps influencers better communicate with their audience.</p>
				<div class="mobile-text">
					<label id="lbl-msg" for="">Get the link via text message</label>
					<div class="input-dropdown">
						<div class="dropdown-container">
							<select class='country' id="country-select">
								<option data-countrycode="US" value="1">
									US +1
								</option>
							</select>
						</div><input class="orange-caret" id="tel-number" name="telephone" placeholder='(123) 456-7890' type="tel">
					</div><button class="btn btn-send-link hidden-o"><img alt="" src="{{ asset('img/svg/loading.svg') }}"> <span>Text Me The Link</span></button>
				</div>
			</div><!-- end left side-->
			<div class="right-half">
				<div class="illustration">
					<img alt="" src="{{ asset('img/svg/iphone.svg') }}">
					<div class="illustration__response">
						<img alt="" src="{{ asset('img/svg/respond.svg') }}">
						<h3>Respond</h3>
					</div>
					<div class="illustration__vote">
						<img alt="" src="{{ asset('img/svg/vote.svg') }}">
						<h3>Vote</h3>
					</div>
					<div class="illustration__earn-points">
						<img alt="" src="{{ asset('img/svg/earn-points.svg') }}">
						<h3>Earn Points</h3>
					</div>
				</div>
			</div><!-- end right side-->
    </main>
@endsection



@section('signup')

<section class="signup {{ $errors->has('email') ? 'signup--show' : ''  }}">
		<div class="signup__close">
			<a class="closebtn" href="javascript:void(0)">×</a>
		</div>
		<div class="signup__inner">
		<div class="signin-section  {{ $errors->has('email') ? '' : 'hidden'  }} ">
<form action="{{ route('login') }}" method="POST" class="login__form mb15p" id="login__form" >
      {{ csrf_field() }}
        <div class="pgn-textfield mb10p  {{ $errors->has('email') ? 'pgn-textfield-error' : ''  }}">
          <input class="pgn__input " name="email" type="email" id="login_email" >
          <label class="pgn__label" for="login_email">Email</label>

        </div>

        <div class="pgn-textfield mb15p password_showable {{ $errors->has('email') ? 'pgn-textfield-error' : ''  }}">
          <input class="pgn__input " type="password" name="password" id="login_password">
          <label class="pgn__label" for="login_password" >Password</label>
          <span class="input__rightbtn dn" id="show_password">
            Show
          </span>

           <p class="pgn-textfield-errorMessage" data-error="password">{{$errors->first('email') }}</p>
           <br />
        </div>


        <input class="m0 pg-btn btn-submit pointer" type="submit" name="submit" value="Login Now">

        
      </form>
      <div class="forgot_password">
          <a href="{{ route('password.request') }}">Forgot Password?</a>
            </div>

      
      
</div>

	


			<div class="social-login hidden">

  <a href="{{ url('/auth/twitter') }}">
				<div class="social-login__item social-login__item--twitter">
                  
                    <img alt="" src="{{ asset('img/svg/twitter-2.svg') }}"> <span>Connect with Twitter</span>
                 
                </div>
                </a>
                <a href="{{ url('/auth/facebook') }}">

				<div class="social-login__item social-login__item--facebook">
                    <img alt="" src="{{ asset('img/svg/facebook-f-2.svg') }}"> <span>Connect with Facebook</span>
                </div>
                </a>
                <a  href="/register">
				<div class="social-login__item social-login__item--email">
                    <span></span>
                  
                    
                    <span>Signup with Email</span>

                </div>
                </a>
                
				<div class="signin-text">
					<span>Already have an account? <a href="">Click here</a></span>
				</div>
				<div class="visit-mobile-text">
					<span>You can visit our mobile site at <a href="http://m.pgeon.net">https://m.pgeon.com</a></span>
				</div>
			</div>
		</div>
    </section>
    
    @endsection
