@extends('layouts.app-no-logo')
@section('content')


       <div class="container-fluid container-fill-height">
            <div class="container-content-middle">
                 <form enctype="multipart/form-data" action="/profile" method="POST" class="m-x-auto text-center app-login-form">
                   {{ csrf_field() }}
                    <a href="/" class="app-brand m-b-md" style="width:55px">
                        <img src="{{URL::asset('img/pgeon-logo-mobile.svg')}}" alt="brand">
                    </a>
                    <div class="continue_with">
                        <ul>
                            <li>
                                <h3>🎈 &nbsp;Success!&nbsp; 🎉</h3>
                            </li>
                        </ul>
                    </div>
                    <hr>
                    <p style="text-align: left;margin-left: 5px">Now choose your display name</p>
                    <input class="form-control" placeholder="Display name" name="slug" value="{{ old('slug') }}">
                    <br />
                      @include('flash::message')
                    
                    <div class="m-b" style="margin-top: 10px;float: right">
                        <a href="{{$skip_url}}" class="text-muted" style="padding-right: 10px">Skip this step</a>
                        <input type="hidden" name="step2" value="1" />
                         <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

<div class="container p-t-md">
	<div class="row">



		  
            <ul class="list-group media-list media-list-stream">
                <li class="list-group-item media p-a">
                    <label class="control-label">Profile picture</label>
                    <div class="file-box profile_upload">

                    <input type="file" id="file" class="inputfile" name="avatar">
                                    

                    </div>
                </li>
       
                
                <li class="list-group-item media p-a">
              
                  
                    
                  
                  
            </ul>
            </form>
            
            


	






	</div>
</div>
@endsection
