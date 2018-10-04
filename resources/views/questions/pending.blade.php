@extends('layouts.app-no-header-no-top-bar') @section('content')


<header class="live-header">
  <div class="mw6 m-auto flex items-center pl15p justify-between top__header pl-15 pr15 ">

    <span class="back-arrow dib">
      <a href="/my-questions" class="dib">
      {{Helper::read_svg("img/svg/times.svg")}}
      </a>
    </span>

      <span class="header-title live-title">
      Pending ({{count($questions)}})
      </span>




  </div>
</header>




<main class="pl-15 mw6 m-auto live-main pl15p pr15p">
@include('flash::message')

 @foreach ($pending as $key => $val)
  <div class="q-bubble qa-item mb10p">
    <div>
      <span>  {{$val['question']->question}}</span>
    </div>

    <div class="qa-item__seperator"></div>
    @if ($val['answer'])
      <div>  {{$val['answer']->answer}}</div>
    @endif
  </div>


  <div class="pending-submit">
    @if ($val['answer'])
      <a href="/pending/{{$val['question']->id}}/{{$val['answer']->id}}">View All</a>

     @else
     <a></a>

    @endif
    <div>
    <longpress duration="2" :on-confirm="deleteQ" :value={{$val['question']->id}} pressing-text="Deleting in {$rcounter} secs" class="btn del" action-text="Deleting">Delete</longpress>

         @if ($val['answer'])
        <form  method="post" id="publish_form" action="/accept_answer">
        {{ Form::token() }}
        <input type="hidden" value="{{$val['answer']->id}}" name="answer_id" >
        <input type="hidden" value="{{$val['answer']->user_id}}" name="answered_by" >
      <input type="hidden" name="question_id" value="{{$val['question']->id}}" >
      <button type="submit" class="btn pub ml20p">Publish</button>
      </form>

         @endif
    </div>
  </div>

<div>&nbsp;</div>
  @endforeach

</main>















@endsection

<!-- Push a style dynamically from a view -->
@push('styles') @endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
<script src="{{ asset('js/question.index.js') }}"></script>
@endpush
