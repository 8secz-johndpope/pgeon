@extends('layouts.app-no-top-bar')
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
                                                  <button type="submit" class="btn btn-primary" style="height: 36px;">
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
                                          <avatar :size="42" src="{{  Helper::avatar($value['obj']->avatar) }}" username="{{  $value['obj']->url }}" ></avatar>
                                    </a>
                                    <div class="media-body">

                                    <button href="#" rel={{ $value['obj']->id  }} role="button" aria-expanded="false" class="follow btn-md btn-link pull-right p-a-0 {{( $value['obj']->af)?'hidden' : ''}}">
                  <span class="fal fa-plus"></span>
                </button>

                <button href="#" rel={{ $value['obj']->id  }} role="button" aria-expanded="false" class="unfollow btn-md btn-link pull-right p-a-0 {{($value['obj']->af)?'' : 'hidden'}}">
                  <span class="text-muted fal fa-check"></span>
                </button>


                                        <strong>{{  $value['obj']->url }}</strong>
                                        <small>{{ $value['obj']->last_posted }}</small>
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
