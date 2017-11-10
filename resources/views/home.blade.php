<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name', '') }} - Page d'accueil</title>
    <link rel="stylesheet" href="{{ asset("css/global.css") }}">
  </head>
  <body>

    @if (Route::has('login'))
      @auth
        <p>{{ Auth::user()->name }}</p>
        <a href="{{ route("profil") }}">Profil</a>
        <a href="{{ route("logout") }}">Se déconnecter</a>
      @else
        <a href="{{ route('login') }}">Se connecter</a>
        <a href="{{ route('register') }}">S'inscrire</a>
      @endauth
    @endif

    <a href="/public/u">Mauvaise page</a>

    <h1>{{ config('app.name', '') }}</h1>

    <p class="paragraph">Description Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
       do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
        sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
        mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur
        adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
         laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
         in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
          pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
          culpa qui officia deserunt mollit anim id est laborum.</p>

    <div class="main-menu">

      <div class="main-menu-container-math">
        <a href="{{ route("mathematiques") }}" class="lien-main-menu">
          <div class="main-menu-container-2">
            <p class="main-menu-title">Mathématiques</p>
            <p class="main-menu-subtitle">Nom<p>
          </div> <!-- container-2 -->
        </a>
      </div> <!--container-->

      <div class="main-menu-container-info">
        <a href="{{ route("informatique") }}" class="lien-main-menu">
          <div class="main-menu-container-2">
            <p class="main-menu-title">Informatique</p>
            <p class="main-menu-subtitle">Escape Colle<p>
          </div> <!-- container-2 -->
        </a>
      </div> <!--container-->

    </div> <!-- main menu -->

  </body>
</html>
