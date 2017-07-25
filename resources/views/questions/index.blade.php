@extends('layouts.app')
@section('content')


    <div class="container p-t-md">
            <ul class="nav nav-pills tabs-padding">
                <li>
                    <a href="#"><span class="icon icon-help"></span>
      Questions</a>
                </li>
                <li>
                    <a href="#"><span class="icon icon-chat"></span>
      Replies</a>
                </li>
                <li role="presentation" class="pull-right">
                    <button type="button" class="btn btn-primary-outline active">+ ?</button>
                </li>
            </ul>
            <div class="col-md-12">

              {{ Form::open( array('url'=>'question','class' =>'form-horizontal hidden', 'id' => 'form-add-question') ) }}
              {{ Form::token() }}

              <div class="form-group">

              {{Form::textarea('question',null,array('class' => 'form-control', 'placeholder'=>'Content', 'id' => 'summernote'))}}
              </div>

              <div class="time-select-alignment">
                       <select name="hours" class="custom-select time-select" id="hour-select">
                           <option value="1">01 hr</option>
                           <option value="2">02 hr</option>
                           <option value="3">03 hr</option>
                           <option value="4">04 hr</option>
                           <option value="5">05 hr</option>
                           <option value="6">06 hr</option>
                           <option value="7">07 hr</option>
                           <option value="8">08 hr</option>
                           <option value="9">09 hr</option>
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
                       <select name="mins" class="custom-select time-select" id="minute-select">
                           <option value="0">00 min</option>
                           <option value="5">05 min</option>
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

                          {{ Form::submit('Submit',['class' => 'btn btn', 'id' => "submit-question"]) }}
                   </div>

              {{Form::close()}}


                <div class="well" id="well_add_ques"  style="cursor: pointer;">
                    <p style="text-align: center; padding-top: 10px;">Add new question</p>
                </div>
                <div class="media-divider">
                    <h4 style=" padding-top: 8px;"><span class="badge">0</span> &nbsp;Published <a href="#" id="previous-questions-edit"><small class="edit-link"></small></a></h4>
                </div>


                @foreach( $questions as $question )
                    @include('containers.question')
                @endforeach
            </div>
        </div>

        <!-- include summernote css/js-->

@endsection

<!-- Push a style dynamically from a view -->
@push('styles')
      <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
@endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>
@endpush
