@extends('layouts.app-vue')
@section('content')


<!-- need loaders both outside and inside..outside while JS is rendering..inside vue for page loading and other fetching-->
<main class="landing-main mw6 m-auto pl15 pr15 q-loading-card spinner">

      <img src="{{URL::asset('img/spinner.svg')}}" alt="brand">
   
</main>

@if (Auth::user())
    <allr role_id="{{Auth::user()->role_id}}"></allr>
@else
    <allrguest></allrguest>    
@endif  

@endsection

