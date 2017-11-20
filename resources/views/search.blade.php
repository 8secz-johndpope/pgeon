@extends('layouts.app')
@section('content')

<div class="container p-t-md">
            <div class="row">
                    <div class="col-md-12">
                          <div>
                              <ul class="nav nav-bordered">
                                  <li>
                                      <div class="media-left">
                                          <a class="pull-left icon" href="/people" style="margin-top: 2px;"> <span class="fal fa-arrow-left"></span></a>
                                      </div>
                                       <div class="media-body">
                                          <form class="input-group" role="search" action="{{ route('search') }}">
                                              <input type="text" name="q" class="form-control" placeholder="search by name..">
                                              <div class="input-group-btn">
                                                  <button type="button" class="btn btn-primary" style="height: 36px;">
                                                      <span class="fa fa-search"></span>
                                                  </button>
                                              </div>
                                          </form>
                                       </div>
                                  </li>
                              </ul>
                          </div>
                          <p class="text-muted text-center">{{$msg}}</p>

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
                                         <button class="follow btn-lg btn-link pull-right">
                                             <span class="fal fa-check text-muted"></span>
                                         </button>
                                    		 @else
                                        <button rel={{ $value['obj']->id }} class="follow btn-lg btn-link pull-right">
                                            <span class="fal fa-plus"></span>
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





@endsection

<!-- Push a script dynamically from a view -->
@push('scripts')
    <script src="{{ asset('js/search.js') }}"></script>
@endpush
