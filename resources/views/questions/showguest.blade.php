@extends('layouts.app-no-header-no-top-bar')
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



        <answers_guest hits="{{$question->hits}}" q_votes_count="{{$question->votes()->count() }}"  question="{{$question->question}}" question_user_slug="{{Helper::slug($question->user->id ,$question->user->slug)}}"  question_id="{{$question->id}}" initial="{{$lq_expiring_in}}"
								  ></answers_guest>


        <!-- Guests are not able to view posted answers -->


     
         <?php /* <answers_guest question_id="{{$question->id}}" question_owner_id="{{$question->user_id}}" ></answers_guest> */ ?>



@endsection

<!-- Push a style dynamically from a view -->
@push('after-core-styles')
<link href="{{ asset('css/up-voting.css') }}" rel="stylesheet">
 @endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
<script src="{{ asset('js/question.index.js') }}"></script>
@endpush
