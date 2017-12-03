<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name', '') }} - Page d'accueil</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.css")}}">
    <link rel="stylesheet" href="{{ asset("css/master.css") }}">
    <link rel="stylesheet" href="{{ asset("css/mathinfo.css") }}">
  </head>
  <body>
    <div class="banniere">
      <a href="{{ route("home") }}">
        <img class="banniere" src="{{ asset("img/Banniere.jpg") }}" alt="banniere">
      </a>
    </div>
    <header>
      <a href="{{ route("home") }}"><h1 class="header-title" title="Retour à l'accueil">{{ config('app.name', '') }}</h1></a>

      <div class=" pull-right header-profil">
        @if (Route::has('login'))
          @auth
            <p>Bienvenue {{ Auth::user()->name }} !
              <a href="{{ route("profil") }}" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> Mon profil</a>
              <a href="{{ route("logout") }}" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a>
            </p>
          @else
            <p>Vous n'êtes pas connecté.
              <a href="{{ route('login') }}" class="btn btn-info"><span class="glyphicon glyphicon-log-in"></span> Connexion</a>
              <a href="{{ route('register') }}" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Inscription</a>
            </p>
          @endauth
        @endif
      </div> <!-- header-profil -->

    </header>
    @if (Route::has('login'))
      @auth
      @else
        <div class="alert alert-danger">Attention, tu n'es pas connecté. Tu peux jouer sans compte, mais tu ne pourras pas sauvegarder ta progression. Pour accéder à toutes les fonctionnalités de {{ config('app.name', '') }}, <a href="{{ route('login') }}">connecte-toi</a> ou <a href="{{ route('register') }}">crée un compte</a> maintenant.</div>
      @endauth
    @endif

    <div id="content">
      @yield ('site')
    </div>

  </body>
</html>