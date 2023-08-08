@extends('layouts.app')
@section('snake')
<div class="card">
    <div class="card-header">
        Ticket #{{ $ticket->id }}
        
    </div>
    

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Type de demande
                    </th>
                    <td>
                        {{ $ticket->title }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Contenu de la demande
                    </th>
                    <td>
                        {!! $ticket->content !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        Statut
                    </th>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <th>
                        Nom de l'auteur
                    </th>
                    <td>
                        {{ $ticket->author_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Email de l'auteur
                    </th>
                    <td>
                        {{ $ticket->author_email }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Commentaire
                    </th>
                    <td>
                        
                            <div class="row">
                                <div class="col">
                                    <p>Il n'y a pas de commentaire.</p>
                                </div>
                            </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <form >
            @csrf
            <div class="form-group">
                <label for="comment_text">Faire un commentaire</label>
                <textarea class="form-control @error('comment_text') is-invalid @enderror" id="comment_text" name="comment_text" rows="3" required></textarea>
                @error('comment_text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark">commenter</button>
            {{-- <div type="reset" class="btn btn-danger" style="justify-content: flex-end">Supprimer</div> --}}
        </form>
    </div>
</div>
@endsection
