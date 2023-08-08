@extends('layouts.auth')
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
        {{-- <a href="{{ route('user.login') }}">J'ai déjà Un Compte</a> --}}
        <div class="register-link">
            <p>
                Vous avez déjà un compte?
                <a href="{{ route('user.login') }}">Se connecter</a>
            </p>
        </div>                
    </form>
@endsection