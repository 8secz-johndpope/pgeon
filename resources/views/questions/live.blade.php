@extends('layouts.app-no-header-no-top-bar') @section('content')



<nav class="navbar navbar-inverse navbar-fixed-top app-navbar">
            <div class="container nav-container">
                <div class="navbar-header w-100">

                    <a class="navbar-back" onclick="window.history.back()"><span class="fal fa-times fa-lg"></span></a>
                    <h4>Live ({{count($questions)}})</h4>
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
                     
                        <ul class="media-list media-list-conversation c-w-md">
                            <li class="media">
                                <div class="media-body">
                                    <div class="media-body-text live-media-question goto-qdetail" data-id={{$val->id}}>
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
