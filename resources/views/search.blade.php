@extends('layouts.app')
@section('content')


<div class="container p-t-md">
       <div class="row">
           <div class="col-md-9">
               <ul class="media-list media-list-users list-group">
                 @if ( !$users) )
                     No one like that out there.
                 @else
                 @foreach( $users as $value )
                 <li class="list-group-item">
                      <div class="media">
                          <a class="media-left" href="#">
                              <img class="media-object img-circle" src="{{ $value['obj']->avatar ? '/uploads/avatars/'.$value['obj']->avatar:  URL::asset('img/profile-placeholder.svg')}} " alt="">
                              
                          </a>
                          <div class="media-body">
                              <button id="follow_{{$value['obj']->id}}" class="btn btn-primary-outline {{($value['already_followed'])? 'hide':''}}  btn-sm pull-right" v-on:click="follow({{$value['obj']->id}})">
                                  <span class="icon icon-add-user"></span> Follow
                              </button>
                              <button id="unfollow_{{$value['obj']->id}}" class="btn btn-primary-outline {{($value['already_followed'])? '':'hide'}} btn-sm pull-right" v-on:click="unfollow({{$value['obj']->id}})">
                                  <span class="icon icon-add-user"></span> Unfollow
                              </button>
                              <strong>{{ $value['obj']->name }}</strong>
                              <small>{{ $value['obj']->bio }}</small>
                          </div>
                      </div>
                  </li>
                   @endforeach
                   @endif
               </ul>
           </div>
       </div>
   </div>

@endsection
