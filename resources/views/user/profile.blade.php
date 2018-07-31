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






                        <div class="col-md-8 m-b-5" style="margin-top:10px">




   <form  action="/profile" method="POST">
   {{ csrf_field() }}
            <ul class="list-group media-list media-list-stream">
           

                <li class="list-group-item media p-a profile_upload">
                    <label class="control-label">Profile picture</label>
                    <br />
                    <div class="upload-btn-wrapper ">
                    <div class="pull-left prof-avatar">
                       
                      
                                            
                      </div>
                                    <button class="btn pr-loading hidden"><span class="fa fa-spinner fa-spin"></span>
                                    Updating</button>

                                    <button class="btn btn-md btn-default-outline pr-image">
                                    Choose image..</button>
                                  <input type="file" id="file-avatar"  />

     
                      </div>

   
                    <br />
         
                </li>


       

                <li class="list-group-item media p-a">

                    <label class="control-label">Profile address (url)</label>
                    <div class="input-group">
                        <span class="input-group-addon">pgeon.com/</span>
                        <input type="text" class="form-control" name="slug" value="{{ $user->slug}}">
                        <br />


                    </div>
                     @include('flash::message')
                     <!--
                    <li class="list-group-item media p-a">
                                <label class="control-label">Bio</label>
                                <div class="input-group">
                                  <textarea type="text" class="form-control" name="bio" id="bio" cols="30" rows="2" placeholder="some info about you…" style="resize: none; border-radius: 4px;" maxlength="100">{{ $user->bio}}</textarea>
                                </div>
                              </li>
                           -->
                              <li class="list-group-item media p-a" style="background-color: #fefefe;">
                    <div class="input-group" style="margin-bottom: 0;">
                        <input type="submit" value="Save changes" name="submit" class="btn btn-md btn-default-outline" style="float: none">
                       
                    </div>
                </li>

  
            </ul>
            </form>
        </div>




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


