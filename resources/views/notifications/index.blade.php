@extends('layouts.app-no-top-bar')
@section('content')


    <div class="container m-t-10">
            <div class="row">
                <div class="col-md-12">
                            <div class="h3 m-b-5">Notifications
                              <button class="btn-sm btn-link p-x-0 text-uppercase">Clear all</button>
                              <span class="bubble badge pull-right m-x-sm" style="margin-top: 5px;">0</span>
                          </div>
                 <notifications></notifications>
                </div>
            </div>
        </div>


        





@endsection



<!-- Push a script dynamically from a view -->
@push('scripts')
    <script src="{{ asset('js/question.index.js') }}"></script>
@endpush
