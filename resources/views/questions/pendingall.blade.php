@extends('layouts.app-no-header-no-top-bar') @section('content')

    <answers_expired_owner question_id="{{$id}}" top_a={{$top_a}}></answers_expired_owner>









    





@endsection

<!-- Push a style dynamically from a view -->
@push('styles') @endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
<script src="{{ asset('js/question.index.js') }}"></script>
@endpush
