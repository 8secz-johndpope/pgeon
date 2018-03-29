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
                      <td>Email</td>
                      <td>Display Name</td>
                      <td>          </td>
                  </tr>
              </thead>
              <tbody>
              @if ($users)  
                @foreach($users as $value)
                


                    <tr>
                        <td> {{ $value->email }}</td>
                        <td>{{ $value->slug }}                        </td>
                        <td>
                            @if ($value->role_id == 3)
                            <a class="del" id="{{ $value->id }}"> Strip the membership    </a>         
                            @else
                            Not a member anymore.
                            @endif
                        </td>
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
       if (confirm('Will be demoted to a normal user.Want to continue?')) {
           location.href=`/admin/coupon/stripdown/${$(this).attr('id')}`
       }
    });
  } );
    </script>
@endpush

