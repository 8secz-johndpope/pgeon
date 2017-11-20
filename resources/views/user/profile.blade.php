@extends('layouts.app')
@section('content')
<div class="container p-t-md">
    <div class="row">

     @component('user.menu',['current_menu' => 'profile'])
		@endcomponent





  <div class="col-md-8" style="margin-top:10px">
   <form enctype="multipart/form-data" action="/profile" method="POST">
            <ul class="list-group media-list media-list-stream">
                <li class="list-group-item media p-a">
                    <label class="control-label">Profile picture</label>
                    <div class="file-box profile_upload">

                    <input type="file" id="file" class="inputfile" name="avatar">
                                      {{ csrf_field() }}

                        <label for="file">
                            <figure class="m-t-5">
                                <img class="img-circle" src="{{ Helper::avatar($user->avatar) }}" alt="">
                                <input type="submit" value="Upload" name="submit" class="btn btn-default-outline" style="margin-left: 10px">
                            </figure>
                        </label>
                    </div>
                </li>
                <!-- <li class="list-group-item media p-a">
            <label class="control-label">Display name</label>
            <div class="input-group">
              <span class="input-group-addon">
                <input type="radio" aria-label="...">
              </span>
              <input type="text" class="form-control" maxlength="28" aria-label="...">
            </div> -->
            <!-- twitter input start -->
            <!-- <div class="input-group">
              <span class="input-group-addon">
                <input type="radio" aria-label="...">
              </span>
              <span class="input-group-addon" style="border-left: none; padding-left: 0;" id="sizing-addon1"><img style="height: 16px" src="{{ asset('img/twitter-muted.svg') }}" /></span>
              <input class="form-control" style="background-color: transparent; border-left: none; margin-left: none;" id="disabledInput" type="text" placeholder="@twitter_name" disabled="">
            </div> -->
            <!-- facebook input start -->
            <!-- <div class="input-group">
              <span class="input-group-addon">
                <input type="radio" aria-label="...">
              </span>
              <span class="input-group-addon" style="border-left: none; padding-left: 0;" id="sizing-addon1"><img style="height: 16px" src="{{ asset('img/facebook-muted.svg') }}" /></span>
              <input class="form-control" style="background-color: transparent; border-left: none; margin-left: none;" id="disabledInput" type="text" placeholder="@facebook_name" disabled="">
            </div> -->
                </li>
                <li class="list-group-item media p-a">
                    <label class="control-label">Profile address (url)</label>
                    <div class="input-group">
                        <span class="input-group-addon">pgeon.com/</span>
                        <input type="text" class="form-control" name="slug" value="{{ $user->slug}}">
                    </div>
                    {{$error}}
                    <li class="list-group-item media p-a">
                                <label class="control-label">Bio</label>
                                <div class="input-group">
                                  <textarea type="text" class="form-control" name="bio" id="bio" cols="30" rows="2" placeholder="some info about you…" style="resize: none; border-radius: 4px;" maxlength="100">{{ $user->bio}}</textarea>
                                </div>
                              </li>
                              <li class="list-group-item media p-a" style="background-color: #fefefe;">
                    <div class="input-group" style="margin-bottom: 0;">
                        <input type="submit" value="Save changes" name="submit" class="btn btn-md btn-default-outline" style="float: none">
                        <a href="#" class="m-t-10 small pull-right text-muted" data-toggle="modal" data-target="#deleteA"><span class="fal fa-frown"></span> delete account</a>
                    </div>
                </li>
            </ul>
            </form>
        </div>

        <div class="modal" id="deleteA">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title pull-left">Delete account</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <p class="m-a-0">{{ $user->slug}}, are you sure you want to delete your Pgeon account?</p>
                            <p>This will delete all published content, top response rankings, and any/all points acquired. This action cannot be undone.</p>
                            <input type="password" class="form-control p-a" placeholder="Provide account password">
                        </div>
                    <div class="modal-actions">
                        <button type="button" class="btn-link modal-action confirm" data-dismiss="modal">
                            <strong class="text-danger">Confirm deletion</strong>
                        </button>
                        <button type="button" class="btn-link modal-action cancel" data-dismiss="modal" style="color:#C9CCD4">Keep account</button>
                    </div>
                </div>
            </div>
        </div>





        <div class="col-md-3">
</div>
    </div>
</div>
@endsection
