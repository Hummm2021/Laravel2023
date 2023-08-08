@extends('layouts.authentificate')
@section('content')
<div class="col-12 col-lg-auto h-100 pb-4 px-4 pt-0 p-lg-0">
  <div class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
    <div class="sw-lg-50 px-5">
      <div class="sh-11">
        <a href="#">
          <div class="logo-default"></div>
        </a>
      </div>
      <div class="mb-5">
        <h2 class="cta-1 mb-0 text-primary">Bienvenue,</h2>
        <h2 class="cta-1 text-primary">vous pouvez vous authentifier!</h2>
      </div>
      <div class="mb-5">
        <p class="h6">
          Si vous n'êtes pas déjà inscrit, veuillez
          <a href="{{ route('user.register') }}">vous inscrire</a>.
        </p>
      </div>
      <div>
          <form action="{{ route('user.check') }}" method="POST">
              @csrf
              {{-- <form id="loginForm" class="tooltip-end-bottom" novalidate> --}}
              <div class="mb-3 filled form-group tooltip-end-top">
              <i data-acorn-icon="email"></i>
              <input class="form-control" placeholder="Email" name="email" />
              </div>
              <div class="mb-3 filled form-group tooltip-end-top">
              <i data-acorn-icon="lock-off"></i>
              <input class="form-control pe-7" name="password" type="password" placeholder="mot de passe" />
              <a class="text-small position-absolute t-3 e-3" href="#">oublié?</a>
              </div>
              <button type="submit" class="btn btn-lg btn-primary">Se connecter</button>              
              {{-- <div class="mb-3 filled form-group tooltip-end-top">
                <a href="{{ route('admin.login') }}" style="border-top: none; font-family: SFProText-Regular, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; padding-top: 0;">
                  Se connecter en tant qu'administrateur.
                </a>
              </div> --}}
          </form>          
      </div>
    </div>
  </div>
</div>
@endsection