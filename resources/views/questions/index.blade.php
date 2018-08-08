@extends('layouts.app-vue')
@section('content')
        
@if (Auth::user())
    <allq role_id="{{Auth::user()->role_id}}"></allq>
@else
    <allqguest></allqguest>    
@endif    

@endsection

<!-- Push a style dynamically from a view -->
@push('styles')
@endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
    <script src="{{ asset('js/question.index.js') }}"></script>
@endpush
