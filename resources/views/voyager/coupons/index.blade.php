@extends('voyager::master')
@section('content')
    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                      <table class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <td>ID</td>
                              <td>Amount off</td>
                              <td>Created</td>
                              <td>Duration</td>
                              <td>Duration_in_months</td>
                              <td>livemode</td>
                              <td>max allowed redemptions</td>
                              <td>percent_off</td>
                              <td>redeem_by (should be redeemed before) </td>
                              <td>times_redeemed </td>
                              <td>valid</td>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach($coupons as $value)
                      
                     

                          <tr>
                              <td> {{ $value['id'] }}</td>
                              <td>{{ $value['amount_off'] }}                        </td>
                              <td>{{  date('Y-m-d H:i:s', $value['created'])  }}</td>
                              <td>  {{ $value['duration'] }}</td>
                               <td>{{ $value['duration_in_months'] }}  </td>
                              <td>                              {{ $value['livemode']}}</td>
                              <td>                             {{ $value['max_redemptions']}}</td>
                              <td>                              {{ $value['percent_off']}}</td>
                              <td>                              {{ $value['redeem_by']}}</td>
                              
                              <td>                              {{ $value['times_redeemed']}}</td>
                              <td>                              {{ $value['valid']}}</td>

                          </tr>
                      @endforeach
                      </tbody>
                    </table>

                  

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop


