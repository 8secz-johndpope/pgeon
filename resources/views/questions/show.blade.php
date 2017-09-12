@extends('layouts.app') @section('content')



       <div style="background-color:#f4f5f6; width: auto;">
            <div class="container sub-nav">
                <div>
                    <ul class="nav nav-pills">
                        <li>
                            <a href="/questions"> <span class="icon icon-home"></span></a>
                        </li>
                        <li>
                            <a>live question</a>
                        </li>
                        <li class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="icon icon-share"></span> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#"> <span class="icon icon-facebook-with-circle"></span> Facebook</a>
                                </li>
                                <li>
                                    <a href="#"> <span class="icon icon-google-plus-with-circle"></span> Google+</a>
                                </li>
                                <li>
                                    <a href="#"> <span class="icon icon-linkedin-with-circle"></span> LinkedIn</a>
                                </li>
                                <li>
                                    <a href="#"> <span class="icon icon-twitter-with-circle"></span> Twitter</a>
                                </li>
                            </ul>
                        </li>
                        <ul class="dropdown-menu" role="menu">
                            <ul class="dropdown-menu" role="menu">
                                <a>Share Profile</a>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">Facebook</a>
                                </li>
                                <li>
                                    <a href="#">Twitter</a>
                                </li>
                            </ul>
                            <li>
                                <a href="#">Facebook</a>
                            </li>
                            <li>
                                <a href="#">Twitter</a>
                            </li>
                            <li class="divider"></li>
                        </ul>
                    </ul>
                </div>
            </div>
        </div>
        
        
              <div style="background-color:#828287;width: auto;box-shadow:inset 0px 0px .05 black">
            <div class="container sub-nav2">
                <ul class="media-list media-list-conversation c-w-md">
                    <li class="media media-divider">
                        <div class="media-body">
                            <small style="color:#eaeaea"><a href="{{ ($question->user->slug)? '/'.$question->user->slug :  '/user/'.$question->user->id}}" style="color: #eaeaea">{{$question->user->name}}</a> <answeringtimer initial="{{$question->expiring_at}}"></answeringtimer> left </small>
                            <ul class="media-list media-list-conversation c-w-md">
                                <li class="media">
                                    <div class="media-body">
                                        <div class="media-body-text media-question">
                                         <?php echo $question->question; ?>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
        
        
        


<div class="container p-t-md">
 
    <div style="width: auto">
            <div class="container sub-nav2">
                <ul class="media-list media-list-conversation c-w-md">
                    <li class="media media-divider">
                        <div class="media-body">
                            <ul class="media-list media-list-conversation c-w-md">
                                <li class="media">
                                    <div class="media-body">
                                        <div class="media-body-text media-response media-user-response open-footer" style="cursor: pointer; border: 2px dashed #e4e5e6;background-color: transparent;min-height: 70px;">
                                            <span class="click-to-reply"><span class="icon icon-reply"></span>
&nbsp; tap or click here to reply..</span>
                                            <span class="loading" id="wait"><span class="loading">...</span></span>
                                            <span type="button" data-dismiss="alert" aria-label="Close" class="close-footer"><span aria-hidden="true">×</span></span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <div class="media-list media-list-conversation c-w-md jsvote">
                    <div class="media media-divider">
                        <div class="media-body">
                            <div class="media-body-text media-response media-response-margin flex-center">
                                <a class="media-left">
                                    <button id="vote" onclick="upVote()" class="btn-borderless">
                                        <h1 id="counter"><span class="icon icon-minus"></span></h1>
                                    </button>
                                </a>
                                <p class="flexone">
                      estas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="media-list media-list-conversation c-w-md jsvote">
                    <div class="media media-divider">
                        <div class="media-body">
                            <div class="media-body-text media-response media-response-margin flex-center">
                                <a class="media-left">
                                    <button id="vote" onclick="upVote()" class="btn-borderless">
                                        <h1 id="counter" style="margin-top:0"><span class="icon icon-minus"></span></h1>
                                    </button>
                                </a>
                                <p class="flexone">
                      estas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="media-list media-list-conversation c-w-md jsvote">
                    <div class="media media-divider">
                        <div class="media-body">
                            <div class="media-body-text media-response media-response-margin flex-center">
                                <a class="media-left">
                                    <button id="vote" onclick="upVote()" class="btn-borderless">
                                        <h1 id="counter" style="margin-top:0"><span class="icon icon-minus"></span></h1>
                                    </button>
                                </a>
                                <p class="flexone">
                      estas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="media-list media-list-conversation c-w-md jsvote">
                    <div class="media media-divider">
                        <div class="media-body">
                            <div class="media-body-text media-response media-response-margin flex-center">
                                <a class="media-left">
                                    <button id="vote" onclick="upVote()" class="btn-borderless">
                                        <h1 id="counter" style="margin-top:0"><span class="icon icon-minus"></span></h1>
                                    </button>
                                </a>
                                <p class="flexone">
                      estas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
  <answers question_id="{{$question->id}}" current_user_id="{{Auth::user()->id}}" question_owner_id="{{$question->user_id}}" votecount="{{$user_answered_votes}}"></answers>

    
</div>


@endsection

<!-- Push a style dynamically from a view -->
@push('styles')
<link href="{{ asset('css/up-voting.css') }}" rel="stylesheet">
 @endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
<script src="{{ asset('js/question.index.js') }}"></script>
@endpush
