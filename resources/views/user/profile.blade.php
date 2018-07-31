@extends('layouts.app-back-title',['title' => 'My Account', $back= '/', $save_id='save-account'])
@section('content')




 <main class="my-account">
 @if (!empty($message))
			<div class="alert alert-{{$class}}">
                                            {{$message}}
                                        </div> 
      @endif	
      
    <ul class="ul-ls ">
     
        <li>
          <a href="/change-name" class="mw6 m-auto pl15 pr15"          
           >
            <span>Change Name</span>

            {{Helper::read_svg("img/svg/chevron-right.svg") }}
          </a>
          <span  class="m-auto mw6 db">
            <div class="border-trimmed"></div>
          </span>
        </li>

        @if (!Auth::user()->provider)
            <li>
            <a href="/change-email" class="mw6 m-auto pl15 pr15"          
            >
                <span>Change Email</span>

                {{Helper::read_svg("img/svg/chevron-right.svg") }}
            </a>
            <span  class="m-auto mw6 db">
                <div class="border-trimmed"></div>
            </span>
            </li>
      
        <li>
          <a href="/change-password" class="mw6 m-auto pl15 pr15"          
           >
            <span>Change Password</span>

            {{Helper::read_svg("img/svg/chevron-right.svg") }}
          </a>
          <span  class="m-auto mw6 db">
            <div class="border-trimmed"></div>
          </span>
        </li>
        @endif   
        <li>
          <a href="/change-accounts" class="mw6 m-auto pl15 pr15 no-bb">
            <span>Connected Accounts</span>

            {{Helper::read_svg("img/svg/chevron-right.svg") }}
          </a>
          <span  class="m-auto mw6 db">
            <div class="border-trimmed"></div>
          </span>
        </li>


        <li class="ul-ls--last">




          <a href="/" class="delete-account mw6 m-auto pl15 pr15">
            <span class="redish1">Delete Account</span>
          </a>
          <span  class="m-auto mw6 db">
            <div class="border-trimmed"></div>
          </span>
        </li>
    </ul>
  </main>









<div class="delete-account-modal">
  <div class="delete-account-modal-overlay standard-overlay"></div>
  <div class="center-modal mw6 m-auto">
    <div class="delete-account-modal__modal">
      <h2 class="modal-header">
        Delete Account
      </h2>
      <p class="modal-content">
        <strong>{{ $user->slug}},</strong> are you sure you want to delete your Pgeon account? This will delete all published content, top response rankings, and any/all points acquired. This Action cannot be undone
      </p>
      <div class="dn password-error">
                            Password did not match
                            </div>

      @if (!Auth::user()->provider)
        <div class="pgn-textfield mb15p password_showable">
            <input class="pgn__input azure-caret" type="password" name="password" id="acc-passwd" >
            <label class="pgn__label" for="login_password" >Password</label>
            <span class="input__rightbtn dn" id="show_password">
            Show
            </span>
        </div>
      @endif

      <div class="delete-account-btns">

         @if (!Auth::user()->provider)
                        <button type="button" id="delete-acc" data-id={{ $user->id}} class="base-btn confirm-deletion">
                           Confirm deletion
                        </button>
        @else 
                        <button type="button" id="delete-sso" data-id={{ $user->id}} class="base-btn confirm-deletion">
                            Confirm deletion
                        </button>
        @endif 
        <button class="base-btn keep-account">Keep Account</button>
       
      </div>

    </div>
  </div>
</div>
 
        

        <div class="col-md-3">
</div>
    </div>
</div>
@endsection

<!-- Push a style dynamically from a view -->
@push('styles')
<link rel='stylesheet prefetch' href='https://use.fontawesome.com/releases/v5.0.6/js/all.js'>

@endpush

<!-- Push a script dynamically from a view -->
@push('scripts')    
  <script src="{{ asset('js/jquery.html5uploader.min.js') }}"></script>

@endpush
