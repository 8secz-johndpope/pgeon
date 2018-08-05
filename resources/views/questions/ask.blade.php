@extends('layouts.app-no-logo', ['back' => '/']) @section('content')


<div style="width: auto">
	<div class="container p-t-md">

    @include('flash::message')



		<div>

    @if ($role_id !=  3 && $total_count_exhausted)
    @else
        <ask lq_created_at="{{$lq_created_at}}"></ask>
    @endif
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


</div></div>



<main class="mw6 m-auto">

  <div class="question-stats">
  @if (count($live) > 0)
    <a href="/live" class="question-stats__item">
    @else
    <a  class="question-stats__item">
    @endif
      <div>
      {{Helper::read_svg("img/svg/ban.svg")}}
        <span>Open</span>
      </div>
     
      <span>
    
                {{count($live)}} </span>
    </a>

  @if (count($pending) > 0)
    <a href="/pending" class="question-stats__item">
    @else
    <a  class="question-stats__item">
    @endif
      <div>
      {{Helper::read_svg("img/svg/clock.svg")}}

        <span>Pending</span>
      </div>
   
                    <span>
                    
                    {{count($pending)}} </span>
    </a>


    @if (count($published) > 0)
    <a href="/published" class="question-stats__item">
    @else
    <a  class="question-stats__item">
    @endif
      <div>
      {{Helper::read_svg("img/svg/check-circle.svg")}}

        <span>Published</span>
      </div>
               
                    <span> 
                    {{count($published)}} </span>
    </a>
  </div>

</main>



    







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
