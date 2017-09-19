@extends('layouts.app')
@section('content')

<div class="container p-t-md">

 @if (Auth::user())    
                    <allr user_id={{Auth::user()->id}} user_followings={{$uf}}></allr>
         @else
             	<allr></allr>
            @endif 
        </div>



@endsection

<!-- Push a style dynamically from a view -->
@push('styles')
@endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
    <script src="{{ asset('js/question.index.js') }}"></script>
@endpush
