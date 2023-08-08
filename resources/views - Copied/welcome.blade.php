@extends('layouts.auth')
@section('log')
{{-- <hr> --}}
                    <div >
                        <button type="submit" class="au-btn au-btn--block au-btn--dark m-b-20 bg-dark">
                            <a style=" text-decoration: none; color: white" href="{{ route('user.login') }}">Se Connecter</a>
                        </button>
                    </div>
                    <br>
                    <div >
                        <button type="submit" class="au-btn au-btn--block au-btn--dark m-b-20 bg-dark">
                            <a style=" text-decoration: none; color: white" href="{{ route('user.register') }}">S'inscrire</a>
                        </button>
                    </div>
                        <a href="{{ route('admin.login') }}" style="border-top: none; color: white; font-family: SFProText-Regular, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; padding-top: 0;">
                            Se connecter en tant qu'administrateur.
                        </a>
                        {{-- #63c76a --}}
@endsection
    


{{-- 
@if (Route::has('user.login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('user.login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('user.register'))
                            <a href="{{ route('user.register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
@endif --}}