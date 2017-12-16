@extends('layouts.app') @section('content')
 @if ($lq_expiring_at < time())


<div style="width: auto">
	<div class="container p-t-md">
		<div>
      <div class="error hidden alert alert-danger" role="alert">
    Please include at-least one question mark.
</div>
			<div class="question-container">
				<div class="form-group">
					{{ Form::open( array('url'=>'question','class' =>'form-horizontal')
					) }} {{ Form::token() }}



					 <div class="csslider infinity" id="slider1">
                                <input type="radio" name="slides" checked="checked" id="slides_1" />
                                <input type="radio" name="slides" id="slides_2" />
                                <input type="radio" name="slides" id="slides_3" />
                                <ul>
                                    <li>
                                        <div class="va_slider_detail">
                                            <div>
                                                <div class="va_slider_heading">
                                                    <textarea id="question-input" class="form-control question-input" rows="3"  placeholder="{{  Helper::since($lq_expiring_at) }}" style="border-radius: 0 10px 0 0;text-align: left; font-family: inherit; padding: 15px; font-size: 16px; height: 130px;" name="question"></textarea>
                                                </div>
                                            </div>
                                            <div class="nxtbtn">

                                                <div class="pull-left" style="padding-top: 2px;">
                                                    <select name="days" id="day-select" class="custom-select time-select">
                                                        <option value="00">00 day</option>
                                                        <option value="01">01 day</option>
                                                        <option value="02">02 day</option>
                                                        <option value="03">03 day</option>
                                                        <option value="04">04 day</option>
                                                        <option value="05">05 day</option>
                                                        <option value="06">06 day</option>
                                                    </select>
                                                    <span class="fa fa-sort text-muted" style="vertical-align: text-bottom;margin-left: -3px;"></span>
                                                    <select name="hours" id="hour-select" class="custom-select time-select">
                                                        <option value="00">00 hr</option>
                                                        <option value="01">01 hr</option>
                                                        <option value="02">02 hr</option>
                                                        <option value="03">03 hr</option>
                                                        <option value="04">04 hr</option>
                                                        <option value="05">05 hr</option>
                                                        <option value="06">06 hr</option>
                                                        <option value="07">07 hr</option>
                                                        <option value="08">08 hr</option>
                                                        <option value="09">09 hr</option>
                                                        <option value="10">10 hr</option>
                                                        <option value="11">11 hr</option>
                                                        <option value="12">12 hr</option>
                                                        <option value="13">13 hr</option>
                                                        <option value="14">14 hr</option>
                                                        <option value="15">15 hr</option>
                                                        <option value="16">16 hr</option>
                                                        <option value="17">17 hr</option>
                                                        <option value="18">18 hr</option>
                                                        <option value="19">19 hr</option>
                                                        <option value="20">20 hr</option>
                                                        <option value="21">21 hr</option>
                                                        <option value="22">22 hr</option>
                                                        <option value="23">23 hr</option>
                                                    </select>
                                                    <span class="fa fa-sort text-muted" style="vertical-align: text-bottom;"></span>
                                                    <select name="mins" id="minute-select" class="custom-select time-select">
                                                        <option value="05">05 min</option>
                                                        <option value="00">00 min</option>
                                                        <option value="10">10 min</option>
                                                        <option value="15">15 min</option>
                                                        <option value="20">20 min</option>
                                                        <option value="25">25 min</option>
                                                        <option value="30">30 min</option>
                                                        <option value="35">35 min</option>
                                                        <option value="40">40 min</option>
                                                        <option value="45">45 min</option>
                                                        <option value="50">50 min</option>
                                                        <option value="55">55 min</option>
                                                    </select>
                                                    <span class="fa fa-sort text-muted" style="vertical-align: text-bottom;"></span>
                                                </div>
                                                <label for="slides_2" id="q_next" style="color: #24BDB6; font-size: 28px;margin-right: 5px;margin-top: -2px;">
                                                    <span class="fa fa-arrow-circle-right"></span>
                                                </label>
                                            </div>
                                    </li>
                                    <li>
                                        <div class="va_slider_detail_inner">
                                            <div id="q_preview_text" class="media-body-text" style="padding: 15px; font-size: 16px; height: 130px;">
                                            </div>
                                            <div class="nxtbtn">
                                                <label for="slides_1" style="color: #BCC0C8; font-size: 28px;margin-right: 10px;margin-top: -3px;">
                                                    <span class="fa fa-arrow-circle-left"></span>
                                                </label>

{{
									Form::submit('Submit',['class' => 'btn btn-sm btn-primary pull-right', 'id' =>
									"submit-question", "style" => "font-size: 15px;display: inline-block;margin-top: 2px;"]) }}
                                                <div class="pull-left" style="font-size: 16px;margin-top: 6px;"><span id="sp_days"></span>
                                                    <small style="margin-left: -3px;">day</small> <span id="sp_hr"></span>
                                                    <small style="margin-left: -3px;">hr</small> <span id="sp_mn"></span>
                                                    <small style="margin-left: -3px;">min</small>

                                                </div>
                                            </div>
                                    </li>

                                </ul>
                            </div>




					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>


@else
<div style="width: auto;">
            <div class="container m-t-5">
                <div class="form-group">
                    <div class="media-body">
                        <div class="media-header">
                            <small class="text-muted"><a href="#" id="user-profile-text-link">display-name</a></small>
                            <span class="dropdown pull-right small"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">


                            <answeringtimer initial="{{$lq_expiring_in}}"></answeringtimer>
                            <span class="caret"></span></a><ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a id="end_now" rel="{{$lq->id}}" href="#">End now <span class="fa fa-stop dropdown-icon"></span></a>
                                    </li>
                                    <li>
                                        <a id="cancel_now" rel="{{$lq->id}}" href="#">Cancel <span class="fa fa-eject dropdown-icon"></span></a>
                                    </li>
                                </ul></span>
                        </div>
                        <ul class="media-list media-list-conversation c-w-md">
                            <li class="media">
                                <div class="media-body">
                                    <div class="media-body-text media-question">
                                   {{$lq->question}}
</div>








                                    <ul class="media-list media-list-conversation c-w-md">
                                        <li class="media media-current-user media-divider">
                                            <div class="media-body" style="text-align: center">
                                                <div class="media-body-text media-response">
                                                    <div class="statcard p-a-md" style="display: inline-block">
                                                        <h3 class="statcard-number">{{$lq->answers->count()}}</h3>
                                                        <span class="statcard-desc">responses</span>
                                                    </div>
                                                    <div class="statcard p-a-md" style="display: inline-block">
                                                        <h3 class="statcard-number">{{$lq->votes->count() }}</h3>
                                                        <span class="statcard-desc">votes</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endif




        <div style="width: auto;">
            <div class="container" style="padding: 0;">
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fal fa-clock fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="h3">
                                        {{count($pending)}}
</div>
                                    <div>
                                        <div class="h4" style="margin-bottom: 0;">Pending</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="/pending">
                            <div class="panel-footer flexbox-container">
                                <span>View all</span>
                                <span><i class="fa fa-arrow-right fa-lg"></i></span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fal fa-newspaper fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="h3">{{count($published)}}</div>
                                    <div class="h4" style="margin-bottom: 0;">Published</div>
                                </div>
                            </div>
                        </div>
                        <a href="/published">
                            <div class="panel-footer flexbox-container">
                                <span>View all</span>
                                <span><i class="fa fa-arrow-right fa-lg"></i></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>





                </div>
                <!-- end of tabs -->
            </div>
        </div>







<!-- include summernote css/js-->

@endsection

<!-- Push a style dynamically from a view -->
@push('styles') @endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
<script src="{{ asset('js/question.index.js') }}"></script>
@endpush
