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
@endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
    <script src="{{ asset('js/question.index.js') }}"></script>
@endpush
