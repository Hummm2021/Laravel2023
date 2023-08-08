@extends('layouts.app')
@section('content')
    <h4>Tickets</h4>
    <button type="submit" class="btn btn-primary">
        <a style=" text-decoration: none; color: white" href="{{ route('tickets.create') }}">Se Connecter</a>
    </button>
@endsection