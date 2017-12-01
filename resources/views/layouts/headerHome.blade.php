<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name', '') }} - Page d'accueil</title>
    <link rel="stylesheet" href="{{ asset("css/home.css") }}">
    <link rel="stylesheet" href="{{ asset("css/bootstrap.css")}}">
  </head>
  <body>

    <header>

      @if (Route::has('login'))
        @auth
          <p>Bienvenue {{ Auth::user()->name }} -
          <a href="{{ route("profil") }}">Profil</a> -
          <a href="{{ route("logout") }}">Se déconnecter</a></p>
        @else
          <p>Vous n'êtes pas connecté -
          <a href="{{ route('login') }}">Se connecter</a> -
          <a href="{{ route('register') }}">S'inscrire</a></p>
        @endauth
      @endif

      <!--<a href="/public/uzerdsqzesfzeqiznkeuuuuuu">Mauvaise page (juste pour tester l'erreur 404)</a>-->

      <h1>{{ config('app.name', '') }}</h1>

    </header>

    @yield ('site')

  </body>
</html>
