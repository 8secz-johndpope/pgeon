@extends('layouts.app-no-logo')

@section('content')
<div class="upgrade-modal upgrade-modal--visible"><div class="modal-overlay standard-overlay"></div> <div class="center-modal m-auto"><div class="upgrade-modal__top"><div class="super-power__container"><img src="/img/super-power.png" class="super-power"></div> <p>Unleash the Power, <span>Go Pro!</span></p></div> <div class="upgrade-modal__body"><h4 class="upgrade-modal__body-header">With Pro, you can</h4> <ul class="upgrade-modal__perks"><li>Use our dynamic polling system to interact with fans/followers.</li> <li>Retain full control over what’s published.</li> <li>Get notified and stay updated.</li> <li>Gather advice from like-minded people.</li></ul> <a href="/membership" class="upgrade-modal__button">
        Upgrade to Premium for $5/mo
      </a></div></div></div>

@endsection
