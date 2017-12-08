<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name', '') }} - Page d'accueil</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.css")}}">
    <link rel="stylesheet" href="{{ asset("css/master.css") }}">
    <link rel="stylesheet" href="{{ asset("css/mathematiques.css") }}">
  </head>
  <body>
    <header>
      <div id="mainHeader">

        <a href="{{ route("mathematiques") }}">Retour au menu Mathématiques</a>
      </div> <!-- #mainHeader -->
      @if (Route::has('login'))
        @auth
        @else
          <div class="alert alert-danger">Attention, tu n'es pas connecté. Tu peux jouer sans compte, mais tu ne pourras pas sauvegarder ta progression. Pour accéder à toutes les fonctionnalités de {{ config('app.name', '') }}, <a href="{{ route('login') }}">connecte-toi</a> ou <a href="{{ route('register') }}">crée un compte</a> maintenant.</div>
        @endauth
      @endif
    </header>


    <div id="content">
      @yield ('site')
    </div>

  </body>
</html>
