@extends('layouts.app')
@section('content')
<div class="container p-t-md">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group m-b-md">
                <a href="#" class="list-group-item"><span class="icon icon-chevron-thin-right pull-right"></span>
  Profile</a>

                <a href="/settings" class="list-group-item"><span class="icon icon-chevron-thin-right pull-right"></span>
  Security</a>
                <a href="/membership" class="list-group-item"><span class="icon icon-chevron-thin-right pull-right"></span>
  Membership</a>
                <a href="/notifications" class="list-group-item"><span class="icon icon-chevron-thin-right pull-right"></span>
  Notifications</a>
            </div>
        </div>
        <div class="col-md-9">



           <form enctype="multipart/form-data" action="/profile" method="POST">
                       <ul class="list-group media-list media-list-stream">
                           <li class="list-group-item p-a">
                               <h3 class="m-a-0">Profile</h3>
                           </li>
                           <li class="list-group-item media p-a">
                               <label for="basic-url">Profile picture</label>
                               <div class="file-box profile_upload">
                                      <input type="file" id="file" class="inputfile" name="avatar">
                                      {{ csrf_field() }}

                                   <label for="file">
                                       <figure>
                                           <img class="media-object img-circle" src="{{ $user->avatar ? '/uploads/avatars/'.$user->avatar:  URL::asset('img/profile-placeholder.svg')}} " alt="">
                                       </figure>
                                       <span>Change</span>
                                   </label>
                               </div>
                           </li>
                           <li class="list-group-item media p-a">
                               <label for="basic-url">Display name</label>
                               <div class="input-group">
                                   <span class="input-group-addon" id="basic-addon3">pgeon.com/</span>
                                   @if ($user->role_id == 3)
                                      <input type="text" class="form-control" id="basic-url" name="slug" value="{{ $user->slug}}">
                                   @else
                                      &nbsp; You need to be a member to avail this facility.
                                   @endif


                               </div>
                               {{$error}}
                               <br />
                               <label for="basic-url">BIO</label>
                               <div class="input-group">
                                   <textarea class="form-control" name="bio" id="bio" cols="30" rows="5" placeholder="Some info about you…">{{ $user->bio}}</textarea>
                               </div>
                               <div class="input-group">
                                   <input type="submit" value="Save Changes" name="submit" class="btn btn-primary-outline btn-sm">
                                   <a href="#">Delete Account</a>
                               </div>
                           </li>
                       </ul>
                     </form>
               </div>
        <div class="col-md-3">
</div>
    </div>
</div>
@endsection
