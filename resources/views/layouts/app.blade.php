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
   @stack('after-core-styles')
</head>
@if (Auth::guest())
<body>
@else
<body class="with-top-navbar" >
<div  id="app">
  <nav class="navbar navbar-inverse navbar-fixed-top app-navbar">
              <div class="container">
                  <div class="navbar-header">
                      <div class="bell-for-mobile">
                          <a data-toggle="modal" href="#msgModal" class="app-notifications"><span class="icon icon-bell"></span></a>
                      </div>
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-main">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="/">
                          <img src="{{URL::asset('img/brand.svg')}}" alt="Pgeon">
                          <img class="logo-for-mobile" src="{{URL::asset('img/pgeon-logo-mobile.svg')}}" alt="">
                      </a>
                      <ul class="nav navbar-nav">
                          <li>
                              <a href="/">Home</a>
                          </li>
                          <li>
                              <a href="{{ (Auth::user()->slug && Auth::user()->role_id == 3)? Auth::user()->slug :'/user/'.Auth::user()->id }}">Profile</a>
                          </li>
                          <li>
                              <a href="{{ route('people') }}">People</a>
                          </li>

                      </ul>
                  </div>
                  <div class="navbar-collapse collapse" id="navbar-collapse-main">
                      <ul class="nav navbar-nav navbar-right m-r-0 hidden-xs">
                          <li>
                              <a class="app-notifications" href="notifications/"><span class="bubble icon icon-bell"></span></a>
                          </li>
                          <li>
                              <button class="btn btn-default navbar-btn navbar-btn-avitar" data-toggle="popover">
                                  <img class="img-circle" src="{{  Helper::avatar(Auth::user()->avatar) }}   " alt="">

                              </button>
                          </li>
                      </ul>
                      <form class="navbar-form navbar-right app-search" role="search" action="{{ route('search') }}">
                          <div class="form-group">
                              <input type="text" class="form-control" data-action="grow" placeholder="Search" name="q">
                          </div>
                      </form>
                      <ul id="clone_bar" class="nav navbar-nav hidden-sm hidden-md hidden-lg">

                          <li>
                              <a href="{{ route('profile') }}">Settings</a>
                          </li>
                          <li>
                            <a href="{{ route('profile') }}">Help</a>
                        </li>
                          <li>
                              <a href="{{ route('logout') }}"
                                              onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">Logout</a>
                          </li>
                      </ul>
                      <ul class="nav navbar-nav hidden">
                          <li>
                              <a href="help/index.html">Help</a>
                          </li>
                          <li>
                              <a href="{{ route('profile') }}">Settings</a>
                          </li>
                          <li>
                              <a href="{{ route('logout') }}"
                                              onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">Logout</a>
                          </li>
                      </ul>
                  </div>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              {{ csrf_field() }}
                                          </form>

              </div>
          </nav>

@endif

        @yield('content')

</div>
    @if (Auth::user())
        <script src="{{ env('NODE_CONNECT') }}/socket.io/socket.io.js"></script>
        <script>
            var socket = io("{{ env('NODE_CONNECT') }}");
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


</body>

</html>
