@extends('layouts.auth')
@section('log')
    <h4 style="color: white">Connexion Utilisateur</h4><hr>
    <form action="{{ route('user.check') }}" method="POST" autocomplete="off">
        @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif
        @csrf
        <div class="form-group">
            <input type="text" class="au-input au-input--full" name="email" placeholder="Entrez votre adresse Email" value="{{ old('email') }}">
            <span class="text-danger">@error('email'){{ $message }} @enderror</span>
        </div>

        <div class="form-group">
            <input type="text" class="au-input au-input--full" name="password" placeholder="Entrez votre Mot de Passe" value="{{ old('password') }}">
            <span class="text-danger">@error('password'){{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <button type="submit" class="au-btn au-btn--block au-btn--dark m-b-20 bg-dark">Se Connecter</button>
        </div>
        <br>
        {{-- <a href="{{ route('user.register') }}">Créer un Nouveau Compte</a> --}}
        
        <div class="register-link">
            <p>
                Vous n'avez pas de compte?
                <a href="{{ route('user.register') }}">S'inscrire</a>
            </p>
        </div>
                                    {{-- <form action="" method="post">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="login-checkbox">
                        <label>
                            <input type="checkbox" name="remember">Remember Me
                        </label>
                        <label>
                            <a href="#">Forgotten Password?</a>
                        </label>
                    </div>
                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                    <div class="social-login-content">
                        <div class="social-button">
                            <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                            <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                        </div>
                    </div>
                </form> --}}
    </form>
@endsection