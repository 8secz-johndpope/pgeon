@extends('layouts.app-vue')
@section('content')
        





@if (Auth::user())
    <allq role_id="{{Auth::user()->role_id}}"></allq>
@else
    <allqguest></allqguest>    
@endif    

@endsection





