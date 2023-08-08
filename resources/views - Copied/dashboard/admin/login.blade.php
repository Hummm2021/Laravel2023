@extends('layouts.auth')
@section('log')
            <h4>Connexion Admin</h4><hr>
            <form action="{{ route('admin.check') }}" method="POST" {{--autocomplete="off"--}}>
                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>                        
                @endif
                @csrf 
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="au-input au-input--full" name="email" placeholder="Entrez votre adresse Email" value="{{ old('email') }}">
                    <span class="text-danger">@error('email'){{ $message}}@enderror</span>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="text" class="au-input au-input--full" name="password" placeholder="Entrez votre Mot de Passe" value="{{ old('password')}}">
                    <span class="text-danger">@error('password'){{ $message}}@enderror</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="au-btn au-btn--block au-btn--green m-b-20">Se Connecter</button>
                </div>
            </form>
@endsection