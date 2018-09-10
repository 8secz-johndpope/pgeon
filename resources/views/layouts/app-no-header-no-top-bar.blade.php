<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title> {{($title)?$title:"Pgeon"}} </title>
    <meta property="og:title" content="My Shared Article Title" />
  <meta property="og:description" content="Description of shared article" />
  <meta property="og:url" content="http://example.com/my_article.html" />
  
    <meta name="description" content="Messenger for all"/>
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





 @yield('content')


    @include('layouts/partials/profile-menu') 

  </div>

    <script src="{{ env('NODE_CONNECT') }}/socket.io/socket.io.js"></script>
        <script>
            var FB_id = "{{ env('FACEBOOK_ID') }}"
            if(socket)
              var socket = io("{{ env('NODE_CONNECT') }}");
            
              
        </script>

        @if (Auth::user())
        <script>
            //connect socket room for the current user id..get all notifications related to the current user
             if(socket)
              socket.emit('connect_me', 'U_{{Auth::user()->id}}');

        </script>
		@endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="https://connect.facebook.net/en_US/sdk.js"></script>
    <script> window.fbAsyncInit = function() {
    FB.init({
      appId            : FB_id,
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v3.1'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   </script>
    <script src="{{ asset('js/app.js') }}"></script>
   
  
  </body>
</html>