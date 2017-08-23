@extends('layouts.app') @section('content')


<div class="container p-t-md">
  <ul class="nav nav-pills tabs-padding">
    <li>
      <a href="/questions"><span class="icon icon-home"></span></a>
    </li>
    <li class="disabled">
      <a href="#"><span class="icon icon-chevron-left"></span>
      Back</a>
    </li>
    <li>
      <a href="#">
      Next<span class="icon icon-chevron-right"></span></a>
    </li>
  </ul>
  <div class="row">
    <div class="col-md-12">
      <ul class="media-list media-list-conversation c-w-md">
        <li class="media p-a media-divider">
          <a class="media-left" href="{{ ($question->user->slug)? '/'.$question->user->slug :  '/user/'.$question->user->id}}">

                                <img class="media-object img-circle" src="{{ Helper::avatar($question->user->avatar) }} " alt="">
                            </a>
          <div class="media-body">
            <div class="media-heading">
              <small class="pull-right"> <span class="question_clock">Asked on : {{$question->expiring_at}}
</span></small>
              <h5 class="m-b-0">{{$question->user->name}}</h5>
            </div>
            <ul class="media-list media-list-conversation c-w-md">
              <li class="media m-b-md">
                <div class="media-body">
                  <div class="media-body-text media-question">
                    <?php echo $question->question; ?>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>







  </div>
  <answers_expired_owner question_id="{{$question->id}}" accepted_answer="{{$question->accepted_answer}}"></answers_expired_owner>

</div>



@endsection

<!-- Push a style dynamically from a view -->
@push('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet"> @endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>
<script src="{{ asset('js/question.index.js') }}"></script>
@endpush
