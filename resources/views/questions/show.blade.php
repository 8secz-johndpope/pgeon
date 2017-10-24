@extends('layouts.app-profile')
@section('content')



 <nav class="navbar navbar-inverse navbar-fixed-top app-navbar nav-question">
                <nav class="container nav-container header-nav">
                    <a  href="/"><span class="fal fa-arrow-left" style="font-size: 20px;"></span></a>
                    <h4>
                    <img class="img-circle header-img" src="{{ Helper::avatar($question->user->avatar) }}">
                    <span style="vertical-align: text-bottom;color: #8e8e93;font-weight: 400;">&nbsp; Live question</span></h4>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="fal fa-ellipsis-h" style="font-size:24px"></span></a>
                        <ul class="dropdown-menu header-dropdown" role="menu">
                            <li class="respond-li">
                                <a class="header-dropdown-respond"> <span class="fa fa-reply"></span> &nbsp;Respond</a>
                            </li>
                            <li class="hide-li hidden">
                                <a class="header-dropdown-respond"> <span class="fa fa-times"></span> &nbsp;Close</a>
                            </li>
                            <li>
                                <a data-toggle="modal" href="#shareQuestion"> <span class="fa fa-share-alt"></span> &nbsp;Share</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </nav>


 
     <div class="modal fade" id="shareQuestion" tabindex="-1" role="dialog" aria-labelledby="shareQuestion" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Share live question</h4>
                    </div>
                    <div class="modal-body p-a-0 js-modalBody">
                        <div class="share-buttons-container">
                            <a class="twitter" href="#" target="_blank"><i class="fal fa-twitter icon" aria-hidden="true"></i></a>
                            <a class="facebook" href="#" target="_blank"><i class="fal fa-facebook icon" aria-hidden="true"></i></a>
                            <a class="google-plus" href="#" target="_blank"><i class="fal fa-google-plus icon" aria-hidden="true"></i></a>
                            <a class="linkedin" href="#" target="_blank"><i class="fal fa-linkedin icon" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        
        
        
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
                                        <div class="overlay">
                                            <div class="half-left">
                                                <span class="number">{{$question->answers->count()}}</span>
                                                <span>responses</span>
                                            </div>
                                            <div class="half-right">
                                                <span class="number">{{$question->votes()->count() }}</span>
                                                <span>votes</span>
                                            </div>
                                        </div>
                                       
                                       <?php echo $question->question; ?>
                                       
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        
        
        
        
  

    
       
         <answers question_id="{{$question->id}}" current_user_id="{{Auth::user()->id}}" question_owner_id="{{$question->user_id}}" votecount="{{$user_answered_votes}}"></answers>
       


@endsection

<!-- Push a style dynamically from a view -->
@push('styles')
<link href="{{ asset('css/up-voting.css') }}" rel="stylesheet">
 @endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
    <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
    <script src="{{ asset('js/up-voting.js') }}"></script>
<script src="{{ asset('js/question.index.js') }}"></script>
@endpush
