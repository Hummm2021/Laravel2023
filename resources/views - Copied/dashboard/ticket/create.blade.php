@extends('layouts.app')
@section('content')
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px">
                <h4>Créer Ticket</h4><hr>
                <form method="">
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control" name="title" placeholder="Titre" value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Description" value="{{ old('description') }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">créer</button>
                    </div>
                    <br>
                    {{-- <a href="{{ route('user.register') }}">Créer un Nouveau Compte</a> --}}
                </form>
            </div>
        </div>
    </div>
</body>
@endsection
{{-- créer ticket
    modifier ticket
    supprimer --}}