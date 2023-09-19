@if (Auth::guard('admin')->check())    
@extends('layouts.app')
@section('navbar')
{{-- code ici --}}
@endsection
@endif