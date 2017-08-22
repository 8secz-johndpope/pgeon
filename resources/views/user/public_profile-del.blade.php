@extends('layouts.app')
@section('content')
<div class="container p-t-md">
    <div class="row">
        <div class="panel-body text-center">
            <a href="#"><span class="icon icon-chevron-left pull-left"> Back</span></a>

            @if ($user->role_id == 3 && $user->slug)
            <span class="badge"><h6 class="panel-title">
pgeon.com/{{$user->slug}}</h6></span>
            @endif

            <div class="btn-group-sm pull-right">
                <button type="button" class="btn btn-default">
                    <span class="icon icon-add-user"></span> Follow
                </button>
                <button type="button" class="btn btn-default">
                    <i class="fa fa-share-alt"></i>
                </button>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default panel-profile m-b-md">
                <div class="panel-body text-center">
                    <a href="profile/index.html">

                        <img class="panel-profile-img" src="{{ $user->avatar ? '/uploads/avatars/'.$user->avatar:  URL::asset('img/profile-placeholder.svg')}} " alt="">
                    </a>
                    <h5 class="panel-title"><a class="text-inherit" href="profile/index.html">{{$user->name}}</a></h5>
                    <p>{{$user->bio}}</p>
                </div>
            </div>
            <div class="panel-body">
                <div class="container">
                    <h5 class="m-t-0">Most replied<small> · <a href="#userModal" class="text-inherit" data-toggle="modal"> View all</a></small></h5>
                    <ul class="avatar-list">
                        <li class="avatar-list-item">
                            <img class="img-circle" src="assets/img/24.jpg" />
                        </li>
                        <li class="avatar-list-item">
                            <img class="img-circle" src="assets/img/60.jpg" />
                        </li>
                        <li class="avatar-list-item">
                            <img class="img-circle" src="assets/img/48.jpg" />
                        </li>
                        <li class="avatar-list-item">
                            <img class="img-circle" src="assets/img/75.jpg" />
                        </li>
                        <li class="avatar-list-item">
                            <img class="img-circle" src="assets/img/91.jpg" />
                        </li>
                        <li class="avatar-list-item">
                            <img class="img-circle" src="assets/img/7.jpg" />
                        </li>
                    </ul>
                    <ul class="avatar-list">
</ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <ul class="media-list media-list-stream c-w-md">
                <li class="media p-a">
                    <div class="media-body">
                        <div class="media-heading">
                            <small class="pull-right">4 min ago...</small>
                            <h5 class="m-b-0">Davidson</h5>
                        </div>
                        <ul class="media-list media-list-conversation c-w-md">
                            <li class="media m-b-md">
                                <div class="media-body">
                                    <div class="media-body-text media-question">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>
                                    <div class="media-footer">
</div>
                                </div>
                            </li>
                        </ul>
                        <ul class="media-list media-list-conversation c-w-md">
                            <li class="media media-current-user m-b-md media-divider">
                                <div class="media-body">
                                    <div class="media-body-text media-response">
                                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>
                                    <div class="media-footer">
</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="media p-a">
                    <div class="media-body">
                        <div class="media-heading">
                            <small class="pull-right">8 min ago...</small>
                            <h5 class="m-b-0">Davidson</h5>
                        </div>
                        <ul class="media-list media-list-conversation c-w-md">
                            <li class="media m-b-md">
                                <div class="media-body">
                                    <div class="media-body-text media-question">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>
                                    <div class="media-footer">
</div>
                                </div>
                            </li>
                        </ul>
                        <ul class="media-list media-list-conversation c-w-md">
                            <li class="media media-current-user m-b-md media-divider">
                                <div class="media-body">
                                    <div class="media-body-text media-response">
                                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>
                                    <div class="media-footer">
</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>



<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModal" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4 class="modal-title">Users who reply most to Davidson</h4>
                   </div>
                   <div class="modal-body p-a-0">
                       <div class="modal-body-scroller">
                           <ul class="media-list media-list-users list-group">
                               <li class="list-group-item">
                                   <div class="media">
                                       <table class="table">
                                           <thead>
                                               <tr>
                                                   <th>Rank</th>
                                                   <th>Display name</th>
                                                   <th>Total replies</th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                               <tr>
                                                   <td>1</td>
                                                   <td>
                                                       <a href="#">Mark</a>
                                                   </td>
                                                   <td>32</td>
                                               </tr>
                                               <tr>
                                                   <td>2</td>
                                                   <td>
                                                       <a href="#">Jacob</a>
                                                   </td>
                                                   <td>27</td>
                                               </tr>
                                               <tr>
                                                   <td>3</td>
                                                   <td>
                                                       <a href="#">Larry</a>
                                                   </td>
                                                   <td>20</td>
                                               </tr>
                                               <tr>
                                                   <td>4</td>
                                                   <td>
                                                       <a href="#">Larry</a>
                                                   </td>
                                                   <td>15</td>
                                               </tr>
                                               <tr>
                                                   <td>5</td>
                                                   <td>
                                                       <a href="#">Larry</a>
                                                   </td>
                                                   <td>14</td>
                                               </tr>
                                               <tr>
                                                   <td>6</td>
                                                   <td>
                                                       <a href="#">Larry</a>
                                                   </td>
                                                   <td>13</td>
                                               </tr>
                                               <tr>
                                                   <td>7</td>
                                                   <td>
                                                       <a href="#">Larry</a>
                                                   </td>
                                                   <td>10</td>
                                               </tr>
                                               <tr>
                                                   <td>8</td>
                                                   <td>
                                                       <a href="#">Larry</a>
                                                   </td>
                                                   <td>8</td>
                                               </tr>
                                               <tr>
                                                   <td>9</td>
                                                   <td>
                                                       <a href="#">Larry</a>
                                                   </td>
                                                   <td>5</td>
                                               </tr>
                                               <tr>
                                                   <td>10</td>
                                                   <td>
                                                       <a href="#">Larry</a>
                                                   </td>
                                                   <td>5</td>
                                               </tr>
                                           </tbody>
                                       </table>
                                   </div>
                               </li>
                           </ul>
                       </div>
                   </div>
                   <div class="modal-footer p-a-0">
                       <ul class="pagination pagination-sm">
                           <li class="disabled">
                               <a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
                           </li>
                           <li class="active">
                               <a href="#">1</a>
                           </li>
                           <li>
                               <a href="#">2</a>
                           </li>
                           <li>
                               <a href="#">3</a>
                           </li>
                           <li>
                               <a href="#">4</a>
                           </li>
                           <li>
                               <a href="#">5</a>
                           </li>
                           <li>
                               <a href="#">6</a>
                           </li>
                           <li>
                               <a href="#">7</a>
                           </li>
                           <li>
                               <a href="#">8</a>
                           </li>
                           <li>
                               <a href="#">9</a>
                           </li>
                           <li>
                               <a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
                           </li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>




       <div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="msgModal" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <button type="button" class="btn btn-sm btn-primary pull-right app-new-msg js-newMsg">New message</button>
                      <h4 class="modal-title">Messages</h4>
                  </div>
                  <div class="modal-body p-a-0 js-modalBody">
                      <div class="modal-body-scroller">
                          <div class="media-list media-list-users list-group js-msgGroup">
                              <a href="#" class="list-group-item">
                                  <div class="media">
                                      <span class="media-left"><img class="img-circle media-object" src="assets/img/avatar-fat.jpg"></span>
                                      <div class="media-body">
                                          <strong>Jacob Thornton</strong> and
                                          <strong>1 other</strong>
                                          <div class="media-body-secondary">
                                              Aenean eu leo quam. Pellentesque ornare sem lacinia quam &hellip;
</div>
                                      </div>
                                  </div>
                              </a>
                              <a href="#" class="list-group-item">
                                  <div class="media">
                                      <span class="media-left"><img class="img-circle media-object" src="assets/img/avatar-mdo.png"></span>
                                      <div class="media-body">
                                          <strong>Mark Otto</strong> and
                                          <strong>3 others</strong>
                                          <div class="media-body-secondary">
                                              Brunch sustainable placeat vegan bicycle rights yeah…
</div>
                                      </div>
                                  </div>
                              </a>
                              <a href="#" class="list-group-item">
                                  <div class="media">
                                      <span class="media-left"><img class="img-circle media-object" src="assets/img/avatar-dhg.png"></span>
                                      <div class="media-body">
                                          <strong>Dave Gamache</strong>
                                          <div class="media-body-secondary">
                                              Brunch sustainable placeat vegan bicycle rights yeah…
</div>
                                      </div>
                                  </div>
                              </a>
                              <a href="#" class="list-group-item">
                                  <div class="media">
                                      <span class="media-left"><img class="img-circle media-object" src="assets/img/avatar-fat.jpg"></span>
                                      <div class="media-body">
                                          <strong>Jacob Thornton</strong> and
                                          <strong>1 other</strong>
                                          <div class="media-body-secondary">
                                              Aenean eu leo quam. Pellentesque ornare sem lacinia quam &hellip;
</div>
                                      </div>
                                  </div>
                              </a>
                              <a href="#" class="list-group-item">
                                  <div class="media">
                                      <span class="media-left"><img class="img-circle media-object" src="assets/img/avatar-mdo.png"></span>
                                      <div class="media-body">
                                          <strong>Mark Otto</strong> and
                                          <strong>3 others</strong>
                                          <div class="media-body-secondary">
                                              Brunch sustainable placeat vegan bicycle rights yeah…
</div>
                                      </div>
                                  </div>
                              </a>
                              <a href="#" class="list-group-item">
                                  <div class="media">
                                      <span class="media-left"><img class="img-circle media-object" src="assets/img/avatar-dhg.png"></span>
                                      <div class="media-body">
                                          <strong>Dave Gamache</strong>
                                          <div class="media-body-secondary">
                                              Brunch sustainable placeat vegan bicycle rights yeah…
</div>
                                      </div>
                                  </div>
                              </a>
                              <a href="#" class="list-group-item">
                                  <div class="media">
                                      <span class="media-left"><img class="img-circle media-object" src="assets/img/avatar-fat.jpg"></span>
                                      <div class="media-body">
                                          <strong>Jacob Thornton</strong> and
                                          <strong>1 other</strong>
                                          <div class="media-body-secondary">
                                              Aenean eu leo quam. Pellentesque ornare sem lacinia quam &hellip;
</div>
                                      </div>
                                  </div>
                              </a>
                              <a href="#" class="list-group-item">
                                  <div class="media">
                                      <span class="media-left"><img class="img-circle media-object" src="assets/img/avatar-mdo.png"></span>
                                      <div class="media-body">
                                          <strong>Mark Otto</strong> and
                                          <strong>3 others</strong>
                                          <div class="media-body-secondary">
                                              Brunch sustainable placeat vegan bicycle rights yeah…
</div>
                                      </div>
                                  </div>
                              </a>
                              <a href="#" class="list-group-item">
                                  <div class="media">
                                      <span class="media-left"><img class="img-circle media-object" src="assets/img/avatar-dhg.png"></span>
                                      <div class="media-body">
                                          <strong>Dave Gamache</strong>
                                          <div class="media-body-secondary">
                                              Brunch sustainable placeat vegan bicycle rights yeah…
</div>
                                      </div>
                                  </div>
                              </a>
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
@endsection
