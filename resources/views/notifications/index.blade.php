@extends('layouts.app-no-header')
@section('content')





                            <notifications current_user_id="{{Auth::user()->id}}" @bubbleCountChanged="bubbleChangedFromChild"></notifications>
           







@endsection


@push('scripts')
    <script src="{{ asset('js/question.index.js') }}"></script>
@endpush
