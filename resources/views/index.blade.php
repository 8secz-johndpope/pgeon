@extends('layouts.app')
@section('content')
   <div class="container">
       <div class="hidden-xs hidden-sm col-md-3">
           @if (Auth::id())
               <div class="panel panel-default">
                   <div class="panel-body">
                       <ul class="sidebar-nav sidebar-divider">
                           <li><a href="/user/{{Auth::id()}}/questions" title="My Questions"><i class="fa fa-lightbulb-o" style="color: #4285F4;"></i> <strong>My Questions</strong></a></li>
                           <li><a href="/user/{{Auth::id()}}/answers" title="My Answers"><i class="fa fa-bullhorn" style="color: #4285F4;"></i> <strong>My Answers</strong></a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="/question/ask">ASK </a></a>
                        </li>
                       </ul>
                       <ul class="sidebar-nav sidebar-divider">
                           <li><a href="/questions/top"><i class="fa fa-fire" style="color: #4285F4;"></i> Top Questions</a></li>
                           <li><a href="/questions/new"><i class="fa fa-lightbulb-o" style="color: #4285F4;"></i> New Questions</a></li>
                       </ul>
                   </div>
               </div>
           @endif
       </div>
       <div class="col-md-9">
           @if ( Auth::guest() AND !app('request')->input('page') )
               <div class="row">
                   <div class="col-md-12">
                       <div class="panel panel-default">
                           <div class="panel-body">
                               <div id="questions">
                                   <legend class="text-left">Pgeon</legend>
                               </div>
                            Coming soon...
                           </div>
                       </div>
                   </div>
               </div>
           @endif
           <div class="row">
               <div class="col-md-12">
                   <div class="panel panel-default">
                       <div class="panel-body">
                           <div id="questions">
                               <legend class="text-left">Recent Questions</legend>
                           </div>
                           @foreach( $questions as $question )
                               @include('containers.question')
                               <hr>
                           @endforeach
                           {{ $questions->links() }}
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
