@extends('voyager.master')
@section('content')
    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">


          {{ Form::model($question, array('route' => array('questions.update', $question->id), 'method' => 'PUT')) }}

              <div class="form-group">
                  {{ Form::label('question', 'Question') }}
                  {{Form::textarea('question',null,array('class' => 'form-control',  'id' => 'summernote'))}}

              </div>

              <div class="form-group">
                  {{ Form::label('status', 'Status') }}
                  {{ Form::select('status', array('PENDING' => 'Pending', 'PUBLISHED' => 'PUBLISHED'), null, array('class' => 'form-control')) }}
              </div>

              <div class="row">
              {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
            </div>



          {{ Form::close() }}



          <div class="row">
          <div class="col-md-2" >
            {{ Form::model($question, array('route' => array('voyager.publish', $question->id), 'method' => 'POST')) }}

               Validity : <b>{{$question->formatted_h_m()}}</b>
               @if ($question->published_at)
                    {!! ($question->expiring_at) !!}
               @else
                  <div class="alert alert-warning">Not publised yet!

                    {{ Form::submit('Publish it', array('class' => 'btn btn-primary')) }}

                  </div>

              @endif
            {{ Form::close() }}
          </div>
          <div class="col-md-10" >


          </div>
          </div>


sdsd


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                    </h4>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@stop


<!-- Push a script dynamically from a view -->
@push('scripts')
    <script src="{{ asset('js/question.index.js') }}"></script>
@endpush
