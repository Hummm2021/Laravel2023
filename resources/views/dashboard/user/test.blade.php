@extends('layouts.app')
@section('snake')
@include('layouts.overview')
<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between">
        <button type="submit" class="btn btn-dark" >
            <a style=" text-decoration: none; color: white" href="{{ route('user.create-ticket') }}">Créer</a>
        </button>
        <form class="form-header" action="" method="POST">
            <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
            <button class="au-btn--submit bg-dark" type="submit">
                <i class="zmdi zmdi-search"></i>
            </button>
        </form>
    </div>
    <div class="card-body">
        {{-- <ul class="list-group">            
            <li class="list-group-item"></li>
        </ul> --}}
        <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Type de demande</th>
                <th scope="col">Contenu de la demande</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                @if (Auth::user()->email==$ticket->author_email)
                <tr>
                    <th scope="row">{{ $ticket->id }}</th>
                    <td>{{ $ticket->title }}</td>
                    <td>{{ $ticket->content }}</td>
                    <td>
                        <a href="{{ route('user.show-ticket', $ticket->id) }}" class="btn btn-dark">voir</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>


        {{-- <table>
            <thead>
                <tr>
                    <th>Colonne 1</th>
                    <th>Colonne 2</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <td></td>
                @endforeach
            </tbody>
        </table> --}}
    
    </div>
</div>
@endsection


