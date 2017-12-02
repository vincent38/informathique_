<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name', '') }} - Page d'accueil</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.css")}}">
    <link rel="stylesheet" href="{{ asset("css/home.css") }}">
  </head>
  <body>

    <header>
      <img class="header-logo" src="/img/logo64.png" alt="logo">
      <h1 class="header-title">{{ config('app.name', '') }}</h1>

      <div class=" pull-right header-profil">
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
      </div> <!-- header-profil -->

      <!--<a href="/public/uzerdsqzesfzeqiznkeuuuuuu">Mauvaise page (juste pour tester l'erreur 404)</a>-->



    </header>

    @yield ('site')

  </body>
</html>
