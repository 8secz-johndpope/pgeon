@extends('layouts.app-no-header-no-top-bar') @section('content')



<header class="live-header">
  <div class="mw6 m-auto flex items-center pl15p justify-between top__header pl-15 pr15 ">

    <span class="back-arrow dib">
      <a onclick="window.history.back()" class="dib">
      {{Helper::read_svg("img/svg/times.svg")}}   
      </a>
    </span>

      <span class="header-title live-title">
      Live ({{count($questions)}})
      </span>

     
   

  </div>
</header>





<main class="pl-15 mw6 m-auto live-main pl15p pr15p">
@foreach ($questions as $key => $val)
    <div class="q-bubble goto-qdetail" data-id={{$val->id}}>
        <span>   {{$val->question}}</span>
    </div>
    <div> &nbsp; </div>
@endforeach
</main>













@endsection

