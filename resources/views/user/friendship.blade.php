@extends('layouts.app-profile-no-top-bar')
@section('content')



<header class="landing_header relative">
  <div class="mw6 m-auto landing_header__inner flex items-center top__header relative pr15 pl15">
     

      @if (Auth::guest())
                 
                <a href="/" id="g_back"  class="question-details__close pointer"  > {{Helper::read_svg("img/svg/long-arrow-left.svg")}}</a>


                 @else

                 <a onclick="window.history.back()"  id="g_back"   class="question-details__close pointer" > 
                   {{Helper::read_svg("img/svg/long-arrow-left.svg")}}

                 </a> 
                 @endif


    <div class="question-details__profile response-images pointer">
      
      
                <avatar src="{{ Helper::avatar($tuser->avatar) }}" :size=36 username="{{  Helper::name_or_slug($tuser) }}"></avatar>

                <avatar src="{{ Helper::avatar($fuser->avatar) }}" :size=32 username="{{  Helper::name_or_slug($fuser) }}"></avatar>
    </div>

    <div class="question-details__more pointer">
    </div>
  </div>

</header>

        
         




  <main class="landing-main mw6 m-auto pl15 pr15">
  @foreach ($replies as $key => $reply)

      <div class="open-question__container">
        <div class="open-question__right response-details-bubble">
          <div class="open-question__meta hidden">
            <span class="open-question__author">{{$rslug_formatted}}</span>
            <span class="open-question__time">{{$reply->ago}}</span>
          </div>
        <div class="q-bubble-container q-bubble-container--clickable mt5p">

        <div class="q-bubble qa-item ">
            <div>
              <span>{{$reply->question}}</span>
            </div>
            <div class="qa-item__seperator"></div>
            <span>{{$reply->answer}}</span>
            </div>
          </div>
        </div>
      </div>

@endforeach
  </main>




<div class="double-avatar">
  <div class="double-avatar__overlay standard-overlay"></div>
  <div class="double-avatar__modal mw6">
      <div class="double-avatar__item items-center flex">
        <avatar src="{{ Helper::avatar($tuser->avatar) }}" :size=36 class="mr10p" username="{{  Helper::name_or_slug($tuser) }}"></avatar>

               
        <h3 class="m0">{{  Helper::name_or_slug($tuser) }}</h3>
      </div>
      
        <span class="m-auto mw6 db">
          <div class="border-trimmed"></div>
        </span>
        <div class="double-avatar__item items-center flex">
        <avatar src="{{ Helper::avatar($fuser->avatar) }}" :size=36 class="mr10p" username="{{  Helper::name_or_slug($fuser) }}"></avatar>
        <h3 class="m0">{{  Helper::name_or_slug($fuser) }}</h3>
      </div>
      
  </div>
</div>





@endsection

