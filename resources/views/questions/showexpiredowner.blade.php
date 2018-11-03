@extends('layouts.app-no-header-no-top-bar', ['title' => $question->question])
@section('content')







  <header class="landing_header relative">
    <div class="mw6 m-auto landing_header__inner flex items-center top__header relative pr15 pl15">
      <a href="/" class="question-details__close pointer fc">
        {{Helper::read_svg("img/svg/times.svg")}}
      </a>
      <div class="question-details__profile fc">
        <a href="/{{  Helper::slug($question->user->id,$question->user->slug) }}">
                     
                     <avatar src="{{ Helper::avatar($question->user->avatar) }}" :size=36 username="{{  Helper::name_or_slug($question->user) }}"></avatar>
                    
                    </a>
      </div>
      <div class="question-details__more pointer">
        
      </div>
    </div>
  
  </header>




 <main class="landing-main mw6 m-auto pl15 pr15 smtp mt15p">
    <div class="open-question__right">
      <div class="open-question__meta">
        <span >
        @if(isset($answer))
                               <a class="open-question__author" href="/r/{{Helper::shared_slug($question->user->id,$question->user->slug,$answer->user->id,$answer->user->slug)}}">
                                {{Helper::shared_formatted_string($question->user->id,$question->user->slug,$answer->user->id,$answer->user->slug)}}
                               </a>
                           
                            @else 
                            <a class="open-question__author" href="/{{Helper::slug($question->user->id ,$question->user->slug)}}">{{Helper::slug($question->user->id ,$question->user->slug)}}</a>

                            @endif
        </span>
        <span class="open-question__time"> {{($question->accepted_answer>0)?"Published":"Ended"}}:  <localtimezone ts="{{$question->expiring_at}}"> </localtimezone></span>
      </div>


             <div class="q-bubble qa-item ">
          <div>
            <span> {{$question->question}}</span>
          </div>
          <div class="qa-item__seperator"></div>
          <span>      @if(isset($answer))
          <p>{{$answer->answer}}</p>
        
          @else
          <div class="dot"></div>
                                                    <div class="dot"></div>
                                                    <div class="dot"></div>

          @endif
        
        </span>
          </div>

     
    </div>



  
          
    </div>
    </div>







       

        

         

  </main>







<div class="details-share">
  <div class="details-share__inner  mw6 m-auto">
    <div class="details-share__header">
      <span></span>
      <h3>Share Question</h3>
      {{Helper::read_svg("img/svg/times.svg")}}
    </div>
    <div class="details-share__body">
      <div class="details-share__item details-share__item--fb" >
        {{Helper::read_svg("img/svg/facebook.svg")}}
        <h3>FaceBook</h3>
      </div>
      <div class="details-share__seperator"></div>

      <div class="details-share__item details-share__item--twitter">
        {{Helper::read_svg("img/svg/twitter.svg")}}
        <h3>Twitter</h3>
      </div>
      <div class="details-share__seperator"></div>

      <div class="details-share__item details-share__item--linkedin">
        {{Helper::read_svg("img/svg/linkedin.svg")}}
        <h3>LinkedIn</h3>
      </div>
      <div class="details-share__seperator"></div>

      <div class="details-share__item details-share__item--reddit">
        {{Helper::read_svg("img/svg/reddit-square.svg")}}
        <h3>Reddit</h3>
      </div>
      <div class="details-share__seperator"></div>

      <div class="details-share__item  details-share__item--link">
        {{Helper::read_svg("img/svg/link.svg")}}
        <h3>Copy Link</h3>
      </div>
      <div class="details-share__seperator"></div>
    </div>
  </div>
</div>
          
<div id="share_q" class="dn" data-unesx="{{$question->question}}">{{ urlencode($question->question)}}</div>




@endsection






