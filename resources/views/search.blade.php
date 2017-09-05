@extends('layouts.app')
@section('content')

<div class="container p-t-md">
            <span style="float: left"><a href="/people"><span class="icon icon-chevron-with-circle-left" style="font-size: 26px"></span></a></span>
            <form class="app-search" role="search">
                <div class="form-group" style="text-align: center">
                    <a  href="/people"></a>
                     <form class="navbar-form navbar-right app-search" role="search" action="{{ route('search') }}">
                    		<input type="text"  name="q" class="people-search" placeholder="search people" style="text-align: center">
                    </form>
                </div>
            </form>
            {{$msg}}
            <div class="row">
                <div class="row">
                    <div class="col-md-12" style="margin-top: 5px">
                        <ul class="media-list media-list-users list-group">
                          @if ( isset($users)) 
			                 @foreach( $users as $value )
			             		    
			                
                 
                            <li class="list-group-item">
                                <div class="media">
                                    <a class="media-left" href="{{$value['obj']->url}}">
                                        <img class="media-object img-circle" src="{{  Helper::avatar($value['obj']->avatar) }} " />
                                    </a>
                                    <div class="media-body">
                                    		 @if ( $value['obj']->af)
                                    		 	<span class="pull-right">followed </span>
                                    		 @else
                                        <button rel={{ $value['obj']->id }} class="follow btn btn-primary-outline btn-sm pull-right">
                                            <span class="icon icon-add-user"></span>
                                            <span class="hidden-xs">follow</span>
                                        </button>
                                        @endif
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
        </div>
        




@endsection

<!-- Push a script dynamically from a view -->
@push('scripts')
    <script src="{{ asset('js/search.js') }}"></script>
@endpush