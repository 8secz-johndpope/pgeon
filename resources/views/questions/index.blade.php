@extends('layouts.app')
@section('content')

<div class="container p-t-md">
            <ul class="nav nav-pills tabs-padding">
                <li class="active">
                    <a href="#"><span class="icon icon-help"></span>
      Questions</a>
                </li>
                <li>
                    <a href="topR.html"><span class="icon icon-chat"></span>
      Replies</a>
                </li>
                @if( Auth::user()->role_id == 3)
                  <li role="presentation" class="pull-right">
                      <a href="/ask" type="button" class="btn btn-primary-outline">+ ?</a>
                  </li>
                @endif
            </ul>
            <div class="row">
                <div class="col-md-12">

                    <allq></allq>

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
