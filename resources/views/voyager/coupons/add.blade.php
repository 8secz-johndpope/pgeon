@extends('voyager.master')

@section('content')
    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">


          {{ Form::open(array('url' => '/admin/coupons/ins', 'method' => 'POST')) }}

              <div class="form-group">
                  {{ Form::label('coupon_code', 'Coupon Code') }}
                  {{Form::text('coupon_code',null,array('class' => 'form-control'))}}

              </div>

              <div class="form-group">
                  {{ Form::label('description', 'description') }}
                  {{ Form::text('description', null, array('class' => 'form-control')) }}
              </div>



              <div class="form-group">
                  {{ Form::label('max_redemptions', 'max_redemptions') }}
                  {{ Form::text('max_redemptions', null, array('class' => 'form-control')) }}
              </div>

                 <div class="form-group">
                  {{ Form::label('coupon_validity', 'coupon_validity') }}
                  {{ Form::text('coupon_validity', null, array('id' =>'datepicker')) }}
              </div>

              <div class="row">
              {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
            </div>



          {{ Form::close() }}








                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@push('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="{{ asset('js/question.index.js') }}"></script>
    <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
  } );
  </script>
@endpush
