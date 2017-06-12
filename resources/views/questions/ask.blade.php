@extends('layouts.app')
@section('content')
<div class="add-new-qsn">
<div class="notification_settings text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                <div class="qsn_header add-new-bc">
                    <h2>ADD NEW QUESTON</h2>

                    <a class="mdl-button mdl-js-button mdl-button--icon" ><!--<img src="img/back-arrow.svg" alt="">--><i class="material-icons">keyboard_backspace</i></a>
                </div>
            </div>
        </div>
    </div>
</div>


<section>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
		<!-- CONTENT -->
        <div class="question_content">

          {{ Form::open( array('url'=>'question','class' =>'form-horizontal') ) }}
          {{ Form::token() }}
               <fieldset>
                   <label>Response time *</label>
                   <div class="rs-time">
                       <select name="hours" id="hours">
                           <option>Hours</option>
                           <option value="one">One hour</option>
                           <option value="two">Two hours</option>
                           <option value="three">Three hours</option>
                           <option value="four">Four hours</option>
                       </select>

                       <select name="mins" id="mins">
                           <option>Mins</option>
                           <option value="min10">10 mins</option>
                           <option value="min20">20 mins</option>
                           <option value="min30">30 mins</option>
                           <option value="min40">40 mins</option>
                       </select>
                   </div>
               </fieldset>

               <fieldset>
                   <label for="qsn">Your question *</label>
                   <textarea name="question" id="qsn" cols="30" rows="10" placeholder="Type it here.."></textarea>
                   <!--<input type="file" name="file" id="file" size="100%">-->

                   <div class="file-box">
                        <input name="file" id="file" class="inputfile" data-multiple-caption="{count} files selected" multiple="" type="file">
                        <label for="file">
                            <figure>
                                <img src="{{URL::asset('img/attach_image-icon.svg')}}" alt="">
                            </figure>
                            <span>Choose a file…</span>
                        </label>
                    </div>
               </fieldset>

               <div class="submit-group">
                   <div class="sg_left">
                       <p>By submitting this form you are accepting all Pgeons <a href="">policies, terms &amp; conditions.</a></p>
                   </div>

                   <div class="sg_right">
                       {{ Form::submit('Next',['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent', 'id' => "next"]) }}
                   </div>
               </div>
             {{ Form::close() }}

        </div>
      </div>
    </div>
  </div>
</section>

</div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="questions">
                            <legend class="text-left">
                                <h1>Ask Question</h1>
                            </legend>
                        </div>
                            @if( !Auth::check() )
                                <p>You must be registered and logged in to ask a question. <a href="/register">Register Here</a></p>
                            @else
                                {{ Form::open( array('url'=>'question','class' =>'form-horizontal') ) }}
                                {{ Form::token() }}
                                <div class="form-group">
                                    <div class="col-md-12">
                                        {!! Form::text('question', null, ['class' => 'form-control', 'placeholder' => 'Should be in the form of an interview question...','required']) !!}
                                    </div>
                                </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="tab-pane" id="skill_level" name="Skill Level">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="txtTags">Tags</label>
                                                    @if (!$tags->isEmpty())
                                                        @foreach( $tags as $tag )
                                                            <small><a href="/tag/{{ $tag->name }}">{{ $tag->name }}</a>,</small>
                                                         @endforeach
                                                     @endif

                                                {!! Form::text('tags', 0, [ 'class' => 'form-control', 'id' => 'txtTags', 'name' => 'tags', 'data-role' => 'tagsinput', 'placeholder' => 'Add Tag', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group hidden">
                                <div class="col-md-12">
                                    <div class="tab-pane" id="skill_level" name="Skill Level">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="txtTags">Skill Level</label><br>
                                                {{ Form::select('level', ['Beginner' => 'Beginner', 'Intermediate' => 'Intermediate', 'Advanced' =>'Advanced']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="tab-pane" id="skill_level" name="Skill Level">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                {{ Form::close() }}
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
