<!-- login and registration screens -->
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pgeon</title>
    @stack('styles')
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toolkit.css') }}" rel="stylesheet">
    <link href="{{ asset('css/application.css') }}" rel="stylesheet">
    <link href="{{ asset('css/overwrite.css') }}" rel="stylesheet">
   @stack('after-core-styles')
   <link href="{{URL::asset('favicon.ico')}}" rel="icon">
<link href="{{URL::asset('favicon.ico')}}" rel="apple-touch-icon">
<link href="{{URL::asset('favicon.ico')}}" rel="apple-touch-icon" sizes="120x120" />
</head>
<body>
<div  id="app">


        @yield('content')

</div>


    <script src="https://code.jquery.com/jquery.min.js"></script>
      <script src="{{ asset('js/app.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/toolkit.js') }}"></script>
    
    <script src="{{ asset('js/up-voting.js') }}"></script>

    @stack('scripts')
    <script src="{{ asset('js/application.js') }}"></script>

	 <script defer src="{{ asset('/js/packs/light.js') }}"></script>
        <script defer src="{{ asset('/js/packs/solid.js') }}"></script>
        <script defer src="{{ asset('/js/packs/brands.js') }}"></script>
        <script defer src="{{ asset('/js/fontawesome.js') }}"></script>

</body>

</html>
