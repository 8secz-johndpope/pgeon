@extends('layouts.app-no-header')
@section('content')





                            <pnotifications current_user_id="{{Auth::user()->id}}" @bubbleCountChanged="bubbleChangedFromChild"></pnotifications>
           







@endsection


@push('scripts')
    <script src="{{ asset('js/question.index.js') }}"></script>
@endpush
