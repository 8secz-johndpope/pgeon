@extends('layouts.app-back-title',['title' => 'Change Password', 'save' => true, $back= 'my-account', $save_id='save-account'])
@section('content')


<main class="landing-main mw6 m-auto">
@if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif

                                 @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif

                                @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

<form class="form-horizontal"  id="frm-account" method="POST" action="/cpwd">
                        {{ csrf_field() }}
 
<div class="setting-input">
  <label for="" class="setting-input__label">Old Password</label>
  <input type="text" class="setting-input__input" name="current-password" required>
  <span  class="m-auto mw6 db">
    <div class="border-trimmed"></div>
  </span>
</div>

<div class="setting-input">
  <label for="" class="setting-input__label">New Password</label>
  <input type="text" class="setting-input__input" name="new-password" required>
  <span  class="m-auto mw6 db">
    <div class="border-trimmed"></div>
  </span>
</div>

<div class="setting-input">
  <label for="" class="setting-input__label">Confirm Password</label>
  <input type="text" class="setting-input__input" name="new-password_confirmation" required>
  <span  class="m-auto mw6 db">
    <div class="border-trimmed"></div>
  </span>
</div>

</form>
</main>





@endsection





