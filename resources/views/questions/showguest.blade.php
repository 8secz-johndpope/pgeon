@extends('layouts.app-profile-no-top-bar')
@section('content')


<nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="nav-contain" style="background-color: #fff;">
                <nav class="container nav-container header-nav">
                  <div style="width: 42px;">
                      <a href="/"><i class="fal fa-home fa-lg text-muted"></i></a>
                  </div>
                    <h4>
                      <img class="img-circle header-img" href="#" src="{{ Helper::avatar($question->user->avatar) }}">
                    </h4>
                    <ul class="nav navbar-nav m-r-0">
                        <li>
                            <div>
                                <a href="/login" class="btn btn-sm btn-default">Log In</a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>










          <div style="width: auto;">
            <div class="container">
                <ul class="media-list">
                    <li class="media media-divider">
                              <div class="h5 m-b-5">
                            <span class="tmw"><a href="#">{{$question->user->name}}</a></span>
                            <span class="text-muted time-align">
                            <allqtimer :initial="{{$lq_expiring_in}}"
								:question_id="{{$question->id}}" @event="reload"></allqtimer></span>
                            </span>
                        </div>
                        <ul class="media-list media-list-conversation c-w-md">
                            <li class="media">
                                <div class="media-body">
                                    <div class="media-body-text live-media-question">
                                    <?php echo $question->question; ?></div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>












        <!-- Guests are not able to view posted answers -->


	<div class="container content">
		<div class="container text-center m-t-5p">
			<img src="/img/chat-bubble.svg" />
			<h4 class="text-muted m-t-0">
				Login to view the responses!
			</h4>
		</div>
	</div>
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
