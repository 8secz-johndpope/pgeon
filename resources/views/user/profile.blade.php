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
                    <label for="basic-url">Profile image</label>
                    <div class="file-box profile_upload">
                        
                    <input type="file" id="file" class="inputfile" name="avatar">
                                      {{ csrf_field() }}
                                          
                        <label for="file">
                            <figure class="m-t-5">
                                <img class="img-circle" src="{{ Helper::avatar($user->avatar) }} " alt="">
                                <input type="submit" value="Upload" name="submit" class="btn btn-default-outline" style="margin-left: 10px">
                            </figure>
                        </label>
                    </div>
                </li>
                <li class="list-group-item media p-a">
            <label for="display-name">Display name</label>
            <div>
              <label>
                          <input type="text" class="form-control" id="display-name" maxlength="28" style="border-color:#d4dbe0">
                        </label>
                    </div>
                </li>
                <li class="list-group-item media p-a">
                    <label for="basic-url">Profile address (url)</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon3">pgeon.com/</span>
                        <input type="text" class="form-control" id="basic-url" name="slug" value="{{ $user->slug}}" aria-describedby="basic-addon3" style="border-color:#d4dbe0">
                    </div>
                    {{$error}}
                    <li class="list-group-item media p-a">
                                <label for="basic-url">Bio</label>
                                <div class="input-group">
                                  <textarea type="text" class="form-control" name="bio" id="bio" cols="30" rows="2" placeholder="some info about you…" style="resize: none; border-radius: 4px;" maxlength="100">{{ $user->bio}}</textarea>
                                </div>
                              </li>
                              <li class="list-group-item media p-a" style="background-color: #fefefe;">
                    <div class="input-group" style="margin-bottom: 0;">
                        <input type="submit" value="Save Changes" name="submit" class="btn btn-md btn-default-outline" style="float: none">
                        <a href="#" class="pull-right" style="padding-top: 6px; padding-right: 6px;margin-top: 0px;">delete account</a>
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

