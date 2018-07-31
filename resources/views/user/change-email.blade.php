@extends('layouts.app-back-title',['title' => 'My Account', 'save' => true, $back= null, $save_id='save-email'])
@section('content')


<main class="landing-main mw6 m-auto">
<form   id="frmChangeEmail" method="POST">
        <div class="setting-input">
        <label for="" class="setting-input__label">Change Your Email Address</label>
        <input id="nw_email"  type="text" class="setting-input__input" value="{{ $user->email}}">
        <input  id="old_email" type="hidden" class="setting-input__input" value="{{ $user->email}}">
        <span  class="m-auto mw6 db">
            <div class="border-trimmed"></div>
        </span>
        </div>

<div class="alert alert-danger">
									
									</div>
        <div class="setting-input"></div>
     
</form>

</main>



@endsection

<!-- Push a script dynamically from a view -->
@push('scripts')    
<script src="{{ asset('js/jquery.html5uploader.min.js') }}"></script>
<script src="{{ asset('js/settings.js') }}"></script>

@endpush
