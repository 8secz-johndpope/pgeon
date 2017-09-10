@extends('layouts.app') @section('content')
 @if ($lq_expiring_at < time())


<div style="background-color: #828287; width: auto">
	<div class="container p-t-md">
		<div class="col-md-12" style="margin-top: 5px;">
			<div class="question-container">
				<div class="form-group">
					{{ Form::open( array('url'=>'question','class' =>'form-horizontal')
					) }} {{ Form::token() }}
					<div class="csslider infinity" id="slider1">
						<input type="radio" name="slides" checked="checked" id="slides_1" />
						<input type="radio" name="slides" id="slides_2" /> <input
							type="radio" name="slides" id="slides_3" />
						<ul>
							<li>
								<div class="va_slider_detail">
									<div>
										<div class="va_slider_heading">
											<textarea class="form-control question-input" rows="5"
												id="question-input" placeholder="{{  Helper::since($lq_expiring_at) }}"
												style="border-radius: 0 10px 0 0; text-align: left; font-family: inherit" name="question"></textarea>

										</div>
									</div>
									<div class="nxtbtn">
										<div
											style="text-align: right; display: inline-flex; margin-right: 15px">
											<span id="question_counter">0</span>/150</div>
										<label class="btn btn-default" for="slides_2">next</label>
									</div>
							
							</li>
							<li>
								<div class="va_slider_detail">
									<div class="va_slider_detail_inner">
										<div class="va_slider_heading">

											<div class="time-select-alignment">
												<select name="hours" class="custom-select time-select"
													id="hour-select">
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
												</select> <select name="mins"
													class="custom-select time-select" id="minute-select">

													<option value="01">01 min</option>
													<option value="00">00 min</option>
													<option value="02">02 min</option>
													<option value="03">03 min</option>
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

											</div>

										</div>
									</div>
								</div>
								<div class="nxtbtn">
									<label class="btn btn-default" for="slides_1">back</label> <label
										class="btn btn-default" for="slides_3" id="q_preview">preview</label>
								</div>
							</li>
							<li>
								<div class="va_slider_detail">
									<div class="va_slider_detail_inner">
										<div id="q_preview_text" class="media-body-text" style="padding: 15px;"></div>
									</div>
								</div>
								<div class="nxtbtn">
									<div class="pull-left"
										style="padding-left: 35px; padding-top: 7px;">
										<span class="icon icon-hour-glass"></span> <span id="sp_hr"></span>hr <span id="sp_mn"></span>min
									</div>
									<label class="btn btn-default" for="slides_2">back</label> {{
									Form::submit('Submit',['class' => 'btn btn-primary', 'id' =>
									"submit-question"]) }}
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


@else You already have an active question running. Please wait for
@endif


<div class="container p-t-md">
	<div class="col-md-12">
		<ul class="nav nav-pills iconav-nav" style="padding-bottom: 10px;">
			<li class="active"><a href="replies.html"><span class="text-muted">123</span><small
					class="iconav-nav-label visible-xs-block"> replies</small></a></li>
			<li><a href="published.html"> <span class="text-muted">123</span> <small
					class="iconav-nav-label visible-xs-block"> published</small></a></li>
		</ul>
		<ul class="media-list media-list-stream c-w-md">
			<div class="media-body m-b">
				<ul class="media-list media-list-conversation c-w-md">
					<li class="media">
						<div class="media-body">
							<div class="media-body-text media-question">Cras justo odio,
								dapibus ac facilisis in, egestas eget quam. Duis mollis, est non
								commodo luctus, nisi erat porttitor ligula, eget lacinia odio
								sem nec elit. Praesent commodo cursus magna, vel scelerisque
								nisl consectetur et.</div>
						</div>
					</li>
				</ul>
				<ul class="media-list media-list-conversation c-w-md">
					<li class="media media-current-user media-divider">
						<div class="media-body-text media-response">Cras justo odio,
							dapibus ac facilisis in, egestas eget quam. Duis mollis, est non
							commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem
							nec elit. Praesent commodo cursus magna, vel scelerisque nisl
							consectetur et.</div>
						<div style="padding-top: 10px;">
							<div class="pull-left">Replied: 10/10/17</div>
							<div class="pull-right">
								<label class="btn btn-default">Delete</label> <label
									class="btn btn-primary">Publish</label>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</ul>
	</div>
</div>




<!-- include summernote css/js-->

@endsection

<!-- Push a style dynamically from a view -->
@push('styles') @endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
<script src="{{ asset('js/question.index.js') }}"></script>
<script src="{{ asset('js/jquery.countdownTimer.min.js') }}"></script>
@endpush
