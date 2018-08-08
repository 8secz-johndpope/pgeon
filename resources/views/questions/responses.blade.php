@extends('layouts.app-vue')
@section('content')

@if (Auth::user())
    <allr role_id="{{Auth::user()->role_id}}"></allr>
@else
    <allrguest></allrguest>    
@endif  

@endsection

<!-- Push a style dynamically from a view -->
@push('styles')
@endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
    <script src="{{ asset('js/question.index.js') }}"></script>
@endpush
