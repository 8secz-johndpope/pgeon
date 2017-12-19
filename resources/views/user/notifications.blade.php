@extends('layouts.app-no-top-bar')
@section('content')
<div class="container p-t-md">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group m-b-md">
                <a href="/profile" class="list-group-item"><span class="icon icon-chevron-thin-right pull-right"></span>
  Profile</a>

                <a href="/settings" class="list-group-item"><span class="icon icon-chevron-thin-right pull-right"></span>
  Security</a>
                <a href="#" class="list-group-item"><span class="icon icon-chevron-thin-right pull-right"></span>
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
                          <p>Receive notifications when:</p>

                           <ul class="list_notifications">
                               <li>
                                   <!-- Rounded switch -->
                                  <div class="notif_switch">
                                      <label class="switch">
                                        <input type="checkbox" checked>
                                        <div class="slider round"></div>
                                      </label>
                                  </div>
                                  <p>A question is posted by someone I follow</p>
                               </li>
                               <li>
                                   <!-- Rounded switch -->
                                  <div class="notif_switch">
                                      <label class="switch">
                                        <input type="checkbox">
                                        <div class="slider round"></div>
                                      </label>
                                  </div>
                                  <p>My respose gets used for a question posted question</p>
                               </li>
                           </ul>

                      </li>
                      <li class="list-group-item media p-a">
                          <p>Receive emails for:</p>

                           <ul class="list_notifications">
                               <li>
                                   <!-- Rounded switch -->
                                  <div class="notif_switch">
                                      <label class="switch">
                                        <input type="checkbox" checked>
                                        <div class="slider round"></div>
                                      </label>
                                  </div>
                                  <p>Pgeon newsletters</p>
                               </li>
                           </ul>
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
