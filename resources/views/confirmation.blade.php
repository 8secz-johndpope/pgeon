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
                                      

                                        <div class="alert alert-{{$class}}">
                                            {{$message}}
                                        </div>    

                                       </div>
                                  </li>
                              </ul>
                          </div>

              
                    </div>
            </div>
        </div>





@endsection


