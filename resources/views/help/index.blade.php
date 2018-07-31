@extends('layouts.app-back-title',['title' => 'Help & About', $back= '/', $save_id='save-account'])

@section('content')
        
        

        <main class="preferences-main">
    <ul class="ul-ls ">
     
        <li>
          <a href="/terms-of-service" class="mw6 m-auto pl15 pr15">
            <span>Terms of Service</span>
            {{Helper::read_svg("img/svg/chevron-right.svg") }}
          </a>

          
          <span  class="m-auto mw6 db">
              <div class="border-trimmed"></div>
            </span>
         
        </li>
        <li>
          <a href="/privacy-policy" class="mw6 m-auto pl15 pr15">
            <span>Privacy Policy</span>
            {{Helper::read_svg("img/svg/chevron-right.svg") }}
          </a>

            
            <span  class="m-auto mw6 db">
              <div class="border-trimmed"></div>
            </span>
        </li>
        <li>
          <a href="/send-feedback" class="mw6 m-auto pl15 pr15">
            <span>Send Feedback</span>
            {{Helper::read_svg("img/svg/chevron-right.svg") }}
          </a>

          
            
          <span  class="m-auto mw6 db">
              <div class="border-trimmed"></div>
            </span>
        </li>
        <li>
          <a href="/help" class="mw6 m-auto pl15 pr15">
            <span>Help</span>
            {{Helper::read_svg("img/svg/chevron-right.svg") }}
          </a>

          
        </li>
    </ul>
  </main>


@endsection


