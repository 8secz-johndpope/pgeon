@extends('layouts.app')
@section('content')
<div class="container p-t-md">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group m-b-md">
                <a href="/profile" class="list-group-item"><span class="icon icon-chevron-thin-right pull-right"></span>
  Profile</a>

                <a href="#" class="list-group-item"><span class="icon icon-chevron-thin-right pull-right"></span>
  Security</a>
                <a href="/membership" class="list-group-item"><span class="icon icon-chevron-thin-right pull-right"></span>
  Membership</a>
                <a href="/notifications" class="list-group-item"><span class="icon icon-chevron-thin-right pull-right"></span>
  Notifications</a>
            </div>
        </div>
        <div class="col-md-9">




             <form  action="/profile" method="POST">
                            <ul class="list-group media-list media-list-stream">
                                <li class="list-group-item p-a">
                                    <h3 class="m-a-0">Profile</h3>
                                </li>
                                <li class="list-group-item media p-a">
                                    <div class="input-group">
                                        <label for="dname">Email</label>
                                        <p>{{$user->email}}  <a href="#">(change)</a></p>
                                    </div>

                                    <div class="input-group">
                                        <label for="bio">Password</label>
                                        <a href="password/reset" class="btn btn-primary-outline btn-sm">Reset your password</a>
                                    </div>
                                </li>
                            </ul>
                              {{ csrf_field() }}
                      </form>



                     </form>
               </div>
        <div class="col-md-3">
</div>
    </div>
</div>
@endsection
