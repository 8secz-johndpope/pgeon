@extends('layouts.app-profile-no-top-bar')
@section('content')


 <nav class="navbar navbar-inverse navbar-fixed-top app-navbar nav-question">
                <nav class="container nav-container header-nav">
                    <a href="{{$back}}" class="btn btn-link p-x-0"><span class="fal fa-times back-arrow"></span></a>
                    <h4>
                     <a href="{{  Helper::slug($question->user->id,$question->user->slug) }}"><img class="img-circle header-img" src="{{ Helper::avatar($question->user->avatar) }}"></a>
                    </h4>
                    <div class="dropdown">
                        <a class="btn btn-link p-x-0" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="fal fa-ellipsis-v ellipsis"></span></a>
                        <ul class="dropdown-menu header-dropdown" role="menu">
                          <li>
                              <a href="#"> <span class="fal fa-plus dropdown-icon"></span>Follow</a>
                          </li>
                            <li>
                                <a data-toggle="modal" href="#shareQuestion"> <span class="fal fa-share-alt dropdown-icon"></span>Share</a>
                            </li>
                            <li>
                                 <a  id="report_question" data-qid="{{$question->id}}"> <span class="fal fa-flag dropdown-icon"></span>Report</a>
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
            <!-- begin report question modal -->
            <!-- <div class="modal fade" id="reportQuestion" tabindex="-1" role="dialog" aria-labelledby="reportQuestion" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Report question</h4>
                        </div>
                        <div class="modal-body">
                          <p class="text-muted">Sorry, this feature isn't quite ready.</p>
                        </div>
                    </div>
                </div>
            </div> -->









      <answers hits="{{$question->hits}}" q_votes_count="{{$question->votes()->count() }}"  question="{{$question->question}}" question_user_slug="{{Helper::slug($question->user->id ,$question->user->slug)}}"  question_id="{{$question->id}}" initial="{{$lq_expiring_in}}"
								question_id="{{$question->id}}" current_user_slug="{{Helper::slug(Auth::user()->id ,Auth::user()->slug)}}"  current_user_id="{{Auth::user()->id}}" question_owner_id="{{$question->user_id}}" ></answers>

@endsection

<!-- Push a style dynamically from a view -->

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
 @endpush
@push('after-core-styles')
<link href="{{ asset('css/up-voting.css') }}" rel="stylesheet">


 @endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
    <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
    <script src="{{ asset('js/up-voting.js') }}"></script>
<script src="{{ asset('js/question.index.js') }}"></script>
@endpush
