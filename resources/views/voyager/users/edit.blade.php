@extends('voyager.master')
@section('content')
    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">


          {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}




              <div class="form-group">
                  {{ Form::label('featured', 'Featured') }}
                  {{ Form::select('featured', array('0' => 'No', '1' => 'Yes'), null, array('class' => 'form-control')) }}
              </div>

              <div class="row">
              {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
            </div>



          {{ Form::close() }}



          <div class="row">
          <div class="col-md-2" >
            {{ Form::model($user, array('route' => array('voyager.publish', $user->id), 'method' => 'POST')) }}

            {{ Form::close() }}
          </div>
          <div class="col-md-10" >


          </div>
          </div>





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
    <script src="{{ asset('js/user.index.js') }}"></script>
@endpush
