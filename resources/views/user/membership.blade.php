@extends('layouts.app')
@section('content')
<div class="container p-t-md">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group m-b-md">
                <a href="/profile" class="list-group-item"><span class="icon icon-chevron-thin-right pull-right"></span>
  Profile</a>

                <a href="/settings" class="list-group-item"><span class="icon icon-chevron-thin-right pull-right"></span>
  Security</a>
                <a href="#" class="list-group-item"><span class="icon icon-chevron-thin-right pull-right"></span>
  Membership</a>
                <a href="/notifications" class="list-group-item"><span class="icon icon-chevron-thin-right pull-right"></span>
  Notifications</a>
            </div>
        </div>
        <div class="col-md-9">




             <form  action="/profile" method="POST">

               <ul class="list-group media-list media-list-stream">
                  <li class="list-group-item p-a">
                      <h3 class="m-a-0">Profile</h3>
                  </li>
                  <li class="list-group-item media p-a">
                      <div class="form-group">
                          <ul class="list-group">
                              <li class="list-group-item ng-binding">
                                  <div class="pull-right">
                                      <div class="ng-scope">
                                          <span class="label">{{$plan}}</span>
                                          @if ($plan == "Free")
                                            <a data-toggle="collapse" data-target="#stripe_box" class="btn btn-link btn-xs">Upgrade Account</a>
                                          @endif
                                      </div>
                                  </div>
                                  Current Plan
                              </li>
                          </ul>
                      </div>
                      <div class="form-group">
                          <label for="redem-code">REDEEM CODE</label>
                          <div class="apply_codes">
                              <input type="text" placeholder="Enter Code" id="redem-code" name="redemcode">
                              <input type="submit" value="Apply" id="apply">
                          </div>
                      </div>
                  </li>

              </ul>

                              {{ csrf_field() }}
                      </form>


                      <div id="stripe_box" class="collapse">
                      {!! Form::open(['url' => '/subscribe', 'id' => 'payment-form']) !!}
                     @if ($message = Session::get('success'))
                     <div class="alert alert-success alert-block">
                       <button type="button" class="close" data-dismiss="alert">×</button>
                             <strong>{{ $message }}</strong>
                     </div>
                     @endif
                     <div class="form-group" id="product-group">
                         {!! Form::label('plan', 'Select Plan:') !!}
                         {!! Form::select('plan', ['pgeon_monthly' => '$5.00 / Month', 'pgeon_yearly' => '$50.00 / Year'], 'Plan', [
                             'class'                       => 'form-control',
                             'required'                    => 'required',
                             ]) !!}
                     </div>
                     <div class="form-group" id="cc-group">
                         {!! Form::label(null, 'Credit card number:') !!}
                         {!! Form::text(null, null, [
                             'class'                         => 'form-control',
                             'required'                      => 'required',
                             'data-stripe'                   => 'number',
                             'maxlength'                     => '16',
                             ]) !!}
                     </div>
                     <div class="form-group" id="ccv-group">
                         {!! Form::label(null, 'CVC (3 or 4 digit number):') !!}
                         {!! Form::text(null, null, [
                             'class'                         => 'form-control',
                             'required'                      => 'required',
                             'data-stripe'                   => 'cvc',
                             'maxlength'                     => '4',
                             ]) !!}
                     </div>
                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group" id="exp-m-group">
                             {!! Form::label(null, 'Ex. Month') !!}
                             {!! Form::selectMonth(null, null, [
                                 'class'                 => 'form-control',
                                 'required'              => 'required',
                                 'data-stripe'           => 'exp-month'
                             ], '%m') !!}
                         </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-group" id="exp-y-group">
                             {!! Form::label(null, 'Ex. Year') !!}
                             {!! Form::selectYear(null, date('Y'), date('Y') + 10, null, [
                                 'class'             => 'form-control',
                                 'required'          => 'required',
                                 'data-stripe'       => 'exp-year'
                                 ]) !!}
                         </div>
                       </div>
                     </div>
                       <div class="form-group">
                           {!! Form::submit('Subscribe!', ['class' => 'btn btn-lg btn-block btn-primary btn-order', 'id' => 'submitBtn', 'style' => 'margin-bottom: 10px;']) !!}
                       </div>
                       <div class="row">
                         <div class="col-md-12">
                             <span class="payment-errors" style="color: red;margin-top:10px;"></span>
                         </div>
                       </div>
                   {!! Form::close() !!}
                 </div>



               </div>
        <div class="col-md-3">
</div>
    </div>
</div>


@endsection