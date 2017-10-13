@extends('layouts.app-profile')
@section('content')


<nav class="navbar navbar-inverse navbar-fixed-top app-navbar">
            <div class="nav-contain" style="background-color: #fff;">
                <nav class="container nav-container header-nav">
                    <a class="navbar-brand" href="/">
                        <img src="{{URL::asset('img/pgeon-logo-mobile.svg')}}" alt="Pgeon">
                    </a>
                    <h4><img class="img-circle header-img" src="{{ Helper::avatar($question->user->avatar) }}"> </h4>
                    <ul class="nav navbar-nav m-r-0">
                        <li>
                            <div>
                                <a href="/login" class="btn btn-sm btn-primary-outline" style="font-weight: 600;">Log In</a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        



        
        
        
        
        
        
          <div style="width: auto;border-bottom: 1px solid #E6EAEB;background-color: #fff;">
            <div class="container sub-nav2">
                <ul class="media-list media-list-conversation c-w-md">
                    <li class="media media-divider">
                              <div class="h5 m-b-5">
                            <span>{{$question->user->name}}</span>
                            <span class="text-muted time-align">
                            <allqtimer :initial="{{$lq_expiring_in}}"
								:question_id="{{$question->id}}" @event="reload"></allqtimer></span>
                            </span>
                        </div>
                        <ul class="media-list media-list-conversation c-w-md">
                            <li class="media">
                                <div class="media-body">
                                    <div class="media-body-text live-media-question">
                                    <?php echo $question->question; ?></div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        
        
        
        
        
    
        
        
        
  

    
       
         <answers_guest question_id="{{$question->id}}" question_owner_id="{{$question->user_id}}" ></answers_guest>
       


@endsection

<!-- Push a style dynamically from a view -->
@push('styles')
<link href="{{ asset('css/up-voting.css') }}" rel="stylesheet">
 @endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
<script src="{{ asset('js/question.index.js') }}"></script>
@endpush
