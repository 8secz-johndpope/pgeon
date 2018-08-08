@extends('layouts.app-people-header', ['back' => '/people'])
@section('content')

<div class="bgw"> 


  <div class="search-view  mw6 m-auto pr15 pl15">


<span class="search-icon" href="/people/search">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M508.5 481.6l-129-129c-2.3-2.3-5.3-3.5-8.5-3.5h-10.3C395 312 416 262.5 416 208 416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c54.5 0 104-21 141.1-55.2V371c0 3.2 1.3 6.2 3.5 8.5l129 129c4.7 4.7 12.3 4.7 17 0l9.9-9.9c4.7-4.7 4.7-12.3 0-17zM208 384c-97.3 0-176-78.7-176-176S110.7 32 208 32s176 78.7 176 176-78.7 176-176 176z"></path></svg>

</span>
<form role="search" action="{{ route('search') }}" class="w100p">
    <input autofocus placeholder="Search by name" type="text" class="search-input caret-primary w100p" name="q">
    </form>
<a class="search-close" href="/people/">

 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M217.5 256l137.2-137.2c4.7-4.7 4.7-12.3 0-17l-8.5-8.5c-4.7-4.7-12.3-4.7-17 0L192 230.5 54.8 93.4c-4.7-4.7-12.3-4.7-17 0l-8.5 8.5c-4.7 4.7-4.7 12.3 0 17L166.5 256 29.4 393.2c-4.7 4.7-4.7 12.3 0 17l8.5 8.5c4.7 4.7 12.3 4.7 17 0L192 281.5l137.2 137.2c4.7 4.7 12.3 4.7 17 0l8.5-8.5c4.7-4.7 4.7-12.3 0-17L217.5 256z"></path></svg>
</a>

</div>
</div>


<main class="mw6 m-auto people-main pl15p pr15p pt30p dn">
  <div class="search-header">
    <h2 class="m0">Recently Searched</h2>
    <button>Clear Search</button>
  </div>
    <h4 class="search-item">sds</h4>

</main>

<main class="mw6 m-auto people-main pl15p pr15p pt10p">
@if ( isset($users) && sizeof($users)>0 )

   @foreach( $users as $value )
  <div class="people-item">
    <div>
        <avatar :size="36" src="{{  Helper::avatar($value['obj']->avatar) }}" username="{{  Helper::name_or_slug($value['obj']) }}" ></avatar>
      <div class="people-item__info">
        <h4>{{  $value['obj']->nameorslug }}</h4>
        <span>{{ $value['obj']->last_posted }}</span>
      </div>
    </div>
    @if ( $value['obj']->role_id == 3 )
        <button rel={{ $value['obj']->id  }}  class="follow-button follow  {{ ($value['obj']->af)?'dn' : ''}}">
        <span>Follow</span>
        <!-- following is the `active` state -->
        </button>

        <button rel={{ $value['obj']->id  }}  class="follow-button follow-button--active unfollow {{($value['obj']->af)?'' : 'dn'}}">
        <span>Following</span>
        </button>

    @endif
  </div>
  @endforeach
  @endif
  @if ( isset($q) && sizeof($users)<1 )
    <span class="search-unfound-result">
    👽 <br>
    uh oh! Looks like you searched for a mystery human!
  </span>    
@endif
</main>







@endsection


