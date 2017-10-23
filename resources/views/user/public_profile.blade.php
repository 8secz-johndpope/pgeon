@extends('layouts.app-profile')
@section('content')
  <div class="nav-contain">
            <nav class="container nav-container header-nav">
                <a onclick="window.history.back();"  style="cursor:pointer;"><span class="fal fa-arrow-left" style="font-size: 20px;"></span></a>
                <h4>{{$user->name}}</h4>
                <a href="#" role="button" aria-expanded="false"> <span class="fal fa-plus" style="font-size: 20px;"></span></a>
            </nav>
        </div>

  <div class="user-data">
            <div class="user-meta">
                <div class="avatar-wrapper">
                    <img class="avatar avatar-96 photo" src="{{ Helper::avatar($user->avatar) }} " alt="" height="96" width="96">
                </div>
                <div class="vote-points avatar-wrapper">
                    <span class="number">{{$points}}</span>points
                </div>
            </div>
        </div>


<div class="top-container">
            <div class="top-header">
                <div>
                    <span class="arrow-back"><i class="fal fa-angle-left" aria-hidden="true"></i></span>
                    <h4>responders</h4>
                    <span class="back-btn hide"><i class="fal fa-angle-left" aria-hidden="true"></i></span>
                    <span class="arrow-forward"><i class="fal fa-angle-right" aria-hidden="true"></i></span>
                </div>
            </div>
            <div class="top-content-container">
                <div class="top-content top-responders">

                @foreach ($most_replied as $key => $follower)
                	<a href="#" class="top-content-item" data-answered-by="{{$follower->id}}" data-question-by="{{$user->id}}">
                        <div class="text-left">
                            <img class="img-circle top-content-item-img" src="{{ Helper::avatar($follower->avatar) }}">
                            <h5>{{$follower->name}}</h5>
                            <span class="responses-count number-align">{{$follower->no_of_replies}}</span>
                        </div>
                    </a>
                @endforeach



                </div>
                <div class="responses-to-display hide" style="min-height: fit-content;">
</div>
                <div class="user-info hide" style="min-height: fit-content;">
                    <div>
                        <div class="profile-header">
                            <div class="container-inner">
                                <p class="profile-header-bio">{{$user->bio}}</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="most-responded hide" style="background-color: #F8F9F9; min-height: fit-content;">
                    <div style="margin-top: 15px;">
                        <div class="container r-top-content">



                         @foreach ($responded_to as $key => $responder)
                            <div class="col-xs-6 col-sm-3">
                                <div class="panel">
                                    <a href="#" class="r-top-content-item" data-answered-by="{{$user->id}}" data-question-by="{{$responder->id}}">
                                        <div class="panel-padding">
                                         <h5 class="hide">{{$responder->name}}</h5>
                                            <div class="row">
                                                <div class="col-xs-6" style="line-height: 62px;">
                                                    <li class="avatar-list-item">
                                                        <img class="img-circle" src="{{ Helper::avatar($follower->avatar) }}">
                                                    </li>
                                                </div>
                                                <div class="text-right col-xs-6">
                                                    <div class="h4">
                                                        <span class="fa fa-reply" style="color: #BCC0C8;"></span>
                                                    </div>
                                                    <div>
                                                        <div class="h4 responded-count">{{$responder->no_of_replies}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach



                        </div>
                    </div>
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
@endpush
