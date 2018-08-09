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


<div class="">

   <header class="landing_header relative">
<div class="mw6 m-auto notification-header top__header pr15 pl15 flex justify-between items-center">


 {{Helper::back($back)}}

  <h4 class="title header-title m0"> {{$title}} </h4>  
  @if (@$save)
    <span id="{{$save_id}}" class="pointer slide-menu-save ">Save</span>
  @else
    <span></span>
  @endif
</div>




<div id="overlay standard-overlay"></div>
</header>

</div>

 
 @yield('content')

 @include('layouts/partials/profile-menu') 


   <notifications />

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
    <!-- <script src="https://code.jquery.com/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>



    

    <script src="{{ asset('js/app.js') }}" ></script>
  
  </body>
</html>