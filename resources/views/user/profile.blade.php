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
                    <label for="basic-url">Profile picture</label>
                    <div class="file-box profile_upload">
                        
                    <input type="file" id="file" class="inputfile" name="avatar">
                                      {{ csrf_field() }}
                                          
                        <label for="file">
                            <figure>
                                <img class="media-object img-circle" src="{{ Helper::avatar($user->avatar) }} " alt="">
                            </figure>
                            <a href="#">
                                <div style="padding-top:10px">
                                    <input type="submit" value="Change" name="submit" class="btn btn-sm btn-default-outline" style="margin-left: 3px">
                                </div>
                            </a>
                        </label>
                    </div>
                </li>
                <li class="list-group-item media p-a">
                    <label for="basic-url">Awarded badges display</label>
                    <div class="file-box profile_upload">
                        <input name="file" id="file" class="inputfile" data-multiple-caption="{count} files selected" multiple="" type="file">
                        <label for="file">
                            <figure></figure>
                            <span class="text-muted">you have not acquired any badges..</span>
                        </label>
                    </div>
                </li>
                <li class="list-group-item media p-a">
                    <label for="basic-url">Display name</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon3">pgeon.com/</span>
                        <input type="text" class="form-control" id="basic-url" name="slug" value="{{ $user->slug}}" aria-describedby="basic-addon3" style="border-color:#d4dbe0">
                    </div>
                    {{$error}}
                    <br />
                    <label for="basic-url">Bio</label>
                    <div class="input-group">
                        <textarea type="text" class="form-control" name="bio" id="bio" cols="30" rows="2" placeholder="some info about you…" style="resize: none;" maxlength="100">{{ $user->bio}}</textarea>
                    </div>
                    <div class="input-group" style="padding-top:10px;margin-bottom:0">
                        <input type="submit" value="Save Changes" name="submit" class="btn btn-sm btn-default-outline" style="float: none">
                        <a href="#" class="pull-right text-danger" style="padding-top: 6px; padding-right: 6px;margin-top: 0px;"> <span class="icon icon-squared-cross"></span> delete account</a>
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

