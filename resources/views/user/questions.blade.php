@extends('layouts.app-no-top-bar')
@section('content')
<div class="add-new">
<div class="notification_settings text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                <div class="qsn_header add-new-bc">
                    <h2>MY QUESTONS</h2>

                    <a class="mdl-button mdl-js-button mdl-button--icon" ><i class="material-icons">keyboard_backspace</i></a>
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

           <div class="add_new_qsn">
               <a href="/question/ask"><i class="fa fa-plus"></i> Add new question</a>
           </div>

            <div class="question_box">


              @foreach( $questions as $question )
                  @include('containers.question')
                  <hr>
              @endforeach
                <!-- single question -->


              
                </div>



            </div>

        </div>
      </div>
    </div>
  </div>
</section>

</div>





@endsection
