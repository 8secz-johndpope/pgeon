<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>Pgeon</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <meta name="msapplication-TileImage" content="/img/favicon/mstile-144x144.png">
    <link rel="manifest" href="/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#f8f9f9">

	<!-- Fonts files -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
	<!-- Font awesome -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> -->
	<!-- Tachyons css -->
    <!-- <link rel="stylesheet" href="/css/tachyons.css"> -->
    <!-- <link rel="stylesheet" href="/css/styles.css"> -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

  </head>
  <body class="bg-off-white mr-auto ml-auto">

@if (Auth::check())
   <script>
      var user = true
   </script>
@endif
<div  id="app">










   <header class="landing_header relative">
<div class="mw6 m-auto landing_header__inner flex items-center top__header relative  pr15 pl15">
 <div class="logoTitle__container flex">
   <span class="landing__logo fc">
   <img width="22" height="22" src="{{URL::asset('img/main-logo.svg')}}" alt="Pgeon">
   </span>
   <a class="openQuestion__title">
     <span>
       Open Questions
     </span>
     <span class="dropdown__icon ml5p flex flex-center items-center">
     <img src="{{URL::asset('img/svg/chevron-down.svg')}}">

     </span>
   </a>
 </div>

    @if (Auth::check())

    
   <span class="header-right__icons">
     <a href="/people" class="db header-followers pointer mr20p fc">
     {{Helper::read_svg("img/svg/followers.svg")}}

     

     </a>
     <a href="/notifications" class="header-bell  pointer mr20p fc">
       <span class="flex items-center relative">
         <span class="bell-notification-dot"></span>
         {{Helper::read_svg("img/svg/bell.svg")}}

       </span>
     </a>
   
     <span href="/user/profile-with-feeds" class="profile__image pointer slide-menu__trigger fc">
       <avatar src="{{ Helper::avatar(Auth::user()->avatar) }}" :size="36" username="{{Helper::name_or_slug(Auth::user())}}"></avatar>
     </span>
   </span>
   @else
   <a  href="/signup" class="login__links">
     <span>Login / Signup</span>
   </a>
   @endif
</div>



<div class="mobile-dropdown m-auto mw6">
 <a class="pointer" href="/">
   <span>
     Open Questions
   </span>
        {{Helper::read_svg("img/svg/check.svg")}}
   
  
 </a>
 <a class="pointer" href="/responses" >
   <span>
     Published Responses
   </span>
   
 </a>

   @if (Auth::check())
   <a href="/" class="myQuestion-premium-button" >
     <span>
       My Questions
     </span>

     <div class="fc premium-dropdown-item">
       <span class="premium-lock fc">
       {{Helper::read_svg("img/svg/lock-alt.svg")}}   

         <span class="ml5p">Premium</span>
       </span>

       <!-- <span class="premium-info fc">
       {{Helper::read_svg("img/svg/info-circle.svg")}}   


       </span> -->
     </div>
   </a>
   @endif

</div>
<div id="overlay standard-overlay"></div>
</header>



 @yield('content')


    @include('layouts/partials/profile-menu') 

  </div>


   



    <script src="{{ env('NODE_CONNECT') }}/socket.io/socket.io.js"></script>
        <script>
            var socket = io("{{ env('NODE_CONNECT') }}");
        </script>

        @if (Auth::user())
        <script>
            //connect socket room for the current user id..get all notifications related to the current user
             socket.emit('connect_me', 'U_{{Auth::user()->id}}');

        </script>
		@endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="{{ asset('js/app.js') }}"></script>
  
  </body>
</html>