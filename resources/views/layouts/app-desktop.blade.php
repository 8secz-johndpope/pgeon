<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <meta name="msapplication-TileImage" content="/img/favicon/mstile-144x144.png">
    <link rel="manifest" href="/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#f8f9f9">
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
				<a href="https://twitter.com/itspgeon"><img alt="" src="{{ asset('img/svg/facebook-f-2.svg') }}"></a> <a href="https://www.facebook.com/itspgeon"><img alt="" src="{{ asset('img/svg/twitter-2.svg') }}"></a> <!-- <a href="#">
        <img src="./svg/medium-m.svg" alt="">
        </a> -->
			</div>
			<div class="legal">
				<a>2018 Pgeon</a> <span>|</span> <a href="/terms-of-service">Terms and Conditions</a>
			</div>
		</footer>
	</div>
	
	@yield('signup')


	<script src="{{ asset('js/countries.js') }}">
	</script>
	<script src="{{ asset('js/desktop.js') }}">	</script>
</body>
</html>
