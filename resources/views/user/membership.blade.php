@extends('layouts.app-no-top-bar')
@section('content')
<div class="container p-t-md">
    <div class="row">

        @component('user.menu',['current_menu' => 'membership'])
		@endcomponent






     <div class="col-md-8" style="margin-top:10px">
      <form  action="/profile" method="POST">
                    <ul class="list-group media-list media-list-stream">
                        <li class="list-group-item media p-a">
                            <div class="form-group">
                                <ul class="list-group">
                                    <!-- <a href="#" style="line-height:2.3"><span class="icon icon-info-with-circle" style="line-height:2.3;float: left"></span> &nbsp;Learn more about pgeon membership</a> -->
                                    <li class="list-group-item ng-binding">
                                        <div class="pull-right">
                                            <div class="ng-scope">
                                                <span class="label">{{$plan}}</span>
                                                 @if ($plan == "Free")
                                                <a data-toggle="collapse" data-target="#stripe_box" class="btn btn-link btn-xs">upgrade</a>
                                                 @endif
                                            </div>
                                        </div>
                                        {{$user_type}}
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group">
                              <label class="control-label">Redeem code</label>
                              <div class="input-group">
                                <input class="form-control" placeholder="enter code..">
                                    <span class="input-group-btn"> <button class="btn btn-default" type="button" style="height: 36px;">apply</button> </span>
                                </div>
                            </div>
                        </li>
                    </ul>

                              {{ csrf_field() }}
                      </form>



                        <div id="stripe_box" class="collapse">

                    @if ($followers_counts < env('FOLLOWERS_NEEDED'))
                         <div class="alert alert-info alert-block m-t-10 text-center">
                          Pgeon membership requires at least <b>{{env('FOLLOWERS_NEEDED')}}</b> followers.<br>
                          To request manual approval please <a href="mailto:membership@pgeon.com">contact us</a>.
                         </div>

                    @else

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
                     @endif
                 </div>

                </div>




    </div>
</div>


@endsection
