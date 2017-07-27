@extends('layouts.app')
@section('content')


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
                            <a class="media-left" href="#">

                                <img class="media-object img-circle" src="{{ $question->user->avatar ? '/uploads/avatars/'.$question->user->avatar:  URL::asset('img/profile-placeholder.svg')}} " alt="">
                            </a>
                            <div class="media-body">
                                <div class="media-heading">
                                    <small class="pull-right"> <span class="question_clock">Validity :   {!! Helper::question_validity_status($question->expiring_at) !!}
</span></small>
                                    <h5 class="m-b-0">{{$question->user->name}}</h5>
                                </div>
                                <ul class="media-list media-list-conversation c-w-md">
                                    <li class="media m-b-md">
                                        <div class="media-body">
                                            <div class="media-body-text media-question"><?php echo $question->question; ?>
</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>

                <?php foreach ($question->answers as $key => $answer) {
                ?>

                <div class="col-md-12 subtract-margin-left">
                    <ul class="media-list media-list-conversation c-w-md fa-ul">
                        <li class="media m-b-md">
                            <a class="media-left">
                                <button id="vote" onclick="upVote()" class="btn-borderless fa vote-arrow-up fa-arrow-up">
                                    <h1 id="counter"></h1>
                                </button>
                            </a>
                            <div class="media-body">
                                <ul class="media-list media-list-conversation c-w-md">
                                    <li class="media media-current-user m-b-md media-divider">
                                        <div class="media-body">
                                            <div class="media-body-text media-response media-user-response">
                                              <div class="media-footer"><small class="text-muted"> <mark>{{$answer->user->name}}</mark></small></div>
                                                {{$answer->answer}}
</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>

                <?php }?>
            </div>
            <div class="row">
                <div class="footer navbar-fixed-bottom">
                    <div class="col-md-12">
                      {{ Form::open( array('url'=>'answer','class' =>'form-horizontal') ) }}
                      {{ Form::token() }}
                      {{ Form::hidden('question_id',$question->id) }}

                        <ul class="media-list">
                            <li class="media m-b-md media-divider">
                                <div class="media-body">
                                    <li class="media media-current-user m-b-md">
                                        <div class="input-group">
                                            <input type="text" class="form-control response-form" placeholder="Enter your response here.." type="text" maxlength="150" id="response-text" name="answer"/>
                                            <span class="input-group-btn"><button class="btn btn-default response-button" type="submit">
                                                    <span class="icon icon-circle-with-plus response-icon"></span>
                                                </button></span>
                                        </div>
                                        <div class="media-footer text-right">
                                        </div>
                                    </li>
                                </div>
                            </li>
                        </ul>
                          {{ Form::close() }}
                    </div>
                    <!-- /input-group -->
                </div>
            </div>
      </div>



@endsection

<!-- Push a style dynamically from a view -->
@push('styles')
      <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
@endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>
    <script src="{{ asset('js/question.index.js') }}"></script>
@endpush
