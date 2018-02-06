@extends('layouts.app-no-header-no-top-bar') @section('content')



<nav class="navbar navbar-inverse navbar-fixed-top app-navbar">
            <div class="container nav-container">
                <div class="navbar-header w-100">

                    <a class="navbar-back" onclick="window.history.back()"><span class="fal fa-times fa-lg"></span></a>
                    <h4>Live (#)</h4>
                </div>

            </div>
        </nav>


  <div style="width: auto;">
  </div>

    <div class="container">

      <div class="tabs">
        <div class="pending">

         @foreach ($questions as $key => $val)

        <div style="width: auto;">
            <div class="container p-t-md">
                <div>
                    <div class="media-body">
                        <div class="media-header m-b-5">
                            <small class="text-muted">{{$display_name}}</small>
                            <span class="dropdown time-align">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-caret-down"></i>
                            <answeringtimer initial="{{$val->expiring_in}}"></answeringtimer>
                          </a>
                            <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a id="end_now" rel="{{$val->id}}" href="#">End now <span class="fal fa-stop dropdown-icon"></span></a>
                                    </li>
                                    <li>
                                        <a id="cancel_now" rel="{{$val->id}}" href="#">Cancel <span class="fal fa-eject dropdown-icon"></span></a>
                                    </li>
                            </ul>
                          </span>
                        </div>
                        <ul class="media-list media-list-conversation c-w-md">
                            <li class="media">
                                <div class="media-body">
                                    <div class="media-body-text live-media-question">
                                   {{$val->question}}
</div>








                                    <!-- <ul class="media-list media-list-conversation c-w-md">
                                        <li class="media media-current-user media-divider">
                                            <div class="media-body" style="text-align: center">
                                                <div class="media-body-text media-response">
                                                    <div class="statcard p-a-md" style="display: inline-block">
                                                        <h3 class="statcard-number">{{$val->answers->count()}}</h3>
                                                        <span class="statcard-desc">responses</span>
                                                    </div>
                                                    <div class="statcard p-a-md" style="display: inline-block">
                                                        <h3 class="statcard-number">{{$val->votes->count() }}</h3>
                                                        <span class="statcard-desc">votes</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul> -->
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>




           @endforeach

        </div>

      </div>
  </div>







<div class="modal fade" id="viewAll" tabindex="-1" role="dialog" aria-labelledby="viewAll" aria-hidden="true">
  <div class="modal-dialog">
  <answers_expired_owner ref="answersexpiredowner"></answers_expired_owner>

  </div>
</div>




@endsection

<!-- Push a style dynamically from a view -->
@push('styles') @endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
<script src="{{ asset('js/question.index.js') }}"></script>
@endpush
