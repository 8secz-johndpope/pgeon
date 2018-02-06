@extends('layouts.app-no-top-bar') @section('content')


<div style="width: auto">
	<div class="container p-t-md">



@if ($role_id !=  3 && $total_count_exhausted)
@else
    <div>

    <div class="question-container" >
        <div>
            {{ Form::open( array('url'=>'question','class' =>'form-horizontal')
            ) }} {{ Form::token() }}



            <div class="csslider infinity" id="slider1">
                        <input type="radio" name="slides" checked="checked" id="slides_1" />
                        <input type="radio" name="slides" id="slides_2" />
                        <!-- <input type="radio" name="slides" id="slides_3" /> -->
                        <ul>
                            <li>
                                <div class="va_slider_detail">
                                    <div>
                                        <div class="va_slider_heading">
                                            <textarea id="question-input" class="form-control question-input" rows="3"  placeholder="{{  Helper::since($lq_created_at) }}" style="border-radius: 0 10px 0 0;text-align: left; font-family: inherit; padding: 15px; font-size: 16px; height: 130px;" name="question"></textarea>
                                        </div>
                                    </div>
                                    <div class="nxtbtn">

                                        <div class="pull-left" style="padding-top: 2px;">
                                            <select name="days" id="day-select" class="custom-select time-select">
                                                <option value="00">00 days</option>
                                                <option value="01">01 days</option>
                                                <option value="02">02 days</option>
                                                <option value="03">03 days</option>
                                                <option value="04">04 days</option>
                                                <option value="05">05 days</option>
                                                <option value="06">06 days</option>
                                            </select>
                                            <span class="fa fa-sort text-muted" style="vertical-align: text-bottom;margin-left: -3px;"></span>
                                            <select name="hours" id="hour-select" class="custom-select time-select">
                                                <option value="00">00 hrs</option>
                                                <option value="01">01 hrs</option>
                                                <option value="02">02 hrs</option>
                                                <option value="03">03 hrs</option>
                                                <option value="04">04 hrs</option>
                                                <option value="05">05 hrs</option>
                                                <option value="06">06 hrs</option>
                                                <option value="07">07 hrs</option>
                                                <option value="08">08 hrs</option>
                                                <option value="09">09 hrs</option>
                                                <option value="10">10 hrs</option>
                                                <option value="11">11 hrs</option>
                                                <option value="12">12 hrs</option>
                                                <option value="13">13 hrs</option>
                                                <option value="14">14 hrs</option>
                                                <option value="15">15 hrs</option>
                                                <option value="16">16 hrs</option>
                                                <option value="17">17 hrs</option>
                                                <option value="18">18 hrs</option>
                                                <option value="19">19 hrs</option>
                                                <option value="20">20 hrs</option>
                                                <option value="21">21 hrs</option>
                                                <option value="22">22 hrs</option>
                                                <option value="23">23 hrs</option>
                                            </select>
                                            <span class="fa fa-sort text-muted" style="vertical-align: text-bottom;"></span>
                                            <select name="mins" id="minute-select" class="custom-select time-select">
                                                <option value="00">00 min</option>
                                                <option value="01">01 min</option>
                                                <option value="02">02 min</option>
                                                <option value="03">03 min</option>
                                                <option value="05">05 min</option>
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
                                        <label for="slides_2" id="q_next" style="font-size: 28px;margin-right: 5px;margin-top: -2px;">
                                            <a><span class="fal fa-arrow-circle-right"></span></a>
                                        </label>
                                    </div>
                            </li>
                            <li>
                                <div class="va_slider_detail_inner">
                                    <div id="q_preview_text" class="media-body-text" style="padding: 15px; font-size: 16px; height: 130px;">
                                    </div>
                                    <div class="nxtbtn">
                                        <label for="slides_1" style="font-size: 28px; margin-right: 10px; margin-top: -3px;">
                                            <a> <span class="fal fa-arrow-circle-left"></span></a>
                                        </label>

    {{
                            Form::submit('Submit',['class' => 'btn btn-sm btn-primary pull-right', 'id' =>
                            "submit-question", "style" => "font-size: 15px;display: inline-block;margin-top: 2px;"]) }}
                                        <div class="pull-left" style="font-size: 16px;margin-top: 6px;"><span id="sp_days"></span>
                                            <small style="margin-left: -3px;">d</small> <span id="sp_hr"></span>
                                            <small style="margin-left: -3px;">h</small> <span id="sp_mn"></span>
                                            <small style="margin-left: -3px;">m</small>

                                        </div>
                                    </div>
                            </li>

                        </ul>
                    </div>




            {{Form::close()}}
        </div>
    </div>
    </div>

		@if ($role_id !=  3)
				@if ($total_count_exhausted)
				<div class="alert alert-warning">
								Oh no, You've reached your question quota! You can ask more in 3days 1hr 10min.. </a>
				</div>
				@else
				<div class="alert alert-info">
								<strong>{{$total_posted }} / {{ $qs_allowed }}</strong> questions posted..
				</div>
				@endif
@else

@endif

    <div class="error hidden alert alert-warning animated shake" role="alert">
    Please include at-least one question mark.
    </div>
    </div>
    </div>

@endif







        <div style="width: auto;">
            <div class="container" style="padding: 0px;">
              <div class="col-sm-4">
													<div onclick="window.location.href='/live'">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="text-muted fal fa-circle-notch fa-3x fa-spin"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div style="margin-top: 0;" class="h4">
                                        {{count($live)}}
</div>
                                    <div>
                                        <div class="h5" style="margin: 0;">Live</div>
                                    </div>
                                </div>
                            </div>
                        </div>
											</div>
                    </div>
                </div>
                <div class="col-sm-4">
									<div onclick="window.location.href='/pending'">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="text-muted fal fa-clock fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div style="margin-top: 0;" class="h4">
                                        {{count($pending)}}
</div>
                                    <div>
                                        <div class="h5" style="margin: 0;">Pending</div>
                                    </div>
                                </div>
                            </div>
                        </div>
											</div>
                    </div>
                </div>
                <div class="col-sm-4">
									<div onclick="window.location.href='/published'">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="text-muted fal fa-check-circle fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div style="margin-top: 0;" class="h4">
																			{{count($published)}}
																		</div>
                                    <div class="h5" style="margin: 0;">Published</div>
                                </div>
                            </div>
                        </div>
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
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
@endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
<script src="{{ asset('js/question.index.js') }}"></script>
@endpush
