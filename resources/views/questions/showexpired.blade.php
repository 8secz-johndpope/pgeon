@extends('layouts.app-no-header-no-top-bar')
@section('content')



  <header class="landing_header relative">
    <div class="mw6 m-auto landing_header__inner flex items-center top__header relative pr15 pl15">
      <a href="{{$back}}" class="question-details__close pointer fc">
        {{Helper::read_svg("img/svg/times.svg")}}
      </a>
      <div class="question-details__profile fc">
        <a href="/{{  Helper::slug($question->user->id,$question->user->slug) }}">
                     
                     <avatar src="{{ Helper::avatar($question->user->avatar) }}" :size=36 username="{{  Helper::name_or_slug($question->user) }}"></avatar>
                    
                    </a>
      </div>
      <div class="question-details__more pointer">
        <!-- changes names -->
        <div class="ellipses fc">
        {{Helper::read_svg("img/svg/ellipsis-v.svg")}}

        </div>
        <div class="times fc">
        {{Helper::read_svg("img/svg/times.svg")}}
        </div>
      </div>
    </div>
    <div class="details__dropdown__container mw6 m-auto">
      <ul class="details__dropdown">
        <li class="details__dropdown_item details__dropdown_item--share pointer pl15p mt15p mb15p">
        {{Helper::read_svg("img/svg/share-alt.svg")}}
            <span>Share</span>
        </li>
        <li class="details__dropdown_item pointer pl15p mb15p">
        {{Helper::read_svg("img/svg/flag.svg")}}
            <span id="report_question" data-qid="{{$question->id}}">Report</span>
        </li>
        <li class="details__dropdown_item pointer pl15p mb15p">
        {{Helper::read_svg("img/svg/book.svg")}}
            <span >Tutorial</span>
        </li>
      </ul>
    </div>
    <div class="details__overlay standard-overlay"></div>
  </header>



 <main class="landing-main mw6 m-auto pl15 pr15 smtp mt15p">
    <div class="open-question__right">
      <div class="open-question__meta">
        <span class="open-question__author">
        @if(isset($answer))
                               <a href="/r/{{Helper::shared_slug($question->user->id,$question->user->slug,$answer->user->id,$answer->user->slug)}}">
                                {{Helper::shared_formatted_string($question->user->id,$question->user->slug,$answer->user->id,$answer->user->slug)}}
                               </a>
                           
                            @else 
                            <a href="/{{Helper::slug($question->user->id ,$question->user->slug)}}">{{Helper::slug($question->user->id ,$question->user->slug)}}</a>

                            @endif
        </span>
        <span class="open-question__time"> {{($question->accepted_answer>0)?"Published":"Ended"}}:  <localtimezone ts="{{$question->expiring_at}}"> </localtimezone></span>
      </div>
      <a :href="'/'+question_user_slug" class="open-question__content mt5p m0">
        <p> {{$question->question}}</p>
      </a>
    </div>

  <div class="open-question__seperator mt15p mb15p">
      <div class="open-question__seperator__inner mr15p"></div>
</div>

    <div class="open-question__response">
      



     @if(isset($answer))
          <p>{{$answer->answer}}</p>
                       
          @endif

                          
    


          
          
          </div>
          
    </div>
    </div>







       

        

         

  </main>





      




<!-- 
  <answers_expired question_id="{{$question->id}}" current_user_id="{{Auth::user()->id}}" question_owner_id="{{$question->user_id}}" accepted_answer="{{$question->accepted_answer}}"></answers_expired>
 -->



@endsection



<!-- Push a script dynamically from a view -->
@push('scripts')
<script src="{{ asset('js/question.index.js') }}"></script>
@endpush
