<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="https://fonts.googleapis.com/css?family=Cabin:400,600,700|Montserrat|Varela+Round" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">-->

    <!-- mdl -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ Voyager::setting('title') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tabs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>
<body>

    <header>
      <!--End of top bar-->
      <div class="container">
          <div class="row">
              <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                  <div class="navbar navbar-default" role="navigation">

                    <div class="logo_wrapper">
                        <!-- site logo -->
                        <a href="#">
                          <img src="{{URL::asset('img/pgeon-logo.svg')}}"  class="logo img-responsive" alt="pgeon">

                        </a>
                    </div>

                    <div class="hd_right">
                        <div class="header_notification">
                            <div class="hn_box">
                                <!--<a href="http://fullstackwebdeveloper.net/pegeon/template-add-new.php"><img src="img/add-question.svg" alt=""></a>-->
                                <a href="/user/{{Auth::id()}}/questions"><i class="fa fa-plus"></i><i class="fa fa-question"></i></a>
                            </div>
                        </div>

                        <button type="button" class="btn btn-right" id="nav"> <i class="fa fa-bars" aria-hidden="true"></i> </button>
                    </div>
                  </div>
              </div>
          </div>
      </div>

    </header>



    <div class="nav-expandable" id="nav-expanded">
      <div class="container">
          <div class="row">
              <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                  <nav>
                    <ul class="">

                      @if (Auth::guest())
                          <li><a href="{{ route('login') }}">Login</a></li>
                          <li><a href="{{ route('register') }}">Register</a></li>
                      @else
                          <li> <a href="">notifications <span>1</span></a> </li>
                          <li>
                                        <a href="{{ route('profile',['id' =>  Auth::user()->id]) }}">

                                            Profile
                                        </a>


                                    </li>
                          <li> <a href="">SETTINGS</a> </li>
                          <li> <a href="">HELP &amp; FAQ</a> </li>
                          <li>
                                          <a href="{{ route('logout') }}"
                                              onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                              Logout
                                          </a>

                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              {{ csrf_field() }}
                                          </form>
                                      </li>
                      @endif
                    </ul>
                   </nav>
              </div>
          </div>
      </div>
    </div>

    <!-- Return to Top -->
<a href="javascript:" id="return-to-top"><img src="img/back-to-top.png" alt=""></a>



        @yield('content')
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/oqt.js') }}"></script>
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
