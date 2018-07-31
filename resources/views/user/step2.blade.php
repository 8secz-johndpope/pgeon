@extends('layouts.app-no-top-bar', ['back' => false])
@section('content')


     <div class="display-name-section mt50p">
     <form enctype="multipart/form-data" action="/profile" method="POST" class="m-x-auto text-center app-login-form">
                   {{ csrf_field() }}
            <div class="pl-20 pr-20 tc">
                <div class="dn-top mb30p">
                    <h1 class="m0 mb10p">🎉 🎊</h1>
                    <p class="m0">Yay! Glad to have you with us. <br>What should we call you?</p>
                </div>

                <div class="dn-form">
                      <div class="pgn-textfield mb15p">
                        <input class="pgn__input azure-caret" type="text" id="sample3"  name="name"  value="{{ old('name') }}">
                        <label class="pgn__label" for="sample3">Display Name</label>
                      </div>
                      <input class="pg-btn pointer btn-submit mb20p" type="submit" name="submit" value="Finish">
                      <input type="hidden" name="step2" value="1" />

                   
                </div>

                <div class="skip-step">
                    <a href="{{$skip_url}}">Skip this step</a>
                </div>
            </div>
            </form>
        </div>






@endsection
