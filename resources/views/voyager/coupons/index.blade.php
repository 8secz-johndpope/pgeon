@extends('voyager.master')
@section('content')
<div class="page-content container-fluid">

@include('voyager::alerts')



<div class="row">
    <div class="col-md-12">
        <h3>Local Coupons (lifetime)</h3>
        <p>Life time coupons -  which has no expiration. </p><p>Users who redeemed this coupon can enjoy lifetime membership. </p><p>Deleting a coupon at any time will strip down the membership from the users used it.</p><p> This doesn't require a credit card while subscription.</p><p>
             Individually, members can be relived off from coupon benefits and demoted to normal users on 'Users' screen.  </p>
             <a href="coupons/create"><b>Add new</b></a>
        <div class="panel panel-bordered">
            <div class="panel-body">
                
              <table class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <td>ID</td>
                      <td>Coupon Code</td>
                      <td>Description</td>
                      <td>max allowed redemptions</td>
                      <td>Coupon validity</td>
                      <td>Created at</td>
                      <td>Redeemed by</td>
                      <td></td>
                  </tr>
              </thead>
              <tbody>
              @if ($local_coupons)  
                @foreach($local_coupons as $value)
                


                    <tr>
                        <td> {{ $value->id }}</td>
                        <td>{{ $value->coupon_code }}                        </td>
                        <td>{{   $value->description  }}</td>
                        <td>  {{ $value->max_redemptions }}</td>
                        <td>{{ $value->coupon_validity }}  </td>
                        <td>                              {{ $value->created_at}}</td>
                        <td><a href='/admin/coupon/{{$value->id}}'>     {{ $value->redeem_count}}</a></td>
                        <td><a class="del" id="{{ $value->id }}"><span class="icon voyager-trash"></span></a></td>
                    </tr>
                @endforeach
              @endif
              </tbody>
            </table>

          

            </div>
        </div>
    </div>
</div>






<div class="row">
    <div class="col-md-12">
        <h3>Stripe Coupons (limited)</h3>
        <h6>Limited time coupons -  which will be expired and subscriptions charges will be levied thereafter. These coupons requires credit cards during subscriptions. Coupons should be created in Stripe dashboard </h6>
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
                      <td>expiry </td>
                      <td>times_redeemed </td>
                      <td>valid</td>
                  </tr>
              </thead>
              <tbody>
              @if ($coupons)  
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
                        <td>                              {{ $value['valid'] }}</td>

                    </tr>
                @endforeach
              @endif
              </tbody>
            </table>

          

            </div>
        </div>
    </div>
</div>
</div>

@stop

@push('scripts')
<script>
          $( function() {
    $( ".del" ).click(function () {
       if (confirm('Users enjoying the benefits will be still retain them. It will just delete the coupon.Want to continue?')) {
           location.href=`coupons/delete/${$(this).attr('id')}`
       }
    });
  } );
    </script>
@endpush

