@extends('layouts.app-profile')
@section('content')

 <nav class="navbar navbar-inverse navbar-fixed-top app-navbar">
            <div class="container nav-container">
                <div class="navbar-header" style="margin-left: 0px">
                    <a onclick="window.history.back();" style="margin-top: 5px;cursor:pointer;"><span class="fal fa-arrow-left" style="font-size: 24px;margin-right: 10px"></span></a>
                    <ul class="nav navbar-nav">
                        <li style="margin-left: 10%;width:100%;margin-top: 3px">
                            <h4>
                {{$user->name}}</h4>
                        </li>
                    </ul>
                </div>
                <div class="navbar-right">
                    <ul class="nav navbar-nav m-r-0">
                        <li>
</li>
                        <li>
                            <a href="#" role="button" aria-expanded="false"> <span class="fal fa-plus"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

<div class="container p-t-md">


    <div class="user-data">
      <div class="user-meta">
        <div class="avatar-wrapper">
          
          <img class="avatar avatar-96 photo" src="{{ Helper::avatar($user->avatar) }} " alt="" height="96" width="96">
          
          
          
        </div>
        <div class="vote-points">
          <span class="number">{{$points}}</span>points
        </div>
      </div>
      <div class="user-details">
        <p class="description">{{$user->bio}}</p>
      </div>
      <div>
        <div class="panel-body" style="text-align:center">
          <div>
          
          @if ($user->role_id==3)
            <div class="most-replied-container">
          
    
     <div class="slider slider-nav" style="padding-bottom:10px">
       
                               @foreach ($most_replied as $key => $follower)
                                   <div>
                                   <li class="avatar-list-item" v-on:click="resetTopAnswers({{$follower->id}})"  data-index="{{$key}}" data-rank="{{$follower->points}}" data-name="{{$follower->name}}" data-topA="{{$follower->accepted_answers}}" data-slug="{{$follower->slug}}">
                                       <img class="img-circle" src="{{ Helper::avatar($follower->avatar) }}" />
                                       
                                       
                                   </li>
                               </div>
                               @endforeach 
                                
                                
                         
                            </div>
                            
                             <div class="user-name hidden">
                                <h3>...</h3>
                            </div>
              
                  
                  
                   <div class="user-info overflow-hidden">
                                <div class="answers-replies-info no-height overflow-hidden">
                                         <a href="#" class="user-info-count" style="color:#24b4bc" v-on:click="getTopAnswers()"></a>
                                    <span class="top-responses"> top responses from </span>
                                    <a  class="a_user-info-name"  href="" role="button" style="color:#24c4bc"><span class="user-info-name" ></span></a>
                                    
                                               
                                        <button type="button" data-dismiss="alert" aria-label="Close" class="close unselectUser" style="vertical-align: middle;display: table;height:40px">
                                            <span class="unselectUser" aria-hidden="true"  v-on:click="clearVals()">×</span>
                                        </button>
                                    
                                </div>
                                <div class="showall">
                                    <a href="#" v-on:click="showAllResponders({{$user->id}})">display all #</a>
                                </div>
                            </div>
                            
                            
                     
    

               
                    </div>
             @endif       
                  </div>
                </div>
              </div>
            </div>
  
  
  
  		
                        <div class="container p-t-md">
            <div class="row">
                <div class="col-md-8 col-md-push-2">
                    <table class="table" v-if="topResponders.length > 0">
                        <thead> 
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Responses</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr  v-for="(responder, key) in topResponders">
                                <td>@{{key + 1}}</td>
                                <td>@{{responder.name}}</td>
                                <td>
                                    <a  v-on:click="setUserAndGetTopAnswer(responder.id)" style="color:#24c4bc;cursor:pointer;">@{{responder.accepted_answers}}</a>
                                </td>
                            </tr>
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
  
  
  

<div class="container p-t-md">
            <div class="row">
                <div class="col-md-12">
                    <ul class="media-list media-list-stream c-w-md">
                        
                        <li class="media"  v-for="answer in topAnswers">
                            <div class="media-body">
                                <small class="text-muted h6"><span class="fa fa-long-arrow-left"></span><a href="#" style="margin-right: 3px"> @{{answer.creator}}</a> <span class="time-ago-align">@{{answer.created_at}}..</span></small>
                                <ul class="media-list media-list-conversation c-w-md">
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-body-text media-question">
                                            @{{answer.question}}
</div>
                                            <ul class="media-list media-list-conversation c-w-md">
                                                <li class="media media-current-user media-divider">
                                                    <div class="media-body">
                                                        <div class="media-body-text media-response media-response-margin" onclick="location.href='';" style="cursor: pointer;">
                                                            @{{answer.answer}}
</div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
              
                    </ul>
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