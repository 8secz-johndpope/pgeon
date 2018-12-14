@extends('layouts.app-back-title',['title' => 'Preferences', $back= '/'])

@section('content')


<main class="preferences-main">

<section class="preferences-section mb20p ">
  <h2 class="preferences-section__header pl15 mw6">Notifications</h2>

  <div class="preferences-section__item">
    <div class="mw6 m-auto">

      <span>When someone I follow posts a question</span>

      <input type="checkbox" class="switch-toggle-input dn" id="when-follwed-post"  {{$someone_i_followed_posted == 1 ? 'checked':''}}>
      <label class="switch-toggle" for="when-follwed-post">
        <span class="switch-toggle__inner"></span>
      </label>

    </div>
    <span  class="m-auto mw6 db">
      <div class="border-trimmed"></div>
    </span>
  </div>

  <div class="preferences-section__item">
    <div class="mw6 m-auto">
      <span>When my submitted response is selected</span>

      <input type="checkbox" class="switch-toggle-input dn" id="when-submitted-selected" {{$my_response_selected == 1 ? 'checked':''}}>
      <label class="switch-toggle" for="when-submitted-selected">
        <span class="switch-toggle__inner"></span>
      </label>

    </div>
    <span  class="m-auto mw6 db">
      <div class="border-trimmed"></div>
    </span>
  </div>

  <div class="preferences-section__item">
    <div class="mw6 m-auto">
      <span>When my response receives points</span>


      <input type="checkbox" class="switch-toggle-input dn" id="when-respoonse-recieve-points" {{$my_response_got_points == 1 ? 'checked':''}}>
      <label class="switch-toggle" for="when-respoonse-recieve-points">
        <span class="switch-toggle__inner"></span>
      </label>

    </div>
    <span  class="m-auto mw6 db">
      <div class="border-trimmed"></div>
    </span>
  </div>
</section>

<section class="preferences-section mb20p ">
  <h2 class="preferences-section__header pl15 mw6">Emails</h2>
  <div class="preferences-section__item">
    <div class="mw6 m-auto">
      <span>For Pgeon News and Updates</span>

      <input type="checkbox" class="switch-toggle-input dn" id="news-updates" {{$subscribed_to_newsletter == 1 ? 'checked':''}}>
      <label class="switch-toggle" for="news-updates">
        <span class="switch-toggle__inner"></span>
      </label>

    </div>
    <span  class="m-auto mw6 db">
      <div class="border-trimmed"></div>
    </span>
  </div>

  <div class="preferences-section__item">
    <div class="mw6 m-auto">
      <span>For all monthly/annual billing receipts </span>


      <input type="checkbox" class="switch-toggle-input dn" id="monthy-annual-billing" {{$email_receipts == 1 ? 'checked':''}}>
      <label class="switch-toggle" for="monthy-annual-billing">
        <span class="switch-toggle__inner"></span>
      </label>

    </div>
    <span  class="m-auto mw6 db">
      <div class="border-trimmed"></div>
    </span>
  </div>
</section>
</main>





@endsection
