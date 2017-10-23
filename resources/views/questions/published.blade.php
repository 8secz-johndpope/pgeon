@extends('layouts.app-profile') @section('content')

  <div class="nav-contain">
    <nav class="container nav-container header-nav">
      <a onclick="window.history.back()"><span class="fal fa-arrow-left" style="font-size: 20px;"></span></a>
      <h4>Published</h4>
       <button type="button" class="btn btn-sm btn-default-outline edit">edit</button>
       <button type="button" data-toggle="modal" data-target="#deleteQ" id="delete"  class="btn btn-xs btn-danger-outline deleteNum">##</button>
    </nav>
  </div>

  <div class="modal" id="deleteQ">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title pull-left">Are you sure?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="margin-bottom:0">Any distributed points provided by these questions will be removed from the affiliated accounts. Deleted questions and responses can no longer be retrieved or publicly viewable. </p>
                    </div>
                    <div class="modal-actions">
                        <button id="done" type="button" class="btn-link modal-action confirm" data-dismiss="modal">
                            <strong style="color:#a94442">Confirm</strong>
                        </button>
                        <button type="button" class="btn-link modal-action cancel" data-dismiss="modal" style="color:#C9CCD4">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

<div style="width: auto;">
</div>
        <div class="container p-t-md">
        
         <ul class="media-list media-list-stream c-w-md answer-bubbles-container">
                <!--  starting here -->
                @foreach ($published as $key => $val) 
                <li class="media answer-bubble">
                    <div class="media-left">
                        <div class="checkbox-inline custom-control custom-checkbox hidden">
                            <label>
                                <span class="fal fa-trash "></span>
                                <input type="checkbox" value="{{$val['question']->id}}"  class="toggleOverlay">
                                <span class="custom-control-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="media-body">
                        <ul class="media-list media-list-conversation c-w-md">
                            <li class="media first">
                                <div class="media-body closest-overlay">
                                    <div id="overlay"></div>
                                    <div class="media-body-text media-question">{{$val['question']->question}}
</div>
                                    <!-- <div id="overlay"></div> -->
                                    <div class="media-body-text media-response" style="margin-top: 0;">
                                        {{$val['answer']->answer}}
</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                @endforeach
                <!-- end here -->
            </ul>
            
   
        </div>
        


 



@endsection

<!-- Push a style dynamically from a view -->
@push('styles') @endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
<script src="{{ asset('js/question.index.js') }}"></script>
@endpush