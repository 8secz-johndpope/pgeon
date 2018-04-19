@extends('layouts.app-no-top-bar')
@section('content')

<div class="container p-t-md">
            <div class="row">
                    <div class="col-md-12">
                          <div>
                              <ul class="nav nav-bordered">
                                  <li>
                                      <div>
                                          <a class="pull-left icon-button" href="/people" style="height: 36px; vertical-align: middle; line-height: 30px;     border-radius: 4px 0px 0px 4px;"> <span class="fal fa-arrow-left"></span></a>
                                      </div>
                                       <div class="media-body">
                                          <form role="search" action="{{ route('search') }}">
                                              <input style="margin-left: -2px;" type="text" name="q" class="form-control" placeholder="search by name..">
                                              <div class="input-group-btn">
                                                  <!-- <button type="submit" class="input-group-addon" style="height: 36px; border: 1px solid #E6EAEB; border-left: 0; border-radious: 4px;">
                                                      <span class="fal fa-search"></span>
                                                  </button> -->
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

                                    <a class="media-left" href="{{$value['obj']->slug}}">
                                          <avatar :size="42" src="{{  Helper::avatar($value['obj']->avatar) }}" username="{{  $value['obj']->slug }}" ></avatar>
                                    </a>
                                    <div class="media-body">
                @if ( $value['obj']->role_id == 3 )

                 <button href="#" rel={{ $value['obj']->id  }} role="button" aria-expanded="false" class="follow btn btn-md btn-link pull-right {{( $value['obj']->af)?'hidden' : ''}}">
                  <span class="fal fa-plus"></span>
                </button>

                    <button href="#" rel={{ $value['obj']->id  }} role="button" aria-expanded="false" class="unfollow btn btn-md btn-link pull-right {{($value['obj']->af)?'' : 'hidden'}}">
                    <span class="text-muted fal fa-check"></span>
                    </button>
                @endif


                                        <strong>{{  $value['obj']->nameorslug }}</strong>
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
