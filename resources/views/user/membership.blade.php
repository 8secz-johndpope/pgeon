@extends('layouts.app-no-top-bar')
@section('content')
<div class="container p-t-md">
    <div class="row">

        @component('user.menu',['current_menu' => 'membership'])
		@endcomponent






     <div class="col-md-8 m-b-5" style="margin-top:10px">
    
                    <ul class="list-group media-list media-list-stream" >
                        <li class="list-group-item media p-a" >
                            <div class="form-group" v-if="!coupon.applied">
                                <ul class="list-group">
                                    <!-- <a href="#" style="line-height:2.3"><span class="icon icon-info-with-circle" style="line-height:2.3;float: left"></span> &nbsp;Learn more about pgeon membership</a> -->
                                    <li class="list-group-item ng-binding">
                                        <div class="pull-right">
                                            <div class="ng-scope" >
                                                <span class="label">{{$plan}}</span>
                                                 @if ($plan == "Free")
                                                <a data-toggle="collapse" data-target="#stripe_box" class="btn btn-link btn-xs">upgrade</a>
                                               
                                                 @endif
                                            </div>
                                        </div>
                                        
                                     
                                        {{$user_type}}
                                        </li>
                                        @if ($plan != "Free" && $stripe_id != "")
<!-- works only with stripe...not for local subscription -->
                                        <li class="list-group-item ng-binding">
                                         <div >
                                                <form  action="/unsubscribe" method="POST">
                                                   <button type="submit" class="btn btn-danger" > Cancel Subscription</button>
                                                    {{ csrf_field() }}
                                                </form>
                                                </div>
                                                </li>
                                        @endif
                                   
                                </ul>
                            </div>

                            <div class="form-group" v-if="coupon.error" v-cloak>
                                <span class="alert alert-danger"> @{{coupon.error}} </span>
                            </div>    


                        <div class="form-group" v-if="coupon.lc_confirmed" v-cloak>
                                <span class="alert alert-success"> Subscription is completed.</span>
                                 
                            </div>

                             <div class="form-group" v-if="coupon.applied && !coupon.lc_confirmed" v-cloak>
                                <span class="alert alert-success"> Coupon applied</span>
                                 <button v-on:click="removeAppliedCoupon()" class="btn btn-default" type="button" style="height: 36px;" >Reset</button>

                                  <button type="button" class="btn btn-default" style="height: 36px;" v-if = "coupon.type == 'local'" v-on:click="confirmLocalCouponSubscription()" :disabled="coupon.loading">Confirm your subscription</button>
                            </div>

                            @if ($plan == "Free")
                            <div class="form-group" v-if="!coupon.applied && !coupon.lc_confirmed">
                              <label class="control-label">Redeem code</label>
                              <div class="input-group">
                                <input class="form-control" v-model="coupon.code" placeholder="enter code..">
                                    <span class="input-group-btn"> <button v-on:click="validateCoupon()" class="btn btn-default" type="button" style="height: 36px;" :disabled="coupon.loading">apply</button> </span>
                                </div>
                            </div>
                            @endif    


                        </li>
                    </ul>

                           


 @if ($message = Session::get('success'))
                         <div class="alert alert-success alert-block">
                           <button type="button" class="close" data-dismiss="alert">×</button>
                                 <strong>{{ $message }}</strong>
                         </div>
                         @endif
                  
                         @if(Session::has('error'))
                         <div class="alert alert-danger alert-block">
                           <button type="button" class="close" data-dismiss="alert">×</button>
                                 <strong>{{ Session::get('error') }}</strong>
                         </div>
                            @endif

                          
                          
                          

                        <div id="stripe_box" class="collapse" v-bind:class="{ in: coupon.type == 'stripe' }">

                  

                          {!! Form::open(['url' => '/subscribe', 'id' => 'payment-form']) !!}
                        
                          <input v-if="coupon.applied" type="hidden" name="coupon" v-model="coupon.code" >
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




    </div>
</div>


@endsection
