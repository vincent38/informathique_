<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name', '') }} - Page d'accueil</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.css")}}">
    <link rel="stylesheet" href="{{ asset("css/master.css") }}">
    @if (preg_match('/launchStory/' , Route::current()->getName()))
      <link rel="stylesheet" href="{{ asset("css/mathematiques.css") }}">
    @endif
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
      <div class="banniere">
        <a href="{{ route("home") }}">
          <img class="banniere" src="{{ asset("img/Banniere.jpg") }}" alt="banniere">
        </a>
      </div>
    <header>
      <!--<div id="mainHeader">
    
      </div> -->
      <noscript>
        <div class="alert alert-info" style="margin-top: 0px;"><span class="glyphicon glyphicon-info-sign"></span> Kinimi a besoin d'exécuter du Javascript pour fonctionner. Nous te recommandons d'utiliser <a href="https://www.mozilla.org/fr/firefox/new/" target="_blank" class="alert-link">Firefox</a> ou <a href="https://www.google.fr/chrome/browser/desktop/index.html" target="_blank" class="alert-link">Chrome</a> pour profiter pleinement de Kinimi. Si tu possèdes déjà un de ces deux navigateurs, vérifie que le Javascript est bien autorisé dans les paramètres de ton navigateur, ou contacte les administrateurs.</div>
      </noscript>
    </header>


    <div id="content">
      @yield ('site')
    </div>

  </body>
</html>
