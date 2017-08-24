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
  {{--  <nav class="navbar navbar-inverse navbar-fixed-top app-navbar">
              <div class="container">
                  <div class="navbar-header">
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
                              <a class="app-notifications" href="notifications/index.html"><span class="icon icon-bell"></span></a>
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
  --}}

        <nav class="navbar navbar-inverse navbar-fixed-top app-navbar">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <img src="/img/brand.svg" alt="Pgeon">
                        <img class="logo-for-mobile" src="/img/pgeon-logo-mobile.svg" alt="">
                    </a>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="index.html"> &nbsp;home</a>
                        </li>
                        <li>
                            <a href="profile/index.html">profile</a>
                        </li>
                        <li>
                            <a href="profile/index.html">people</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar-right" id="navbar-collapse-main">
                    <ul class="nav navbar-nav m-r-0">
                        <li>
                            <form class="navbar-form  app-search" role="search">
                                <div>
                                    <a id="a_add_question" class="btn btn-sm btn-primary-outline active" style="margin-top: 4px; font-weight: 900;"><span class="icon icon-circle-with-plus"></span><span class="qt">?</span><span class="ad">add question<span></a>
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
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
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
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">Logout</a>
        </li>
      </ul>
                        </li>
                        
                        <li>
                            <a data-toggle="modal" href="#msgModal" class="app-notifications"><span class="icon icon-bell"></span></a>
                        </li>
                        <li>
                            <button class="btn btn-default navbar-btn navbar-btn-avitar" data-toggle="popover">
                                <img class="img-circle" src="{{  Helper::avatar(Auth::user()->avatar) }}   " alt="">
                             </button>
                        </li>
                    </ul>
               </div> <!-- navbar-right -->
            </div>
        </nav>
                <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Following</h4>
                    </div>
                    <div class="modal-body p-a-0">
                        <div class="modal-body-scroller">
                            <ul class="media-list media-list-users list-group">
                                <li class="list-group-item">
                                    <div class="media">
                                        <a class="media-left" href="#">
                                            <img class="media-object img-circle" src="/img/avatar-fat.jpg">
                                        </a>
                                        <div class="media-body">
                                            <button class="btn btn-default btn-sm pull-right">
                                                <span class="glyphicon glyphicon-user"></span> Follow
                                            </button>
                                            <strong>Jacob Thornton</strong>
                                            <p>@fat - San Francisco</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <a class="media-left" href="#">
                                            <img class="media-object img-circle" src="/img/avatar-dhg.png">
                                        </a>
                                        <div class="media-body">
                                            <button class="btn btn-default btn-sm pull-right">
                                                <span class="glyphicon glyphicon-user"></span> Follow
                                            </button>
                                            <strong>Dave Gamache</strong>
                                            <p>@dhg - Palo Alto</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <a class="media-left" href="#">
                                            <img class="media-object img-circle" src="/img/avatar-mdo.png">
                                        </a>
                                        <div class="media-body">
                                            <button class="btn btn-default btn-sm pull-right">
                                                <span class="glyphicon glyphicon-user"></span> Follow
                                            </button>
                                            <strong>Mark Otto</strong>
                                            <p>@mdo - San Francisco</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="question_container" class="row">
                <div class="container">
                    <div  style="margin-bottom: 20px;margin-top:10px">
                        <div class="well_2" style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;border-top-left-radius: 0px;border-top-right-radius: 10px">
                            <div class="form-group">
                                <textarea class="form-control question-input" rows="5" id="question-input"  placeholder="your last posted question was 3 days ago" style="border-style: solid;border-bottom: 4px solid #f4f5f6;border-radius: 0 10px 0 0;text-align: left;font-family: inherit"></textarea>
                            </div>
                            <div class="time-select-alignment" style="border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;padding-bottom: 8px">
                                <div style="text-align: right; display: inline-flex; margin-right:15px">
                                    <span class="current-length">0</span>/150
                                    </div>
                                <a href="#" type="button" class="btn btn" style="margin-left: 18px; margin-right: 8px; color: inherit; background-color: transparent;float: left;font-size: 28px;padding-top: 0px" id="upload-image"><span class="icon icon-image" style="color: #24c4bc"></span></a>
                                <button type="button" class="btn btn-default" style="margin-right:15px">next</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    

@endif

        @yield('content')

</div>
    @if (Auth::user())
        <script src="{{ env('NODE_CONNECT') }}/socket.io/socket.io.js"></script>
        <script>
            var socket = io("{{ env('NODE_CONNECT') }}");
            //connect socket room for the current user id..get all notifications related to the current user
             socket.emit('connect_me', '{{Auth::user()->id}}');
               
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
