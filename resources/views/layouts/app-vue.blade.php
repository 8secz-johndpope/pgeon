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
  

    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @toaster
  </head>
  <body class="bg-off-white mr-auto ml-auto">

@if (Auth::check())
   <script>
      var user = true
   </script>
@endif
<div  id="app">
  @toastcomponent

   <header class="landing_header relative">
<div class="mw6 m-auto landing_header__inner flex items-center top__header relative  pr15 pl15">
 <div class="logoTitle__container flex">
   <span class="landing__logo fc">
   <img width="22" height="22" src="{{URL::asset('img/main-logo.svg')}}" alt="Pgeon">
   </span>
   <a class="openQuestion__title">
     <span>
       @if (strstr(Request::url(), "responses"))
       Published Responses
       @else
        Open Questions
       @endif
     </span>
     <span class="dropdown__icon ml5p fc">

      {{Helper::read_svg("img/svg/chevron-down.svg")}}
     </span>
   </a>
 </div>

    @if (Auth::check())


   <span class="header-right__icons">
     <a href="/people" class="db header-followers pointer mr20p fc">
     {{Helper::read_svg("img/svg/followers.svg")}}



     </a>
     <a href="/notifications" class="header-bell pointer mr20p fc">
       <span class="flex items-center relative">
         <span class="bell-notification-dot"></span>
         {{Helper::read_svg("img/svg/bell.svg")}}

       </span>
     </a>

     <span  class="profile__image pointer slide-menu__trigger fc">

       <div class="avatar-dummy-h"> </div>


       <avatar src="{{ Helper::avatar(Auth::user()->avatar) }}" :size="36" username="{{Helper::name_or_slug(Auth::user())}}" @avatar-initials="hidedummy"></avatar>
     </span>
   </span>
   @else
   <a  href="/signup" class="login__links">
     <span>Login / Signup</span>
   </a>
   @endif
</div>



<div class="mobile-dropdown m-auto mw6">

 <a class="pointer {{strstr(Request::url(), "responses")? '': 'active'}}" href="/">
   <span>
     Open Questions
   </span>
   {{strstr(Request::url(), "responses")? '': Helper::read_svg("img/svg/check.svg")}}



 </a>
 <a class="pointer {{strstr(Request::url(), "responses")? 'active': ''}}" href="/responses" >
   <span>
     Published Responses
   </span>

   {{strstr(Request::url(), "responses")? Helper::read_svg("img/svg/check.svg"):'' }}
 </a>


   @if (Auth::check())
    @if (Auth::user()->role_id != 3 )
    <a href="/" class="myQuestion-premium-button" >
      <span>
        My Questions
      </span>


      <div class="fc premium-dropdown-item">
        <span class="premium-lock fc">
        {{Helper::read_svg("img/svg/lock-alt.svg")}}

          <span class="ml5p">Premium</span>
        </span>



      </div>

    </a>
    @else
    <a href="/my-questions">
      <span>
        My Questions
      </span>

    </a>
   @endif
   @endif

</div>
<div id="overlay standard-overlay"></div>
</header>

 @yield('content')

<div class="upgrade-modal">
  <div class="modal-overlay standard-overlay"></div>
  <div class="center-modal m-auto">
    <div class="upgrade-modal__top">
      <div class="super-power__container">
        <img class="super-power" src="/img/super-power.png" >
      </div>
      <p>Unleash the Power, <span>Go Pro!</span>
    </div>
    <div class="upgrade-modal__body">
      <h4 class="upgrade-modal__body-header">With Pro, you can</h4>
      <ul  class="upgrade-modal__perks">
        <li>Use our dynamic polling system to interact with fans/followers.</li>
        <li>Retain full control over what’s published.</li>
        <li>Get notified and stay updated.</li>
        <li>Gather advice from like-minded people.</li>
      </ul>
      <a href="/membership" class="upgrade-modal__button">
        Upgrade to Premium for $5/mo
      </a>
    </div>
  </div>
</div>

    @include('layouts/partials/profile-menu')

  <notifications  />

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

    @stack('scripts')

    <script src="{{ asset('js/app.js') }}"></script>

  </body>
</html>
