@extends('layouts.app-profile-iframe')
@section('content')



<main class=" m-auto avatar-container profile-details-container pl15 pr15">


            <div class="profile-preview__avatar">
            <input type="hidden" id="name_or_slug" value="{{Helper::name_or_slug(Auth::user())}}" />
            <a href="{{Auth::user()->slug}}">
                <avatar src="{{ Helper::avatar(Auth::user()->avatar) }}" :size="80" username="{{Helper::name_or_slug(Auth::user())}}"></avatar>

            </a>
            <div class="profile_upload">

</div>
            <button class="btn pr-loading dn"><span class="fa fa-spinner fa-spin"></span>
                                    Updating</button>
                                    
            <span class="profile-prefiew__change-avatar fc pointer">
            {{Helper::read_svg("img/svg/camera.svg")}} 
            

           

           <form name="frm_avatar" id="frm_avatar" action="/profile" method="POST" enctype="multipart/form-data">
                                             {{ csrf_field() }}
                                             <input type="file" id="file-avatar" name="avatar" />

                                         </form> 
           
            </span>
            </div>





</main>




@endsection



