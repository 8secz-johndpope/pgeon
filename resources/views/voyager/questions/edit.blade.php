@extends('voyager::master')
@section('content')
    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
{{ HTML::ul($errors->all()) }}

          {{ Form::model($question, array('route' => array('questions.update', $question->id), 'method' => 'PUT')) }}

              <div class="form-group">
                  {{ Form::label('question', 'Question') }}
                  {{ Form::text('question', null, array('class' => 'form-control')) }}
              </div>

              <div class="form-group">
                  {{ Form::label('status', 'Status') }}
                  {{ Form::select('status', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), null, array('class' => 'form-control')) }}
                  </div>
              </div>


              {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

          {{ Form::close() }}


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
