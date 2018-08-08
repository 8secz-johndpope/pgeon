@extends('layouts.app-back-title',['title' => 'Membership', $back= '/'])
@section('content')



<main class="smtp">

  <div class="subscription-info mt20p ">
  <div class="m-auto mw6 subscription-info__label">

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
</div>
</div>

<div  v-if="!coupon.applied">
  <div class="subscription-info mt20p ">
    <div class="m-auto mw6 subscription-info__label">
      <span>Current Subscription </span>
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
    <div class="m-auto mw6 ">
      <a class="mb10p link pl15 pr15 update-card">Update your card details </a>
    </div>

    <div class="bgwhite dn update-card-container">
     
    <div>&nbsp;</div>
      <div class="m-auto pl15 pr15  payment-container mw6 m-auto " >


{!! Form::open(['url' => '/updatecard', 'id' => 'update-form']) !!}

<div class="pgn-textfield mb10p">
    <input class="pgn__input azure-caret" name="email" data-stripe="number" maxlength="16" type="text" id="card-number" >
    <label class="pgn__label" for="card-number">Card Number</label>
    
    <!-- <p class="pgn-textfield-errorMessage" data-error="email">Email </p> -->
  </div>



<div class="flex payment-card-info">
    <div class="pgn-textfield mb10p">
      <input class="pgn__input azure-caret" type="text" data-stripe="exp-month"   maxlength="2" autocomplete="off" id="card-month">
      <label class="pgn__label" for="card-month">MM</label>

      <!-- <p class="pgn-textfield-errorMessage" data-error="email">Email </p> -->
    </div>

    <div class="pgn-textfield mb10p">
      <input class="pgn__input azure-caret"  type="text"  data-stripe="exp-year"  maxlength="4" autocomplete="off" id="card-year">
      <label class="pgn__label" for="card-year">YYYY</label>

      <!-- <p class="pgn-textfield-errorMessage" data-error="email">Email </p> -->
    </div>

    <div class="pgn-textfield mb10p">
      <input class="pgn__input azure-caret" type="text" data-stripe="cvc" maxlength="4" autocomplete="off" id="card-cvc">
      <label class="pgn__label" for="card-cvc">CVC</label>

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
  <span data-hide="loading">Update</span>
  
</button>
<span class="payment-errors" style="color: red;margin-top:10px;"></span>

</div>



{!! Form::close() !!}

      </div>
    
    </div>
      
      </div>








  @if ($plan == "Free")
  <div class="subscription-info mt20p mb30p">
    <div class="m-auto mw6 subscription-info__label">
      <span class="mb10p">Upgrade </span>
    </div>

    <div class="bgwhite">
      <div class="m-auto mw6 payment-method-body">
        <label for="payment-method-card">
          <input type="radio" name="payment-method" id="payment-method-card" class="payment-radio-button" >
          <span class="payment-radio-icon"></span>
          <span class="payment-method-icon-svg payment-method-icon-card flex items-center">
            {{ Helper::read_svg("/img/svg/credit-card.svg") }}
          </span>
          <span>Card</span>
        </label>

      </div>
      <div class="payment-card-container payment-container dn" >
      {!! Form::open(['url' => '/subscribe', 'id' => 'payment-form']) !!}
        <div class="payment-card-details m-auto mw6 pl15 pr15">
        <div class="pgn-textfield mb10p">
        <input v-if="coupon.applied" type="hidden" name="coupon" v-model="coupon.code" >  
  {!! Form::label('plan', 'Select Plan:') !!}
                              {!! Form::select('plan', ['pgeon_monthly' => '$5.00 / Month', 'pgeon_yearly' => '$50.00 / Year'], 'Plan', [
                                 
                                  'required'                    => 'required',
                                  ]) !!}
                              </div>

            <div class="pgn-textfield mb10p">
              <input class="pgn__input azure-caret" name="email" data-stripe="number" maxlength="16" type="text" id="card-number" >
              <label class="pgn__label" for="card-number">Card Number</label>
              
              <!-- <p class="pgn-textfield-errorMessage" data-error="email">Email </p> -->
            </div>
            <div class="flex payment-card-info">
              <div class="pgn-textfield mb10p">
                <input class="pgn__input azure-caret" type="text" data-stripe="exp-month"   maxlength="2" autocomplete="off" id="card-month">
                <label class="pgn__label" for="card-month">MM</label>

                <!-- <p class="pgn-textfield-errorMessage" data-error="email">Email </p> -->
              </div>

              <div class="pgn-textfield mb10p">
                <input class="pgn__input azure-caret"  type="text"  data-stripe="exp-year"  maxlength="4" autocomplete="off" id="card-year">
                <label class="pgn__label" for="card-year">YYYY</label>

                <!-- <p class="pgn-textfield-errorMessage" data-error="email">Email </p> -->
              </div>

              <div class="pgn-textfield mb10p">
                <input class="pgn__input azure-caret" type="text" data-stripe="cvc" maxlength="4" autocomplete="off" id="card-cvc">
                <label class="pgn__label" for="card-cvc">CVC</label>

                <!-- <p class="pgn-textfield-errorMessage" data-error="email">Email </p> -->
              </div>
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
          <span class="payment-errors" style="color: red;margin-top:10px;"></span>

        </div>
            
        {!! Form::close() !!}

        
        </div>
      <div class="m-auto mw6 ">
        <div class="border-trimmed"></div>
      </div>
    </div>


    <div class="bgwhite"  v-if="!coupon.applied && !coupon.lc_confirmed">
      <div class="m-auto mw6 payment-method-body">
        <label for="payment-method-gift">
          <input type="radio" name="payment-method" id="payment-method-gift" class="payment-radio-button">
          <span class="payment-radio-icon ">
          </span>
          <span class="payment-method-icon-svg payment-method-icon-card flex items-center">
          {{ Helper::read_svg("/img/svg/gift.svg") }}
          </span>
          <span>Redeem Code</span>
        </label>
      </div>
      <div class="redeem-code-container m-auto pl15 pr15  payment-container mw6 m-auto dn" >
        <div class="pgn-textfield mb15p">
          <input class="pgn__input azure-caret" name="redeem-code" type="text" id="redeem-code" v-model="coupon.code" placeholder="ENTER CODE">
          <!-- <p class="pgn-textfield-errorMessage" data-error="email">Email </p> -->
        </div>
        <button class="base-btn payment-method-btn btn-loading flex-center redeem-code-btn" v-on:click="validateCoupon()" :disabled="coupon.loading">
            <span data-hide="loading">Apply Code</span>
          </button>
      </div>
    </div>


  </div>
  @endif


</div>

  <div class="subscription-info mt20p ">
                              <div class="form-group" v-if="coupon.error" v-cloak>
                                  <span class="alert alert-danger"> @{{coupon.error}} </span>
                              </div>    

      <div v-if="coupon.lc_confirmed" v-cloak>
                                  <span > Subscription is completed.</span>
                                  
                              </div>


<div class="m-auto mw6 subscription-info__label" v-if="coupon.applied && !coupon.lc_confirmed" v-cloak>
      <span>Coupon applied</span>
      <button v-on:click="removeAppliedCoupon()" class="btn btn-default" type="button" >Reset</button>
      <button type="button" class="btn btn-default"  v-if = "coupon.type == 'local'" v-on:click="confirmLocalCouponSubscription()" :disabled="coupon.loading">Confirm your subscription</button>
    </div>
                                    


  </div>

</main>




@endsection
