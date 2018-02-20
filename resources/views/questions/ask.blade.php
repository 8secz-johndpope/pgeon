@extends('layouts.app-no-top-bar') @section('content')


<div style="width: auto">
	<div class="container p-t-md">



@if ($role_id !=  3 && $total_count_exhausted)
@else
    <div>

   
       <ask lq_created_at="{{$lq_created_at}}"></ask>
		@if ($role_id !=  3)
				@if ($total_count_exhausted)
				<div class="alert alert-warning">
								Oh no, You've reached your question quota! You can ask more in 3days 1hr 10min.. </a>
				</div>
				@else
				<div class="alert alert-info">
								<strong>{{$total_posted }} / {{ $qs_allowed }}</strong> questions posted..
				</div>
				@endif
        @else

        @endif

  
    
    </div>

@endif

</div></div>





        <div style="width: auto;">
            <div class="container" style="padding: 0px;">
              <div class="col-sm-4">
													<div onclick="window.location.href='/live'">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                @if (count($live) > 0)
                                    <i class="text-muted fal fa-circle-notch fa-3x fa-spin"></i>
                                @else
                                    <i class="text-muted fal fa-ban fa-3x"></i>
                                @endif

                                </div>
                                <div class="col-xs-9 text-right">
                                    <div style="margin-top: 0;" class="h4">
                                        {{count($live)}}
</div>
                                    <div>
                                        <div class="h5" style="margin: 0;">Live</div>
                                    </div>
                                </div>
                            </div>
                        </div>
											</div>
                    </div>
                </div>
                <div class="col-sm-4">
									<div onclick="window.location.href='/pending'">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="text-muted fal fa-clock fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div style="margin-top: 0;" class="h4">
                                        {{count($pending)}}
</div>
                                    <div>
                                        <div class="h5" style="margin: 0;">Pending</div>
                                    </div>
                                </div>
                            </div>
                        </div>
											</div>
                    </div>
                </div>
                <div class="col-sm-4">
									<div onclick="window.location.href='/published'">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="text-muted fal fa-check-circle fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div style="margin-top: 0;" class="h4">
																			{{count($published)}}
																		</div>
                                    <div class="h5" style="margin: 0;">Published</div>
                                </div>
                            </div>
                        </div>
											</div>
                    </div>
                </div>
            </div>
        </div>




                <!-- end of tabs -->
            </div>
        </div>







<!-- include summernote css/js-->

@endsection

<!-- Push a style dynamically from a view -->
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
@endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
<script src="{{ asset('js/question.index.js') }}"></script>
@endpush
