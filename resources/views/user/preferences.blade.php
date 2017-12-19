@extends('layouts.app-no-top-bar')
@section('content')
<div class="container p-t-md">
    <div class="row">
    
    

        @component('user.menu',['current_menu' => 'preferences'])
		@endcomponent
                
    
    
   
    <div class="col-md-8" style="margin-top:10px">
        <ul class="list-group media-list media-list-stream">
         
          <li class="list-group-item media p-a">
            <p>Receive emails for:</p>
            <ul class="list_notifications">
              <li>
                                	
              
                <!-- Rounded switch -->
                <div class="notif_switch">
                  <label class="switch">
                              <input id="chk_nws" type="checkbox" {{$subscribed_to_newsletter == 1 ? 'checked':''}}>
                              <div class="slider round"></div>
                            </label>
                </div>
                <p style="padding-left: 8px">pgeon newsletter</p>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    
    
    
    
    </div>
</div>


@endsection
@push('scripts')
    <script src="{{ asset('js/settings.js') }}"></script>
@endpush