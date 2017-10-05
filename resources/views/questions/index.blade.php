@extends('layouts.app')
@section('content')

			 @if (Auth::user())    
             	<allq user_id={{Auth::user()->id}} user_followings={{$uf}}></allq>
             @else
             	<allq></allq>
            @endif  



@endsection

<!-- Push a style dynamically from a view -->
@push('styles')
@endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
    <script src="{{ asset('js/question.index.js') }}"></script>
@endpush
