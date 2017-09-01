@extends('layouts.app')
@section('content')

      <div class="container p-t-md">
            <div class="row">
                <div class="col-md-3" style="margin-top:10px">
                    <div class="list-group m-b-md">
                    		
                        <a href="index.html" class="list-group-item active"><span class="bubble badge"></span>
          notifications</a>
                        <a href="news-updates.html" class="list-group-item"><span class="badge" style="background-color:#c9ccd4">0</span>
          news/updates</a>
                    </div>
                </div>
                <div class="col-md-9" style="margin-top:10px">
                    <ul class="list-group media-list media-list-stream">
                    
                      <notifications></notifications>
                    
                        <li class="list-group-item media p-a">
                            <div class="media-left">
                                <span class="icon text-muted icon-message"></span>
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <a><strong>display-name</strong></a>
                                    <small class="pull-right text-muted">4 hrs ago..</small> posted a new question
                                </div>
                                <div class="media-body">
                                    <ul class="media-list media-list-conversation c-w-md">
                                        <li class="media m-b-md">
                                            <div class="media-body">
                                                <div class="media-body-text media-question" onclick="location.href='liveQ-selected.html';" style="cursor: pointer;">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        
                        
                        
                        
                       
                    </ul>
                </div>
                <div class="col-md-3">
</div>
            </div>
        </div>
        





@endsection

<!-- Push a style dynamically from a view -->
@push('styles')
      <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
@endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>
    <script src="{{ asset('js/question.index.js') }}"></script>
@endpush
