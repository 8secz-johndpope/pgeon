<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ Voyager::setting('title') }}</title>
    @stack('styles')
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toolkit.css') }}" rel="stylesheet">
    <link href="{{ asset('css/application.css') }}" rel="stylesheet">
    <link href="{{ asset('css/overwrite.css') }}" rel="stylesheet">
   @stack('after-core-styles')
</head>
<body>
<div  id="app">
@if (Auth::guest())







<nav class="navbar navbar-inverse navbar-fixed-top app-navbar">
            <div class="container nav-container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                        <img src="{{URL::asset('img/pgeon-logo-mobile.svg')}}" alt="Pgeon">
                    </a>
                </div>
                <div class="navbar-right" id="navbar-collapse-main">
                    <ul class="nav navbar-nav m-r-0" style="width: 125px;">
                        <li>
                            <a href="/register" type="button" style="color: #676D7A; font-size: 12px;" class="btn-link">Sign up</a>
                        </li>
                        <li>
                            <div>
                                <a href="/login" class="btn btn-sm btn-primary-outline" style="margin-top: 4px; font-weight: 600;">Log In</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>



@else


<nav class="navbar navbar-inverse navbar-fixed-top app-navbar">
            <div class="container nav-container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                        <img src="{{URL::asset('img/pgeon-logo-mobile.svg')}}" alt="Pgeon">
                    </a>
                    <ul class="nav navbar-nav">

                     @if( Auth::user()->role_id == 3)
                        <li>
                            <form class="navbar-form">
                                <div>
                                    <a href="/my-questions" class="my-questions btn btn-sm btn-primary-outline"><span>My Questions</span></a>
                                </div>
                            </form>
                        </li>
                       @endif
                    </ul>
                </div>
                <div class="navbar-right" id="navbar-collapse-main">
                    <ul class="nav navbar-nav m-r-0">
                        <li>
                            <a href="{{ route('people') }}" class="app-notifications-icon"><span class="fal fa-users"></span><span class="fa fa-users"></span></a>
                        </li>
                        <li>
                            <a href="/notifications" class="app-notifications-icon"><span class="fal fa-bell"></span><span class="fa fa-bell"></span></a>
                        </li>
                        <li>
                            <button id="profile-button" class="btn btn-default navbar-btn navbar-btn-avitar" data-toggle="popover">
                                <img class="img-circle" src="{{  Helper::avatar(Auth::user()->avatar) }}">
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <ul class="mobile-dropdown no-height">
            <li>
                <a href="{{  Helper::slug(Auth::user()->id, Auth::user()->slug) }}">Profile</a>
            </li>
            <li>
                <a href="{{ route('profile') }}">Settings</a>
            </li>
            <!-- <li>
                <a href="">Help</a>
            </li> -->
            <li>
             <a href="{{ route('logout') }}"          onclick="event.preventDefault();   document.getElementById('logout-form').submit();">
           	  Logout
             </a>

            </li>
        </ul>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                             {{ csrf_field() }}
                                         </form>






@endif

        @yield('content')

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
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
      <script src="{{ asset('js/app.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/toolkit.js') }}"></script>

    @stack('scripts')
    <script src="{{ asset('js/application.js') }}"></script>

	 <script defer src="{{ asset('/js/packs/light.js') }}"></script>
        <script defer src="{{ asset('/js/packs/solid.js') }}"></script>
        <script defer src="{{ asset('/js/packs/brands.js') }}"></script>
        <script defer src="{{ asset('/js/fontawesome.js') }}"></script>

</body>

</html>
