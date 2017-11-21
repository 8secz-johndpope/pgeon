@extends('layouts.app-profile-no-top-bar')
@section('content')

  <div class="nav-contain">
            <nav class="container nav-container header-nav">
                <a href="/" style="cursor:pointer;" class="nav_back"><span class="fal fa-arrow-left fa-lg"></span></a>
                <h4>{{$user->name}}</h4>
                @if ($is_following == false)
                <button href="#" rel={{ $user->id }} role="button" aria-expanded="false" class="follow follow btn-lg btn-link pull-right p-a-0">
                  <span class="fal fa-plus"></span>
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
                    <span class="number">{{$points}}</span>{{ $points == 1 ? "point" : "points" }}
                </div>
            </div>
        </div>


<div class="top-container">
<div class="top-content-container">
	<div class="top-content top-responders">

 					@foreach ($replies as $key => $follower)
                    <a href="#" class="top-content-item" data-answered-by="{{$follower->uid}}" data-question-by="{{$user->id}}">
                        <div class="text-left">
                            <img class="img-circle top-content-item-img" src="{{ Helper::avatar($follower->avatar) }}">
                            <h5 class="panel-title">{{$follower->name}}</h5>
                            <span class="responses-count number-align">{{$follower->no_of_replies}} &nbsp;<i class="fal fa-angle-right" style="margin-bottom: 1px;"></i></span>
                        </div>
                    </a>
                     @endforeach
                    
                </div>
                
                         <div class="responses-to-display hide" style="min-height: fit-content;">
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
