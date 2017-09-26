@extends('layouts.app')
@section('content')
<div class="container p-t-md">


    <div class="user-data">
      <div class="user-meta">
        <div class="avatar-wrapper">
          
          <img class="avatar avatar-96 photo" src="{{ Helper::avatar($user->avatar) }} " alt="" height="96" width="96">
        </div>
        <div class="vote-points">
          <span class="number"></span>points
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
          
    
     <div class="slider slider-nav" style="padding-bottom:10px">
       
                               @foreach ($most_replied as $key => $follower)
                                   <div>
                                   <li class="avatar-list-item" v-on:click="resetTopAnswers({{$follower->id}})"  data-index="{{$key}}" data-rank="{{$follower->points}}" data-name="{{$follower->name}}" data-topA="{{$follower->accepted_answers}}">
                                       <img class="img-circle" src="{{ Helper::avatar($follower->avatar) }}" />
                                   </li>
                               </div>
                               @endforeach 
                                
                                
                         
                            </div>
                            
                             <div class="user-name hidden">
                                <h3>...</h3>
                            </div>
              
                  
                  
                   <div class="user-info">
                                <div class="answers-replies-info no-height overflow-hidden">
                                    <ul class="nav nav-pills">
                                        <li>
                                            <h5><a href="#" style="color:#00b2a4;">
                                                    <a href="#" class="user-info-count" style="color:#24b4bc"></a>
                                                    top responses from
                                                    <span class="dropdown"><a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" style="color:#24c4bc"><span class="user-info-name" v-on:click="getTopAnswers()"></span></a>
                                                    </span>
</h5>
                                        </li>
                                        <button type="button" data-dismiss="alert" aria-label="Close" class="close unselectUser" style="vertical-align: middle;display: table;height:40px">
                                            <span class="unselectUser" aria-hidden="true">×</span>
                                        </button>
                                    </ul>
                                </div>
                            </div>
                            
                            
                     
    

               
                    </div>
                  </div>
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