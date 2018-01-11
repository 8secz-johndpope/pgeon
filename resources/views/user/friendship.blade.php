@extends('layouts.app-profile-no-top-bar')
@section('content')

        
           <nav class="navbar navbar-inverse navbar-fixed-top">
            <nav class="container nav-container header-nav">
                 @if (Auth::guest())
                 <a href="/" id="g_back"  style="cursor:pointer;" ><span class="fal fa-home fa-lg"></span></a>
                 @else
                 <a href="/" id="g_back"  style="cursor:pointer;" ><span class="fal fa-arrow-left fa-lg"></span></a> 
                 @endif
                <h4><a href="#">
                        <img class="img-circle header-img" src="{{ Helper::avatar($tuser->avatar) }}">
                    </a>
                    <a href="#">
                            <img class="img-circle header-img" src="{{ Helper::avatar($fuser->avatar) }}">
                        </a>
                        
               
                        
                        </h4>
          
            </nav>
        </nav>


   <div class="m-b-0" style="width: auto;">
      		<div class="container">
      			<ul class="media-list media-list-stream c-w-md" style="margin: 0px auto; max-width: 750px; padding: 15px;">
      			
      		  @foreach ($replies as $key => $reply)
    
            <li class="media">
            <div class="media-body">
              <div class="h5 m-b-5">
                <a><span>{{$rslug_formatted}}</span> </a>
                <span class="text-muted time-align">{{$reply->ago}}</span>
              </div>
              <ul class="media-list media-list-conversation c-w-md">
                <li class="media">
                  <div class="media-body">
                    <div class="media-body-text media-question">{{$reply->question}}</div>
                    <ul class="media-list media-list-conversation c-w-md">
                      <li class="media media-current-user media-divider">
                        <div class="media-body">
                          <div class="media-body-text media-response media-response-margin" >
                            {{$reply->answer}}
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
            </li>
@endforeach
      				
      				
      			</ul>
      		</div>
      	</div>








@endsection

<!-- Push a style dynamically from a view -->
@push('after-core-styles')


@endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
    <script src="{{ asset('js/profile.js') }}"></script>
    <script src="{{ asset('js/search.js') }}"></script>
@endpush
