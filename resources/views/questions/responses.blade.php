@extends('layouts.app-vue')
@section('content')


<!-- need loaders both outside and inside..outside while JS is rendering..inside vue for page loading and other fetching-->
<main class="landing-main mw6 m-auto pl15 pr15 q-loading-card server-loading-card">

     <div class="open-question__container q-loading-card" >
          <div class="open-question__left" >
              <div class="imagebox"></div>
          </div>
          <div class="open-question__right">
            <div class="open-question__meta">
              <div class="shade1"></div>
              <span class="open-question__time shade2">
              </span>
            </div>
           <div class="q-bubble-container q-bubble-container--clickable mt5p">
        <div class="q-bubble qa-item shadeR3">
          <div >
          </div>
          <div class="qa-item__seperator"></div>
          <span class="shadeR4"> </span>
          </div>
          </div>
          </div>
        </div>

            <div class="open-question__container q-loading-card" >
          <div class="open-question__left" >
              <div class="imagebox"></div>
          </div>
          <div class="open-question__right">
            <div class="open-question__meta">
              <div class="shade1"></div>
              <span class="open-question__time shade2">
              </span>
            </div>
           <div class="q-bubble-container q-bubble-container--clickable mt5p">
        <div class="q-bubble qa-item shadeR3">
          <div >
          </div>
          <div class="qa-item__seperator"></div>
          <span class="shadeR4"> </span>
          </div>
          </div>
          </div>
        </div>
</main>

@if (Auth::user())
    <allr role_id="{{Auth::user()->role_id}}"></allr>
@else
    <allrguest></allrguest>    
@endif  

@endsection

<!-- Push a style dynamically from a view -->
@push('styles')
@endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
    <script src="{{ asset('js/question.index.js') }}"></script>
@endpush
