@extends('layouts.app')
@section('content')
<div class="container p-t-md">


    <div class="user-data">
      <div class="user-meta">
        <div class="avatar-wrapper">
          
          <img class="avatar avatar-96 photo" src="{{ Helper::avatar($user->avatar) }} " alt="" height="96" width="96">
        </div>
        <div class="vote-points">
          <span class="number">{{$user->points() }}</span>points
        </div>
      </div>
      <div class="user-details">
        <h3 class="profile-header-user"> <span class="icon-uncertified"></span> {{$user->name}}</h3>
        <p class="description">{{$user->bio}}</p>
      </div>
      <div>
        <div class="panel-body" style="text-align:center">
          <div>
            <div class="most-replied-container">
          
    
     <div class="slider slider-nav" style="padding-bottom:15px">
       
                               @foreach ($most_replied as $follower)
                                   <div>
                                   <li class="avatar-list-item">
                                       <img class="img-circle" src="{{ Helper::avatar($follower->avatar) }}" />
                                   </li>
                               </div>
                               @endforeach 
                                
                                
                         
                            </div>
              
                            <div class="slider slider-for">
                               @foreach ($most_replied as $follower)
                                <div>
                                    <a data-toggle="modal" href="#msgModal" style="color:#3a8bbb">{{ $follower->name }}</a>
                                </div>
                                @endforeach 
                               
                            </div>
    
    
              
                    </div>
                  </div>
                </div>
              </div>
            </div>
  
  
  
  
  





             <div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="msgModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><ul class="nav nav-pills" role="tablist">
                                <li class="active">
                                    <a href="#">replies <span class="badge">42</span></a>
                                </li>
                                <li>
                                    <a href="#">answers <span class="badge">3</span></a>
                                </li>
                            </ul></h4>
                    </div>
                    <div class="modal-body p-a-0 js-modalBody">
                        <div class="modal-body-scroller">
                            <div class="media-list media-list-users list-group">
                                <li class="list-group-item media p-a">
                                    <div class="media-body">
                                        <div class="media-header">
                                            <small class="text-muted"><a href="#" id="user-profile-text-link">Display-name</a><span class="pull-right"> 20 min ago</span></small>
                                        </div>
                                        <ul class="media-list media-list-conversation c-w-md">
                                            <li class="media m-b-md">
                                                <div class="media-body">
                                                    <div class="media-body-text media-question">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>
                                                    <ul class="media-list media-list-conversation c-w-md">
                                                        <li class="media media-current-user m-b-md media-divider">
                                                            <div class="media-body">
                                                                <div class="media-body-text media-response media-response-margin" onclick="location.href='';" style="cursor: pointer;">
                                                                    estas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-group-item media p-a">
                                    <div class="media-body">
                                        <div class="media-header">
                                            <small class="text-muted"><a href="#" id="user-profile-text-link">Display-name</a><span class="pull-right"> 20 min ago</span></small>
                                        </div>
                                        <ul class="media-list media-list-conversation c-w-md">
                                            <li class="media m-b-md">
                                                <div class="media-body">
                                                    <div class="media-body-text media-question">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>
                                                    <ul class="media-list media-list-conversation c-w-md">
                                                        <li class="media media-current-user m-b-md media-divider">
                                                            <div class="media-body">
                                                                <div class="media-body-text media-response media-response-margin" onclick="location.href='';" style="cursor: pointer;">
                                                                    estas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-group-item media p-a">
                                    <div class="media-body">
                                        <div class="media-header">
                                            <small class="text-muted"><a href="#" id="user-profile-text-link">Display-name</a><span class="pull-right"> 20 min ago</span></small>
                                        </div>
                                        <ul class="media-list media-list-conversation c-w-md">
                                            <li class="media m-b-md">
                                                <div class="media-body">
                                                    <div class="media-body-text media-question">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>
                                                    <ul class="media-list media-list-conversation c-w-md">
                                                        <li class="media media-current-user m-b-md media-divider">
                                                            <div class="media-body">
                                                                <div class="media-body-text media-response media-response-margin" onclick="location.href='';" style="cursor: pointer;">
                                                                    estas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-group-item media p-a">
                                    <div class="media-body">
                                        <div class="media-header">
                                            <small class="text-muted"><a href="#" id="user-profile-text-link">Display-name</a><span class="pull-right"> 20 min ago</span></small>
                                        </div>
                                        <ul class="media-list media-list-conversation c-w-md">
                                            <li class="media m-b-md">
                                                <div class="media-body">
                                                    <div class="media-body-text media-question">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>
                                                    <ul class="media-list media-list-conversation c-w-md">
                                                        <li class="media media-current-user m-b-md media-divider">
                                                            <div class="media-body">
                                                                <div class="media-body-text media-response media-response-margin" onclick="location.href='';" style="cursor: pointer;">
                                                                    estas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </div>
                            <div class="hide m-a js-conversation">
                                <ul class="media-list media-list-conversation">
                                    <li class="media media-current-user m-b-md">
                                        <div class="media-body">
                                            <div class="media-body-text">
                                                Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Sed posuere consectetur est at lobortis.
</div>
                                            <div class="media-footer">
                                                <small class="text-muted"><a href="#">Dave Gamache</a> at 4:20PM</small>
                                            </div>
                                        </div>
                                        <a class="media-right" href="#">
                                            <img class="img-circle media-object" src="assets/img/avatar-dhg.png">
                                        </a>
                                    </li>
                                    <li class="media m-b-md">
                                        <a class="media-left" href="#">
                                            <img class="img-circle media-object" src="assets/img/avatar-fat.jpg">
                                        </a>
                                        <div class="media-body">
                                            <div class="media-body-text">
                                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>
                                            <div class="media-body-text">
                                                Vestibulum id ligula porta felis euismod semper. Aenean lacinia bibendum nulla sed consectetur. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
</div>
                                            <div class="media-body-text">
                                                Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus.
</div>
                                            <div class="media-footer">
                                                <small class="text-muted"><a href="#">Fat</a> at 4:28PM</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media m-b-md">
                                        <a class="media-left" href="#">
                                            <img class="img-circle media-object" src="assets/img/avatar-mdo.png">
                                        </a>
                                        <div class="media-body">
                                            <div class="media-body-text">
                                                Etiam porta sem malesuada magna mollis euismod. Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean lacinia bibendum nulla sed consectetur.
</div>
                                            <div class="media-body-text">
                                                Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
</div>
                                            <div class="media-footer">
                                                <small class="text-muted"><a href="#">Mark Otto</a> at 4:20PM</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media media-current-user m-b-md">
                                        <div class="media-body">
                                            <div class="media-body-text">
                                                Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Sed posuere consectetur est at lobortis.
</div>
                                            <div class="media-footer">
                                                <small class="text-muted"><a href="#">Dave Gamache</a> at 4:20PM</small>
                                            </div>
                                        </div>
                                        <a class="media-right" href="#">
                                            <img class="img-circle media-object" src="assets/img/avatar-dhg.png">
                                        </a>
                                    </li>
                                    <li class="media m-b-md">
                                        <a class="media-left" href="#">
                                            <img class="img-circle media-object" src="assets/img/avatar-fat.jpg">
                                        </a>
                                        <div class="media-body">
                                            <div class="media-body-text">
                                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>
                                            <div class="media-body-text">
                                                Vestibulum id ligula porta felis euismod semper. Aenean lacinia bibendum nulla sed consectetur. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
</div>
                                            <div class="media-body-text">
                                                Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus.
</div>
                                            <div class="media-footer">
                                                <small class="text-muted"><a href="#">Fat</a> at 4:28PM</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media m-b">
                                        <a class="media-left" href="#">
                                            <img class="img-circle media-object" src="assets/img/avatar-mdo.png">
                                        </a>
                                        <div class="media-body">
                                            <div class="media-body-text">
                                                Etiam porta sem malesuada magna mollis euismod. Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean lacinia bibendum nulla sed consectetur.
</div>
                                            <div class="media-body-text">
                                                Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
</div>
                                            <div class="media-footer">
                                                <small class="text-muted"><a href="#">Mark Otto</a> at 4:20PM</small>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

<!-- Push a style dynamically from a view -->
@push('after-core-styles')
     
 <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/gh/kenwheeler/slick@1.7.1/slick/slick.css" />
 <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/gh/kenwheeler/slick@1.7.1/slick/slick-theme.css" />

@endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
    <script type="text/javascript" src="http://cdn.jsdelivr.net/gh/kenwheeler/slick@1.7.1/slick/slick.min.js"></script>
    <script src="{{ asset('js/profile.js') }}"></script>
@endpush