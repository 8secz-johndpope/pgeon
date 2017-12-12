@extends('layouts.app-profile')
@section('content')


 <nav class="navbar navbar-inverse navbar-fixed-top app-navbar nav-question">
                <nav class="container nav-container header-nav">
                    <a  href="/responses" ><span class="fal fa-arrow-left" style="font-size: 20px;"></span></a>
                    <h4>
                    <img class="img-circle header-img" src="{{ Helper::avatar($question->user->avatar) }}">
                    </h4>
                    
                        <div class="dropdown">
                        <a class="btn btn-link p-x-0" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="fal fa-ellipsis-v ellipsis"></span></a>
                        <ul class="dropdown-menu header-dropdown" role="menu">
                     
                     
                            <li>
                                <a data-toggle="modal" href="#shareQuestion"> <span class="fa fa-share-alt dropdown-icon"></span>Share</a>
                            </li>
                            <li>
                                <a  id="report_question" data-qid="{{$question->id}}"> <span class="fa fa-flag dropdown-icon"></span>Report</a>
                            </li>
                        </ul>
                    </div>
                    
                </nav>
            </nav>



         <!-- begin share question modal -->
            <div class="modal fade" id="shareQuestion" tabindex="-1" role="dialog" aria-labelledby="shareQuestion" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Share question</h4>
                        </div>
                        <div class="modal-body p-y-sm">
                            <div class="flexbox-container">
                            
                            <div class="sharethis-inline-share-buttons"></div>
                            
                            
                            </div>
                        </div>
                        <div class="modal-body p-a">
                            <div class="flexbox-container">
                                <div>
                                    <div>
                                        <div class="input-group">
                                            <input class="form-control" id="txt_current_url" value="{{url()->current()}}">
                                            <span class="input-group-btn"> <button id="copy_to_cb" class="btn btn-default" type="button" style="height: 36px;">
                                                    <span class="fa fa-copy"></span>
                                                </button> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      <div style="width: auto;">
            <div class="container">
                <ul class="media-list media-list-conversation c-w-md">
                    <div class="media-body">
                        <div class="h5 m-b-5">
                            <span class="tmw"><a href="#">{{$question->user->name}}</a></span>
                               @if(isset($answer))
                            <span class="fa fa-long-arrow-left text-muted"></span>
                            <span class="tmw"><a href="#">{{$answer->user->name}}</a></span>
                            @endif
                            <span class="text-muted time-align">Ended:  <localtimezone ts="{{$question->expiring_at}}"> </localtimezone></span>
                        </div>
                        <ul class="media-list media-list-conversation c-w-md">
                            <li class="media">
                                <div class="media-body">
                                    <div class="media-body-text media-question">
                                    {{$question->question}}
</div>
                                    
                                    @if(isset($answer))
                                    <ul class="media-list media-seconday media-list-conversation c-w-md">
                                        <li class="media media-current-user media-divider">
                                            <div class="media-body">
                                                <div class="media-body-text media-response media-response-margin" style="cursor: pointer;">
                                                    {{$answer->answer}}
</div>
                                            </div>
                                        </li>
                                    </ul>
                                    @else
                                    
                                         <ul class="media-list  media-secondary media-list-conversation c-w-md">
                                <li class="media media-current-user media-divider">
                                    <div class="media-body" style="text-align: center">
                                        <div class="media-body-text media-response">
                                            <div class="statcard p-a-md" style="display: inline-block">
                                                <div class="loader-2">
                                                    <div class="dot"></div>
                                                    <div class="dot"></div>
                                                    <div class="dot"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endif
                            
                                </div>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>



<!-- 
  <answers_expired question_id="{{$question->id}}" current_user_id="{{Auth::user()->id}}" question_owner_id="{{$question->user_id}}" accepted_answer="{{$question->accepted_answer}}"></answers_expired>
 -->



@endsection



<!-- Push a script dynamically from a view -->
@push('scripts')
<script src="{{ asset('js/question.index.js') }}"></script>
@endpush
