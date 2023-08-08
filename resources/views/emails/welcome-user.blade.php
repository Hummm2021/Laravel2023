<x-mail::message>
# Nouvelle Inscription

L'utilisateur Utilisateur vient de s'inscrire avec l'email user@example.com

Cordialement,<br>
{{ config('app.name') }}
</x-mail::message>

{{-- L'utilisateur {{Auth::guard('web')->user()->name}} vient de s'inscrire avec l'email {{Auth::guard('web')->user()->email}}. --}}
