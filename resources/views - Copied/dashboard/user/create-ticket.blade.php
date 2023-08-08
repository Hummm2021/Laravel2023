@extends('layouts.app')

@section('snake')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            {{-- @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {!! session('status') !!}
                </div>
            @endif --}}
            <div class="card">
                    <div class="card-header">Ajouter un ticket</div>
                <div class="card-body">
                    <form action="{{ route('user.post-create-ticket') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group row">
                            <label for="author_name" class="col-md-4 col-form-label text-md-right">Votre Nom</label>

                            <div class="col-md-6">
                                <input id="author_name" type="text" class="form-control @error('author_name') is-invalid @enderror" name="author_name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>
                                @error('author_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author_email" class="col-md-4 col-form-label text-md-right">Votre Email</label>

                            <div class="col-md-6">
                                <input id="author_email" type="email" class="form-control @error('author_email') is-invalid @enderror" name="author_email" value="{{ Auth::user()->email }}" required autocomplete="email">
                                @error('author_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Type de demande</label>

                            <div class="col-md-6">
                                {{-- <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title"> --}}

                                <select id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                                    @foreach($TypesDeDemandes as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                    @endforeach
                                    <option value="autre">Autre</option>
                                </select>
                                {{-- <input type="text" name="valeur_personnalisee" id="valeur_personnalisee" placeholder="Saisir une valeur personnalisée"> --}}
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3" required>{{ old('content') }}</textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 bg-red" >
                                <button type="submit" class="btn btn-dark">
                                    Créer
                                </button>
                                {{-- @if ($save)
                                    
                                @endif --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection