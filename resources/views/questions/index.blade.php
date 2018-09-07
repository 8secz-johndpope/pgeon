@extends('layouts.app-vue')
@section('content')
        

<!-- need loaders both outside and inside..outside while JS is rendering..inside vue for page loading and other fetching-->
<main class="landing-main mw6 m-auto pl15 pr15 q-loading-card server-loading-card">

<div class="open-question__container ">
          <div class="open-question__left" >
              <div class="imagebox"></div>
          </div>
          <div class="open-question__right">
            <div class="open-question__meta">
              <div class="shade1"></div>
              <span class="open-question__time shade2">
              </span>
            </div>
            <span  class="open-question__content selected mt5p m0 shade3">
            </span>
          </div>
        </div>

        <div class="open-question__container ">
          <div class="open-question__left" >
              <div class="imagebox"></div>
          </div>
          <div class="open-question__right">
            <div class="open-question__meta">
              <div class="shade1"></div>
              <span class="open-question__time shade2">
              </span>
            </div>
            <span  class="open-question__content selected mt5p m0 shade3">
            </span>
          </div>
        </div>
</main>

@if (Auth::user())
    <allq role_id="{{Auth::user()->role_id}}"></allq>
@else
    <allqguest></allqguest>    
@endif    

@endsection





