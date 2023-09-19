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
          <form action="{{ route('user.check') }}" method="POST">
              @if (Session::get('success'))
              <div class="alert text-center alert-success alert-sm" style="font-size: 10px; text-align: center">
                {{ Session::get('success') }}
              </div>
              @elseif (Session::get('fail'))
                  <div class="alert text-center alert-danger p-1">
                    {{ Session::get('fail') }}
                  </div>
              @endif
              @csrf
              {{-- <form id="loginForm" class="tooltip-end-bottom" novalidate> --}}
              <div class="mb-3 filled form-group tooltip-end-top">
              <i data-acorn-icon="email"></i>
              <input class="form-control" placeholder="Email" type="email" id="email" name="email" value="{{ old('email') }}"/>
              @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              </div>
              
              <div class="mb-3 filled form-group tooltip-end-top">
              <i data-acorn-icon="lock-off"></i>
              <input class="form-control pe-7" id="password" name="password" type="password" placeholder="mot de passe" />
              <a class="text-small position-absolute t-3 e-3" href="#">oublié?</a>
              @error('password')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              </div>
              <button type="submit" class="btn btn-lg btn-primary">Se connecter</button>              
              {{-- <div class="mb-3 filled form-group tooltip-end-top">
                <a href="{{ route('admin.login') }}" style="border-top: none; font-family: SFProText-Regular, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; padding-top: 0;">
                  Se connecter en tant qu'administrateur.
                </a>
              </div> --}}
          </form>          
      </div>

      <div class="mb-5">
        <p class="h6">
          Si vous n'êtes pas déjà inscrit, veuillez
          <a href="{{ route('user.register') }}">vous inscrire</a>.
        </p>
      </div>
    </div>
  </div>
</div>
@endsection