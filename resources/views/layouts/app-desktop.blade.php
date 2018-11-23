<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800" rel="stylesheet">
	
	<link href="{{ asset('css/desktop.css') }}" rel="stylesheet">
	<title>Pgeon</title>
</head>
<body>
	<div class="wrapper">
		<header>
			<div class="header__inner">
				<img alt="pgeon" class="logo" src="{{ asset('img/svg/pgeon_text_logo.svg') }}">
				<nav class="main-nav">
					<ul>
						<!-- <li href="/">About</li>
            <li href="/">Help/FAQ's</li>
            <li href="/">Contact</li>
            <li href="/">Pricing</li> -->
						<li><button class="btn btn-login">Login</button> <button class="btn btn-signup">Signup</button></li>
					</ul>
				</nav>
				<div class="hamburger-icon">
					<span></span> <span></span> <span></span>
				</div>
			</div>
    </header>
    

      @yield('content')

		<footer class="page-footer">
			<div class="social">
				<a href="#"><img alt="" src="{{ asset('img/svg/facebook-f-2.svg') }}"></a> <a href="#"><img alt="" src="{{ asset('img/svg/twitter-2.svg') }}"></a> <!-- <a href="#">
        <img src="./svg/medium-m.svg" alt="">
        </a> -->
			</div>
			<div class="legal">
				<a>2018 Pgeon</a> <span>|</span> <a href="">Terms and Conditions</a>
			</div>
		</footer>
	</div>
	
	@yield('signup')


	<script src="{{ asset('js/countries.js') }}">
	</script>
	<script src="{{ asset('js/desktop.js') }}">	</script>
</body>
</html>
