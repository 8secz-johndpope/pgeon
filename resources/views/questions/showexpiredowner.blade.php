@extends('layouts.app-profile')
@section('content')



 <nav class="navbar navbar-inverse navbar-fixed-top app-navbar nav-question">
                <nav class="container nav-container header-nav">
                    <a href="/responses"  ><span class="fal fa-arrow-left" style="font-size: 20px;"></span></a>
                    <h4>
                    <img class="img-circle header-img" src="{{ Helper::avatar($question->user->avatar) }}">
                 
                </nav>
            </nav>
            



      <div style="width: auto;">
            <div class="container">
                <ul class="media-list media-list-conversation c-w-md">
                    <div class="media-body">
                        <div class="h5 m-b-5">
                            <span>{{$question->user->name}}</span>
                               @if(isset($answer))
                            <span class="fa fa-long-arrow-left text-muted"></span>
                            <span>{{$answer->user->name}}</span>
                            @endif
                            <span class="text-muted time-align">Ended: {{date("m/d/Y H:i", $question->expiring_at)}}</span>
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



