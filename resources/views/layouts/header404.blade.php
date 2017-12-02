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
        <img class="banniere" src="/img/Banniere.jpg" alt="banniere">
      </a>
    </div>
    <header>
      <h1 class="header-title">{{ config('app.name', '') }}</h1>

    </header>

      @yield ('site')

  </body>
</html>
