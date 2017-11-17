<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Profil - Kinimi</title>
    <link rel="stylesheet" href="{{ asset("css/global.css") }}">
  </head>
  <body>
    <h1>Profil</h1>

    @if (Route::has('login'))
      @auth
      <p>Bienvenue {{ Auth::user()->name }}</p>
      @else
      <p>Erreur, vous n'êtes pas connecté.</p>
      @endauth
    @endif

    <a href="{{ route("home") }}">Retour à l'accueil</a>
  </body>
</html>
