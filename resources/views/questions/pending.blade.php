@extends('layouts.app-no-header-no-top-bar') @section('content')



<nav class="navbar  navbar-inverse navbar-fixed-top app-navbar nav-shadow">
            <div class="container nav-container">
                <div class="navbar-header w-100">

                    <a  class="navbar-back" onclick="/my-questions"><span class="fal fa-long-arrow-left fa-lg"></span></a>
                    <h4>Pending ({{count($pending)}})</h4>
                </div>

            </div>
        </nav>

  <div style="width: auto;">
  </div>

    <div class="container p-t-md">

      @include('flash::message')


      <div class="tabs">
        <div class="pending">

         @foreach ($pending as $key => $val)

          <ul class="media-list media-list-stream c-w-md">
            <div class="media-body m-b">
              <ul class="media-list media-list-conversation c-w-md">
                <li class="media">
                  <div class="media-body">
                    <div class="media-body-text media-question">
                    <table class="bkword">
											<tr>
											<td>
                    {{$val['question']->question}}
                    </td></tr></table>
                    </div>
                  </div>
                </li>
              </ul>
              <ul class="media-list media-list-conversation c-w-md">
                <li class="media media-current-user media-divider">
                  <div class="media-body-text media-response">
                     @if ($val['answer'])
                     <table class="bkword">
											<tr>
											<td>
                                          {{$val['answer']->answer}}
                                          </td>
</tr>
</table>
                                       @endif
                  </div>
                  <div style="padding-top: 10px;">
                   @if ($val['answer'])
                        <a data-toggle="modal" href="#viewAll" v-on:click="callChildPendingAnswers({{$val['question']->id}}, '{{Helper::slug($val['question']->user->id ,$val['question']->user->slug)}}', '{{addslashes($val['question']->question)}}', '{{date('m/d/Y', $val['question']->expiring_at)}}', {{$val['answer']->id}})" style="vertical-align: sub;">&nbsp;<i class="fal fa-comments"></i>&nbsp;View all</a>
                                    @endif
                    <div class="pull-right">
                    	    <longpress duration="2" :on-confirm="deleteQ" :value={{$val['question']->id}} pressing-text="Deleing in {$rcounter} secs" class="btn btn-danger-outline" action-text="Deleting">Delete</longpress>


                                              @if ($val['answer'])
                                                <form  method="post" id="publish_form" action="/accept_answer">
                                                {{ Form::token() }}
                                 <input type="hidden" value="{{$val['answer']->id}}" name="answer_id" >
                                  <input type="hidden" value="{{$val['answer']->user_id}}" name="answered_by" >
                                <input type="hidden" name="question_id" value="{{$val['question']->id}}" >
                                <button type="submit"  class="btn btn-primary">Publish</button>
                               </form>

                                        @endif
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </ul>

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
