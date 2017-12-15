<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name', '') }} - Page d'accueil</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.css")}}">
    <link rel="stylesheet" href="{{ asset("css/master.css") }}">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="banniere">
      <a href="{{ route("home") }}">
        <img class="banniere" src="{{ asset("img/Banniere.jpg") }}" alt="banniere">
      </a>
    </div>
    <header>
      <div id="mainHeader">

        <div class=" pull-right header-profil">
          @if (Route::has('login'))
            @auth
              <p>Bienvenue {{ Auth::user()->name }} !
                <a href="{{ route("profil") }}" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> Mon profil</a>
                <a href="{{ route("logout") }}" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a>
              </p>
            @else
              <p>Tu n'es pas connecté.
                <a href="{{ route('login') }}" class="btn btn-info"><span class="glyphicon glyphicon-log-in"></span> Connexion</a>
                <a href="{{ route('register') }}" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Inscription</a>
              </p>
            @endauth
          @endif
        </div> <!-- header-profil -->
      </div> <!-- #mainHeader -->
      @if (Route::has('login'))
        @auth
        @else
          <?php if (\Route::current()->getName() == 'home') { ?>
            <div class="alert alert-danger alert-dismissible">Attention, tu n'es pas connecté. Tu peux jouer sans compte, mais tu ne pourras pas sauvegarder ta progression. Pour accéder à toutes les fonctionnalités de {{ config('app.name', '') }}, <a href="{{ route('login') }}" class="alert-link">connecte-toi</a> ou <a href="{{ route('register') }}" class="alert-link">crée un compte</a> maintenant.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } ?>
        @endauth
      @endif
    </header>


    <div id="content">
      @yield ('site')
    </div>

  </body>
</html>
