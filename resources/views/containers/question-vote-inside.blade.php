<?php
// todo clean this up
$answer_count = json_decode($question->answer_count,true);
if (isset($answer_count[0])) {
    $answer_number = $answer_count[0]['total'];
} else  {
    $answer_number = 0;
}
$shown = false;
?>
<!-- Question Container-->



<ul class="media-list media-list-stream c-w-md">
    <li class="media p-a">
        <div class="media-body">
            <ul class="media-list media-list-conversation c-w-md">
                <li class="media m-b-md">
                    <div class="media-body">
                        <div class="media-body-text media-question">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>
                    </div>
                </li>
            </ul>
            <ul class="media-list media-list-conversation c-w-md">
                <li class="media media-current-user m-b-md media-divider">
                    <div class="media-body">
                        <div class="media-body-text media-response">
                            Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>
                    </div>
                </li>
            </ul>
        </div>
    </li>
    <li class="media p-a">
        <div class="media-body">
            <ul class="media-list media-list-conversation c-w-md">
                <li class="media m-b-md">
                    <div class="media-body">
                        <div class="media-body-text media-question">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>
                    </div>
                </li>
            </ul>
            <ul class="media-list media-list-conversation c-w-md">
                <li class="media media-current-user m-b-md media-divider">
                    <div class="media-body">
                        <div class="media-body-text media-response">
                            Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>
                        <div class="media-footer">
</div>
                    </div>
                </li>
            </ul>
        </div>
    </li>
</ul>



<div class="single_question">
    <div class="sq_header">
        
        <div class="col-xs-2 col-md-1">
            {{ Form::open(['url' => 'vote', 'class' => 'vote']) }}
            {{ Form::token() }}
            <div class="upvote vote_question" data-question="{{$question->id}}" data-uid="{{Auth::id()}}">
                <a id="q-upvote" class="upvote vote_q {{ $question->user_id == Auth::id() ? 'vote_disabled' : '' }} {{ $question->votes && $question->votes->contains('user_id', Auth::id()) ? ($question->votes->where('user_id', Auth::id())->first()->vote == 1 ? 'upvote-on' : null) : null}}" data-vote="1"></a>
                <span class="count" id="q-{{$question->id}}">{{ $question->votes->sum('vote') }}</span>
                <a id="q-downvote" class="downvote vote_q {{ $question->user_id == Auth::id() ? 'vote_disabled' : '' }}  {{ $question->votes && $question->votes->contains('user_id', Auth::id()) ? ($question->votes->where('user_id', Auth::id())->first()->vote <= 0 ? 'downvote-on' : null) : null}}" data-vote="-1"></a>
            </div>
            {{ Form::close() }}
        </div>
        <div class="sq_meta">
            <ul>
                <li><a href="#">{{ucfirst($question->user->name)}} </a></li>
                <li class="posted-on">{{date('F dS Y', strtotime($question->created_at))}}</li>
            </ul>
        </div>
        <h2>{{ e($question->question) }}</h2>
          {{ $answer_number >= 1 ? $answer_number . ' ' . str_plural('answer', $answer_number) : ''  }}
    </div>
    <div class="sq_header top_voted">
       <div class="top_voted_thumb">
           <img src="{{URL::asset('img/arrow.svg')}}" alt="">
       </div>
       <div class="top_voted_detail">
            <div class="sq_meta">
                <ul>
                    <li><a href="#">Display Name</a></li>
                </ul>
            </div>
            <h2>The top voted response will populate here…</h2>
       </div>
    </div>
</div>


<!-- END Question Container-->
