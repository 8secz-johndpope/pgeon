@extends('layouts.app-mail')

@section('content')
   
  
Q:     <a href="{{$q_url}}">{{$q_url}}</a> <br />
Reported by :  <a href="{{$user_slug}}">{{$user_slug}}</a>

@endsection
