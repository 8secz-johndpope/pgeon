@extends('layouts.app-no-header-no-top-bar') @section('content')



<header class="live-header">
  <div class="mw6 m-auto flex items-center pl15p justify-between top__header pl-15 pr15 ">

    <span class="back-arrow dib">
      <a onclick="window.history.back()" class="dib">
      {{Helper::read_svg("img/svg/times.svg")}}   
      </a>
    </span>

      <span class="header-title live-title">
            Published ({{count($published)}})
      </span>

        <button class="pointer published-edit edit">Edit</button>

      <div class="published-select-all pointer">
        <span class="span-checkbox"></span>
        <button class="pointer">
          Select All
        </button>
      </div>

      <div class="published-delete pointer">
      {{Helper::read_svg("img/svg/trash.svg")}}   
        <button> Delete </button>
      </div>

      <button class="published-cancel pointer cancel_edit">
        Cancel
      </button>

  </div>
</header>








<main class="pl-15 mw6 m-auto live-main published-main pl15p pr15p">





<!-- <div class="confirmation-modal">
  <div class="confirmation-modal__overlay standard-overlay"></div>
  <div class="confirmation-modal__modal">
    <h2>Confirm Deletion</h2>
    <p>Any distributed points provided by these questions will be removed from the affiliated accounts. These can no longer be retrieved or Publicly viewable.</p>
    <div class="flex">
      <div class="flex1"></div>
      <button class="confirmation-modal__cancel">Cancel</button>
      <button class="confirmation-modal__danger">Delete</button>
    </div>
  </div>
</div> -->






 @foreach ($published as $key => $val)

  <div class="q-bubble-container q-bubble-container--clickable  mb15p " data-id="{{$val['question']->id}}">
    <span class="edit-square">
    {{Helper::read_svg("img/svg/square.svg")}}   

    </span>
    <span class="edit-square-checked">
    {{Helper::read_svg("img/svg/check.svg")}}   

    </span>

    <div class="q-bubble qa-item ">
      <div>
        <span>  {{$val['question']->question}}</span>
      </div>
      <div class="qa-item__seperator"></div>
      @if(!is_null($val['answer']))
      <span>	{{$val['answer']->answer}}</span>
                                        	  @endif
    </div>

  </div>

 @endforeach



  <div class="confirmation-modal">
    <div class="confirmation-modal__overlay standard-overlay"></div>
    <div class="confirmation-modal__modal">
      <h2>Confirm Deletion</h2>
      <p>Any distributed points provided by these questions will be removed from the affiliated accounts. These can no longer be retrieved or Publicly viewable.</p>
      <div class="flex">
        <div class="flex1"></div>
        <button class="confirmation-modal__cancel">Cancel</button>
        <button class="confirmation-modal__danger">Delete</button>
      </div>
    </div>
  </div>




</main>






@endsection

<!-- Push a style dynamically from a view -->
@push('styles') @endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
<script src="{{ asset('js/question.index.js') }}"></script>
@endpush
