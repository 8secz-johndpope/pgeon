@extends('layouts.app') @section('content')



<div id="answers_expired_owner_container">
     <div style="background-color:#f4f5f6; width: auto;">
            <div class="container sub-nav">
                <div>
                    <ul class="nav nav-pills">
                        <li>
                            <a href="/my-questions"><span class="icon icon-arrow-bold-left"></span> back</a>
                        </li>
                        <li class="hover-button-container">
                            <button type="button" id="reponse-updated" class="btn-xs save-button ">
                                Top response updated!
</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div style="background-color:#828287;width: auto">
            <div class="container sub-nav2">
                <ul class="media-list media-list-conversation c-w-md">
                    <li class="media media-divider">
                        <div class="media-body">
                            <div class="media-header">
                                <small class="text-muted"><a href="{{ ($question->user->slug)? '/'.$question->user->slug :  '/user/'.$question->user->id}}" id="user-profile-text-link" style="color:#eaeaea">{{$question->user->name}}</a></small>
                                <small class="text-muted pull-right" style="color:#eaeaea"> Ended: {{$question->expiring_at}}</small>
                            </div>
                            <ul class="media-list media-list-conversation c-w-md">
                                <li class="media">
                                    <div class="media-body">
                                        <div class="media-body-text media-question">
                                         {{$question->question}}
</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
        <answers_expired_owner question_id="{{$question->id}}" ></answers_expired_owner>

</div>

@endsection

<!-- Push a style dynamically from a view -->
@push('styles')
<link href="{{ asset('css/up-voting.css') }}" rel="stylesheet"> @endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
<script src="{{ asset('js/question.index.js') }}"></script>
@endpush
