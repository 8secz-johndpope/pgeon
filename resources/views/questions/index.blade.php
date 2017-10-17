@extends('layouts.app-no-header')
@section('content')

			 @if (Auth::user())    
             	<allq user_id={{Auth::user()->id}} user_followings={{$uf}} role_id={{ Auth::user()->role_id}} avatar={{  Helper::avatar(Auth::user()->avatar) }} slug={{Helper::slug(Auth::user()->id, Auth::user()->slug)}} csrf_field={{  Session::token() }}></allq>
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
