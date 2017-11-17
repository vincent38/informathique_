<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mathématiques - Kinimi</title>
    <link rel="stylesheet" href="{{ asset("css/global.css") }}">
  </head>
  <body>
    <h1>Mathématiques</h1>

    <a href="{{ route("home") }}">Retour à l'accueil</a>

    <div class="math-main-menu">

      <div class="math-main-menu-container">
        <a href="{{ route("maths-th1") }}" class="lien-main-menu">
          <div class="math-main-menu-container-2">
            <p class="math-main-menu-title">Thème 1</p>
            <p class="math-main-menu-subtitle">Nombres et calculs<p>
          </div> <!-- container-2 -->
        </a>
      </div> <!--container-->

      <div class="math-main-menu-container">
        <a href="{{ route("maths-th2") }}" class="lien-main-menu">
          <div class="math-main-menu-container-2">
            <p class="math-main-menu-title">Thème 2</p>
            <p class="math-main-menu-subtitle">Organisation et gestion de données, fonctions<p>
          </div> <!-- container-2 -->
        </a>
      </div> <!--container-->

      <div class="math-main-menu-container">
        <a href="{{ route("maths-th3") }}" class="lien-main-menu">
          <div class="math-main-menu-container-2">
            <p class="math-main-menu-title">Thème 3</p>
            <p class="math-main-menu-subtitle">Grandeurs et mesures<p>
          </div> <!-- container-2 -->
        </a>
      </div> <!--container-->

      <div class="math-main-menu-container">
        <a href="{{ route("maths-th4") }}" class="lien-main-menu">
          <div class="math-main-menu-container-2">
            <p class="math-main-menu-title">Thème 4</p>
            <p class="math-main-menu-subtitle">Espace et géométrie<p>
          </div> <!-- container-2 -->
        </a>
      </div> <!--container-->

    </div> <!-- main menu -->
  </body>
</html>
