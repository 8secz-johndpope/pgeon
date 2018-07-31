@extends('layouts.app-back-title',['title' => 'Membership', $back= '/'])
@section('content')



<main class="smtp">

<div class="subscription-info mt20p ">
  <div class="m-auto mw6 subscription-info__label">
    <span>Current Subscription</span>
  </div>
  <div class="bgwhite">
    <div class="m-auto mw6 subscription-info__body">
      <span>{{$plan}}</span>
      @if ($plan != "Free" && $stripe_id != "")
      <form  action="/unsubscribe" method="POST">
                                                   <button type="submit" class="base-btn " > <b>Cancel Subscription</b></button>
                                                    {{ csrf_field() }}
                                                </form>
      @endif
    </div>
    <div class="m-auto mw6 ">
      <div class="border-trimmed"></div>
    </div>
  </div>
  
</div>

<div class="subscription-info mt20p mb30p ">
  <!-- <div class="m-auto mw6 subscription-info__label">
    <span class="mb10p">Saved Payment Methods</span>
  </div>

  <div class="bgwhite">
    <div class="m-auto mw6 payment-method-body">
      <label for="payment-method-card">
        <span class="payment-method-icon-svg payment-method-icon-card flex items-center payment-method-visa">
          <%- include("../../public/img/visa.svg") %>
        </span>
        <span class="ovals fc mr10p">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </span>
        <span class="mr15p">1234</span>
        <span class="primary-payment-indicator">
          Primary
        </span>
      </label>
      <button class="payment-edit payment-edit-visa base-btn">Edit</button>
    </div> 
  </div> -->

 @if ($plan == "Free")
<div class="subscription-info mt20p mb30p">
  <div class="m-auto mw6 subscription-info__label">
    <span class="mb10p">Upgrade</span>
  </div>

  <div class="bgwhite">
    <div class="m-auto mw6 payment-method-body">
      <label for="payment-method-card">
        <input type="checkbox" name="payment-method" id="payment-method-card" class="payment-radio-button">
        <span class="payment-radio-icon"></span>
        <span class="payment-method-icon-svg payment-method-icon-card flex items-center">
          {{ Helper::read_svg("/img/svg/credit-card.svg") }}
        </span>
        <span>Card</span>
      </label>

    </div>
    <div class="payment-card-container payment-container">
    {!! Form::open(['url' => '/subscribe', 'id' => 'payment-form']) !!}
      <div class="payment-card-details m-auto mw6 pl15 pr15">
      <div class="pgn-textfield mb10p">
 {!! Form::label('plan', 'Select Plan:') !!}
                             {!! Form::select('plan', ['pgeon_monthly' => '$5.00 / Month', 'pgeon_yearly' => '$50.00 / Year'], 'Plan', [
                                 'class'                       => 'form-control',
                                 'required'                    => 'required',
                                 ]) !!}
                             </div>

          <div class="pgn-textfield mb10p">
            <input class="pgn__input azure-caret" name="email" data-stripe="number" maxlength="16" type="text" id="card-number">
            <label class="pgn__label" for="card-number">Card Number</label>
            
            <!-- <p class="pgn-textfield-errorMessage" data-error="email">Email </p> -->
          </div>
          <div class="flex payment-card-info">
            <div class="pgn-textfield mb10p">
              <input class="pgn__input azure-caret" name="card-month" type="text" data-stripe="exp-month" id="card-month">
              <label class="pgn__label" for="card-month">MM</label>
              <!-- <p class="pgn-textfield-errorMessage" data-error="email">Email </p> -->
            </div>

            <div class="pgn-textfield mb10p">
              <input class="pgn__input azure-caret" name="year" type="text" id="card-year" data-stripe="exp-month" >
              <label class="pgn__label" for="card-year">YYYY</label>
              <!-- <p class="pgn-textfield-errorMessage" data-error="email">Email </p> -->
            </div>

            <div class="pgn-textfield mb10p">
              <input class="pgn__input azure-caret" name="cvc" type="text" id="card-cvc" data-stripe="cvc" maxlength="4">
              <label class="pgn__label" for="card-cvc">CVC</label>
              <!-- <p class="pgn-textfield-errorMessage" data-error="email">Email </p> -->
            </div>
          </div>

          <div class="pgn-textfield mb10p">
            <input class="pgn__input azure-caret" name="email" type="email" id="name-on-card">
            <label class="pgn__label" for="name-on-card">Name On Card</label>
            <!-- <p class="pgn-textfield-errorMessage" data-error="email">Email </p> -->
          </div>
      </div>

      <div class="card-actions m-auto pl15 pr15 mw6 m-auto">
        <!-- <div class="card-checkbox">
          <label for="make-primary">
            <input type="checkbox" name="make-primary" id="make-primary" class="make-primary">
            <span class="make-primary-icon"></span>
            <span>Make Primary</span>
          </label>
        </div> -->
        <button class="base-btn payment-method-btn flex-center payment-card-btn" type="submit">
          <span data-hide="loading">Subscribe</span>
          
        </button>
      </div>
          
      {!! Form::close() !!}
      </div>
    <div class="m-auto mw6 ">
      <div class="border-trimmed"></div>
    </div>
  </div>


  <div class="bgwhite">
    <div class="m-auto mw6 payment-method-body">
      <label for="payment-method-gift">
        <input type="checkbox" name="payment-method" id="payment-method-gift" class="payment-radio-button">
        <span class="payment-radio-icon ">
        </span>
        <span class="payment-method-icon-svg payment-method-icon-card flex items-center">
        {{ Helper::read_svg("/img/svg/gift.svg") }}
        </span>
        <span>Redeem Code</span>
      </label>
    </div>
    <div class="redeem-code-container m-auto pl15 pr15  payment-container mw6 m-auto">
      <div class="pgn-textfield mb15p">
        <input class="pgn__input azure-caret" name="redeem-code" type="text" id="redeem-code">
        <label class="pgn__label" for="redeem-code">Enter Code</label>
        <!-- <p class="pgn-textfield-errorMessage" data-error="email">Email </p> -->
      </div>
      <button class="base-btn payment-method-btn btn-loading flex-center redeem-code-btn">
          <span data-hide="loading">Redeem Code</span>
          <span data-hide="non-loading">One Moment... 🕛</span>
        </button>
    </div>
  </div>
</div>
@endif

</main>


<div class="container p-t-md">
    <div class="row">





     <div class="col-md-8 m-b-5" style="margin-top:10px">
    
                    <ul class="list-group media-list media-list-stream" >
                        <li class="list-group-item media p-a" >
                            <div class="form-group" v-if="!coupon.applied">
                                <ul class="list-group">
                                    <!-- <a href="#" style="line-height:2.3"><span class="icon icon-info-with-circle" style="line-height:2.3;float: left"></span> &nbsp;Learn more about pgeon membership</a> -->
                                    <li class="list-group-item ng-binding">
                                        
                                        
                                     
                                        {{$user_type}}
                                        </li>
                                       
<!-- works only with stripe...not for local subscription -->
                                        <li class="list-group-item ng-binding">
                                         <div >
                                                
                                                </div>
                                                </li>


                                                    <li class="list-group-item ng-binding">
                                         <div >

                                         <a data-toggle="collapse" data-target="#stripe_update_box" class="btn btn-link btn-xs">Update your card</a>
                                                   
                                                   
                                                </div>
                                                </li>
                                       
                                   
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

                  

                         
                        
                          <input v-if="coupon.applied" type="hidden" name="coupon" v-model="coupon.code" >
                        
                      
                    
                   
                          
                 
                 </div>



           <div id="stripe_update_box" class="collapse">

                  

{!! Form::open(['url' => '/updatecard', 'id' => 'update-form']) !!}


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
     {!! Form::submit('Update!', ['class' => 'btn btn-lg btn-block btn-primary btn-order', 'id' => 'UpdateBtn', 'style' => 'margin-bottom: 10px;']) !!}
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
