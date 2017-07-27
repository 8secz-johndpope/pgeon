@extends('layouts.app')
@section('content')


<div class="container p-t-md">
            <ul class="nav nav-pills tabs-padding">
                <li class="active">
                    <a href="#"><span class="icon icon-help"></span>
      Questions</a>
                </li>
                <li>
                    <a href="topR.html"><span class="icon icon-chat"></span>
      Replies</a>
                </li>
                @if( Auth::user()->role_id == 3)
                  <li role="presentation" class="pull-right">
                      <a href="/ask" type="button" class="btn btn-primary-outline">+ ?</a>
                  </li>
                @endif
            </ul>
            <div class="row">
                <div class="col-md-12">

                  <?php

                    foreach($questions as $key => $val){
                  ?>
                    <ul class="media-list media-list-conversation c-w-md">
                        <li class="media p-a">
                            <a class="media-left" href="#">
                              <img class="media-object img-circle" src="{{ $val->avatar ? '/uploads/avatars/'.$val->avatar:  URL::asset('img/profile-placeholder.svg')}} " alt="">


                            </a>
                            <div class="media-body">
                                <div class="media-header">
                                    <small class="text-muted"><a href="#" id="user-profile-text-link">{{$val->name}}</a> <span class="question_clock">Validity :   {!! Helper::question_validity_status($val->expiring_at) !!}
</span> </small>
                                </div>
                                <ul class="media-list media-list-conversation c-w-md">
                                    <li class="media m-b-md">
                                        <div class="media-body">
                                            <div class="media-body-text media-question" onclick="location.href='question/{{$val->id}}';" style="cursor: pointer;"> <?php echo $val->question ?>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <?php } ?>

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
