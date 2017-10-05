@extends('layouts.app')
@section('content')


    <div class="container p-t-md">
            <div class="row">
                <div class="col-md-12" style="margin-top:10px">
                    <ul class="list-group media-list media-list-stream">
                        <li class="media list-group-item p-a">
                            <h3 style="margin-top:0px"><span class="badge pull-right">                        <span class="bubble badge">0</span>
                            </span>
                Notifications</h3>
                        </li>
                      </ul>  
                        
                 <notifications></notifications>
                </div>
            </div>
        </div>


        





@endsection



<!-- Push a script dynamically from a view -->
@push('scripts')
    <script src="{{ asset('js/question.index.js') }}"></script>
@endpush
