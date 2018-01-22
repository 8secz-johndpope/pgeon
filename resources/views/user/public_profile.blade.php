@extends('layouts.app-profile')
@section('content')

  <div class="nav-contain">
            <nav class="container nav-container header-nav">
                <a href="/" id="profile_back" class="hidden" style="cursor:pointer;" ><span class="fal fa-arrow-left fa-lg"></span></a>
                 <a onclick="window.history.back()" id="g_back"  style="cursor:pointer;" ><span class="fal fa-arrow-left fa-lg"></span></a>
                <h4>{{Helper::slug($user->id ,$user->slug)}}</h4>
             
                @if ($user->id == Auth::user()->id )
                 <a href="/profile"> <span class="fal fa-edit"></span></a>
                @else
                  <button href="#" rel={{ $user->id }} role="button" aria-expanded="false" class="follow btn-lg btn-link pull-right p-a-0 {{($is_following == true)?'hidden' : ''}}">
                    <span class="fal fa-plus"></span>
                  </button>
                
                  <button href="#" rel={{ $user->id }} role="button" aria-expanded="false" class="unfollow btn-lg btn-link pull-right p-a-0 {{($is_following == true)?'' : 'hidden'}}">
                    <span class="fal fa-check"></span>
                  </button>
                @endif
                
              
            </nav>
        </div>

  <div class="user-data">
            <div class="user-meta">
                <div class="avatar-wrapper">
                    <img class="avatar avatar-96 photo" src="{{ Helper::avatar($user->avatar) }} " alt="" height="96" width="96">
                </div>
                <div class="vote-points avatar-wrapper">
                    <span class="number">{{Helper::formatWithSuffix($points)}}</span>{{ $points == 1 ? "point" : "points" }}
                </div>
            </div>
        </div>



   <div class="top-container">
          <div class="top-content-container">
              <div class="responses-to-display show-responses" style="height: 453px; overflow: scroll;">
    <ul class="media-list media-list-stream c-w-md" style="margin: 0 auto; max-width: 750px; padding: 15px;">
    
         @foreach ($replies as $key => $reply)
    
            <li class="media">
            <div class="media-body">
              <div class="h5 m-b-5">
                <a href="r/{{$reply->rslug}}"><span>{{$reply->rslug_formatted}}</span> </a>
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
