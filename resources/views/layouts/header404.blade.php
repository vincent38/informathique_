<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name', '') }} - Erreur 404</title>
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
      <div id="mainHeader">
      </div> <!-- #mainHeader -->

    </header>

      @yield ('site')

  </body>
</html>
