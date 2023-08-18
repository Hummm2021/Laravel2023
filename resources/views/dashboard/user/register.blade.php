{{-- @extends('layouts.auth')
@section('log')
    <h4 style="color: white">Inscription Utilisateur</h4><hr>
    <form action="{{ route('user.create') }}" method="POST">
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif
        @csrf
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="au-input au-input--full" name="name" placeholder="Entrez votre adresse Nom" value="{{ old('name') }}">                         
            <span class="text-danger">@error('name'){{ $message }} @enderror</span>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="au-input au-input--full" name="email" placeholder="Entrez votre adresse Email" value="{{ old('email')}}">                         
            <span class="text-danger">@error('email'){{ $message }} @enderror</span>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="text" class="au-input au-input--full" name="password" placeholder="Entrez votre Mot de Passe" value="{{ old('password')}}">
            <span class="text-danger">@error('password'){{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <label for="cpassword">Confirmer Mot de passe</label>
            <input type="text" class="au-input au-input--full" name="cpassword" placeholder="Confirmez votre Mot de Passe" value="{{ old('cpassword')}}">
            <span class="text-danger">@error('cpassword'){{ $message }} @enderror</span>
        </div>

        <div class="form-group">
            <button type="submit" class="au-btn au-btn--block au-btn--green m-b-20 bg-dark">S'inscrire</button>
        </div>
        <br>
        <div class="register-link">
            <p>
                Vous avez déjà un compte?
                <a href="{{ route('user.login') }}">Se connecter</a>
            </p>
        </div>                
    </form>
@endsection --}}


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
        <h2 class="cta-1 text-primary">vous pouvez vous inscrire!</h2>
      </div>
      <div class="mb-5">
        <p class="h6">
          Si vous êtes déjà inscrit, veuillez
          <a href="{{ route('user.login') }}">vous connecter</a>.
        </p>
      </div>
      <div>
        <form action="{{ route('user.create') }}" method="POST" >
            @csrf
            <div class="mb-3 filled form-group tooltip-end-top">
              <i data-acorn-icon="user"></i>
              <input class="form-control" placeholder="Nom" name="name" value="{{ old('name')}}"/>
            </div>
            <div class="mb-3 filled form-group tooltip-end-top">
              <i data-acorn-icon="user"></i>
              <input class="form-control" placeholder="Prénom" name="surname" value="{{ old('surname')}}"/>
            </div>
            <div class="mb-3 filled form-group tooltip-end-top">
              <i data-acorn-icon="email"></i>
              <input class="form-control" placeholder="Email" name="email" value="{{ old('email')}}"/>
            </div>
            <div class="mb-3 filled form-group tooltip-end-top">
              <i data-acorn-icon="lock-off"></i>
              <input class="form-control" name="password" type="password" placeholder="Mot de passe" value="{{ old('password')}}"/>              
            </div>
            <div class="mb-3 filled form-group tooltip-end-top">
                <i data-acorn-icon="lock-on"></i>
                <input class="form-control" name="cpassword" type="password" placeholder="Confirmer Mot de passe" value="{{ old('cpassword')}}"/>                
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
    </div>
  </div>
</div>
@endsection