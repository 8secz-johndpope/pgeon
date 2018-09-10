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
          
<div id="share_q" class="dn">{{ urlencode($question->question)}}</div>
  

        <answers_guest hits="{{$question->hits}}" q_votes_count="{{$question->votes()->count() }}"  question="{{$question->question}}" question_user_slug="{{Helper::slug($question->user->id ,$question->user->slug)}}"  question_id="{{$question->id}}" initial="{{$lq_expiring_in}}"
								  ></answers_guest>


           <a href="/signup" class="base-btn guest-login mw6 m-auto">
      login / signup
    </a>
     
  


@endsection



