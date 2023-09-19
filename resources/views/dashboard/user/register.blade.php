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
        <h2 class="cta-1 text-primary">vous pouvez vous inscrire!</h2>
      </div>
      
      <div class="mb-3">
        <form action="{{ route('user.create') }}" method="POST" >
            @if (Session::get('success'))
                <div class="alert text-center alert-success">
                  <span>{{ Session::get('success') }}</span>
                </div>
            @elseif (Session::get('fail'))
                <div class="alert text-center alert-danger p-1">
                  {{ Session::get('fail') }}
                </div>
            @endif
            @csrf
            <div class="mb-3 filled form-group tooltip-end-top">
              <i data-acorn-icon="user"></i>
              <input class="form-control" placeholder="Nom" name="name" value="{{ old('name')}}"/>
              @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3 filled form-group tooltip-end-top">
              <i data-acorn-icon="user"></i>
              <input class="form-control" placeholder="Prénom" name="surname" value="{{ old('surname')}}"/>
              @error('surname')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3 filled form-group tooltip-end-top">
              <i data-acorn-icon="email"></i>
              <input class="form-control" placeholder="Email" name="email" value="{{ old('email')}}"/>
              @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3 filled form-group tooltip-end-top">
              <i data-acorn-icon="lock-off"></i>
              <input class="form-control" name="password" type="password" placeholder="Mot de passe" value="{{ old('password')}}"/>              
              @error('password')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3 filled form-group tooltip-end-top">
                <i data-acorn-icon="lock-on"></i>
                <input class="form-control" name="cpassword" type="password" placeholder="Confirmer Mot de passe" value="{{ old('cpassword')}}"/>                
                @error('cpassword')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>            

            {{-- <div class="mb-3 position-relative form-group">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="registerCheck" name="registerCheck" />
                <label class="form-check-label" for="registerCheck">
                  I have read and accept the
                  <a href="index.html" target="_blank">terms and conditions.</a>
                </label>
              </div>
            </div> --}}
            <button type="submit" class="btn btn-lg btn-primary">S'inscrire</button>
          </form>
      </div>

      <div class="mb-5">
        <p class="h6">
          Si vous êtes déjà inscrit, veuillez
          <a href="{{ route('user.login') }}">vous connecter</a>.
        </p>
      </div>
    </div>
  </div>
</div>
@endsection