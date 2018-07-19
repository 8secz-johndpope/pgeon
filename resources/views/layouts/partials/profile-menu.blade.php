@if (Auth::check())
    <div class="slide-menu__outer">
    <aside class="slide-menu upperbg__color">
        <div class="mw6 m-auto">
        <header>
            <span class="slide-menu__close pointer">
            {{Helper::read_svg("img/svg/times.svg")}}  
            </span>
        </header>
        @if (Auth::user()->role_id)
            <div class="ml15p mt15p menu-pro-parent">
                <span class="menu-pro-indicator fc">
                <span>PRO</span>
                </span>
            </div>
         @endif   
        <div class="profile-preview mt15p">
            <div class="profile-preview__avatar">
            <a href="user/my-profile">
                <img src="http://via.placeholder.com/80x80" >
            </a>
            <span class="profile-prefiew__change-avatar fc pointer">
            {{Helper::read_svg("img/svg/camera.svg")}}  
            </span>
            </div>
            <h1>Myra Barnett</h1>
            <div class="profile-url">
            <a href="user/my-profile">
                <p class="m0 flex">
                <span class="flex1">www.pgeon.com/</span>
                <input class="user-slug-input" value="{{Helper::name_or_slug(Auth::user())}}" disabled>
                </p>
            </a>
            <span class="edit-icon">
                <div class="edit-icon-pencil">
                {{Helper::read_svg("img/svg/pencil.svg")}}  

                </div>
                <div class="edit-icon-times">
                {{Helper::read_svg("img/svg/times.svg")}}  
                </div>
            </span>
            </div>
        </div>
        </div>
    <div class="pt24p">
        <ul class="ul-ls ">

            <li>
            <a href="my-account" class="mw6 m-auto pl15 pr15">
                <span>My Account</span>
                {{Helper::read_svg("img/svg/chevron-right.svg")}}  
                
            </a>
                <span  class="m-auto mw6 db">
                <div class="border-trimmed"></div>
                </span>
            </li>


        <li>
            <a href="my-account" class="mw6 m-auto pl15 pr15">
                <span>Preferences</span>
                {{Helper::read_svg("img/svg/chevron-right.svg")}}  
                
            </a>
                <span  class="m-auto mw6 db">
                <div class="border-trimmed"></div>
                </span>
            </li>

    <li>
            <a href="my-account" class="mw6 m-auto pl15 pr15">
                <span>Membership</span>
                {{Helper::read_svg("img/svg/chevron-right.svg")}}  
                
            </a>
                <span  class="m-auto mw6 db">
                <div class="border-trimmed"></div>
                </span>
            </li>

            <li>
            <a href="my-account" class="mw6 m-auto pl15 pr15 no-bb">
                <span>Help & About</span>
                {{Helper::read_svg("img/svg/chevron-right.svg")}}  
                
            </a>
                <span  class="m-auto mw6 db">
                <div class="border-trimmed"></div>
                </span>
            </li>


            <li class="ul-ls--last">
            <a  class="mw6 m-auto pl15 pr15" onclick="event.preventDefault();   document.getElementById('logout-form').submit();"> <span>Logout</span></a>

           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                             {{ csrf_field() }}
                                         </form>
                                         
            <span  class="m-auto mw6 db">
                <div class="border-trimmed"></div>
            </span>
            </li>
        </ul>
    </div>
    </aside>
        

    <div class="select-image">
    <div class="select-image__overlay standard-overlay"></div>
    <div class="select-image__inner  mw6 m-auto">
        <div class="select-image__header">
        <span></span>
        <h3>Change Profile Photo</h3>
        {{Helper::read_svg("img/svg/times.svg")}} 
        </div>
        <div class="select-image__body">
        <div class="select-image__item select-image__item--fb">
        {{Helper::read_svg("img/svg/facebook.svg")}} 
            <h3>Import From Facebook</h3>
        </div>
        <div class="select-image__seperator"></div>

        <div class="select-image__item select-image__item--google">
        {{Helper::read_svg("img/svg/google.svg")}} 
            <h3>Import from Google</h3>
        </div>
        <div class="select-image__seperator"></div>

        <div class="select-image__item select-image__item--camera">
        {{Helper::read_svg("img/svg/camera.svg")}} 
            <h3>Take Photo</h3>
        </div>
        <div class="select-image__seperator"></div>
        <div class="select-image__item select-image__item--image">
        {{Helper::read_svg("img/svg/image.svg")}} 

            <h3>Choose from Library</h3>
        </div>
        </div>
    </div>
    </div>

    </div>
@endif
