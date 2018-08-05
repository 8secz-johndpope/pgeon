@extends('layouts.app-back-title',['title' =>  ucwords(Helper::slug($user->id ,$user->slug)), $back= '/'])
@section('content')




<main class="mw6 m-auto smtp profile-details-container pl15 pr15">
  <div class="score-box flex items-center">
    <div class="w-33 flex justify-center">
     
    <avatar src="{{  Helper::avatar($user->avatar) }}" :size=80 username="{{Helper::name_or_slug($user)}}"></avatar>
    </div>
    <div class="right w-100 justify-center">
      <div class="flex justify-center tc">
        <div class="w-33">
          <span class="fw6">50k</span>
          <div class="points">Responses</div>
        </div>
        <div class="w-33">
          <span class="fw6">500k</span>
          <div class="points">Questions</div>
        </div>
        <div class="w-33">
          <span class="fw6">{{Helper::formatWithSuffix($points)}}</span>
          <div class="points">{{ $points == 1 ? "point" : "points" }}</div>
        </div>
      </div>
      <div class="w-100  flex justify-center">
        
    

      @if  (Auth::user())
                  @if ($user->id == Auth::user()->id )
                  @else
                    <button href="#" rel={{ $user->id }} role="button" aria-expanded="false" class="follow btn w-90 {{($is_following == true)?'dn' : ''}}">
                    Follow
                    </button>

                    <button href="#" rel={{ $user->id }} role="button" aria-expanded="false" class="unfollow  following btn w-90 {{($is_following == true)?'' : 'dn'}}">
                    Following
                    </button>
                  @endif

                @endif  
                
    </div>
    </div>
  </div>
  @foreach ($replies as $key => $reply)
      <div class="open-question__container">
      <div class="open-question__right">
        <div class="open-question__meta">
        <a href="/r/{{$reply->rslug}}"><span class="open-question__author">{{$reply->rslug_formatted}}</span></a>
          <span class="open-question__time">{{$reply->ago}}</span>
        </div>
        <div class="q-bubble-container q-bubble-container--clickable mt5p mb15p">
          <div class="q-bubble qa-item ">
            <div><span> {{$reply->question}}</span></div>
            <div class="qa-item__seperator"></div>
            <span> {{$reply->answer}}</span>
          </div>
        </div>
      </div>
    </div>
    @endforeach

</main>







 






























@endsection



