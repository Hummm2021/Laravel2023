@extends('layouts.authentificate')
@section('content')
<div class="col-12 col-lg-auto h-100 pb-4 px-4 pt-0 p-lg-0">
  <div class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
    <div class="sw-lg-50 px-5">
      <div class="sh-10 mb-5 px-7" style="margin-left: 0px;">
        <a href="#">
          {{-- <div class="logo-default"></div> --}}
          <img src="{{asset('acorn/img/logo/logo-green-dark.png')}}" class="img-fluid"  alt="logo" />
        </a>
      </div>
      <div class="mb-5">
        <h2 class="cta-1 mb-0 text-primary">Bienvenue,</h2>
        <h2 class="cta-1 text-primary">vous pouvez vous connecter!</h2>
      </div>
      
      <div class="mb-3">
        <form action="{{ route('admin.check') }}" method="POST">
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
          </form>
      </div>

      <div class="mb-5">
        <p class="h6">
          Si vous n'êtes pas membre, veuillez
          <a href="#">vous inscrire</a>.
        </p>
      </div>
    </div>
  </div>
</div>
@endsection