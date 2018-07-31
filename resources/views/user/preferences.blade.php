@extends('layouts.app-no-top-bar', ['back' => true])
@section('content')
<div class="container p-t-md">
    <div class="row">
    
    

        @component('user.menu',['current_menu' => 'preferences'])
		@endcomponent
                
    
    
   
    <div class="col-md-8 m-b-5" style="margin-top:10px">
        <ul class="list-group media-list media-list-stream">
         

        <li class="list-group-item media p-a">
                                <div class="control-label m-b">Receive emails for:</div>
                                <div class="p-x-0 col-xs-2">
                                    <input id="chk_nws" type="checkbox" hidden {{$subscribed_to_newsletter == 1 ? 'checked':''}} />
                                    <label for="chk_nws" class="switch"></label>
                                </div>
                                <div style="width: 80%;">
                                    <p class="small">Pgeon newsletter</p>
                                </div>
                        </li>

                        

  
        </ul>
      </div>
    
    
    
    
    </div>
</div>


@endsection
@push('scripts')
    <script src="{{ asset('js/settings.js') }}"></script>
@endpush