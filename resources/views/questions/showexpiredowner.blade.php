@extends('layouts.app-profile-no-top-bar')
@section('content')



 <nav class="navbar navbar-inverse navbar-fixed-top app-navbar nav-question">
                <nav class="container nav-container header-nav">
                    <a href="/responses"  ><span class="fal fa-times" style="font-size: 20px;"></span></a>
                    <h4>
                    <a href="/{{  Helper::slug($question->user->id,$question->user->slug) }}"><img class="img-circle header-img" src="{{ Helper::avatar($question->user->avatar) }}"></a>
                 
                </nav>
            </nav>
            



      <div style="width: auto;">
            <div class="container">
                <ul class="media-list media-list-conversation c-w-md">
                    <div class="media-body">
                        <div class="h5 m-b-5">
                            @if(isset($answer))
                            <span class="tmw"><a href="/r/{{Helper::shared_slug($question->user->id,$question->user->slug,$answer->user->id,$answer->user->slug)}}">
                             {{Helper::shared_formatted_string($question->user->id,$question->user->slug,$answer->user->id,$answer->user->slug)}}
                            </a></span>
                        
                         @else 
                         <span class="tmw"><a href="/{{Helper::slug($question->user->id ,$question->user->slug)}}">{{Helper::slug($question->user->id ,$question->user->slug)}}</a></span>

                         @endif
                            <span class="text-muted time-align">{{($question->accepted_answer>0)?"Published":"Ended"}}:  <localtimezone ts="{{$question->expiring_at}}"> </localtimezone></span>
                        </div>
                        <ul class="media-list media-list-conversation c-w-md">
                            <li class="media">
                                <div class="media-body">
                                    <div class="media-body-text media-question">
                                    {{$question->question}}
</div>
                                    
                                    @if(isset($answer))
                                    <ul class="media-list media-seconday media-list-conversation c-w-md">
                                        <li class="media media-current-user media-divider">
                                            <div class="media-body">
                                                <div class="media-body-text media-response media-response-margin" style="cursor: pointer;">
                                                    {{$answer->answer}}
</div>
                                            </div>
                                        </li>
                                    </ul>
                                    @else
                                    
                                         <ul class="media-list  media-secondary media-list-conversation c-w-md">
                                <li class="media media-current-user media-divider">
                                    <div class="media-body" style="text-align: center">
                                        <div class="media-body-text media-response">
                                            <div class="statcard p-a-md" style="display: inline-block">
                                                <div class="loader-2">
                                                    <div class="dot"></div>
                                                    <div class="dot"></div>
                                                    <div class="dot"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endif
                            
                                </div>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>





@endsection



<!-- Push a script dynamically from a view -->
@push('scripts')
<script src="{{ asset('js/question.index.js') }}"></script>
@endpush



