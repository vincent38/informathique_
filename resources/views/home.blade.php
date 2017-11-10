<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Kinimi - Page d'accueil</title>
    <link rel="stylesheet" href="{{ asset("css/global.css") }}">
  </head>
  <body>
    <div class="main-menu">

      <div class="main-menu-container-math">
        <a href="{{ route("mathematiques")}}" class="lien-main-menu">
          <div class="main-menu-container-2">
            <p class="main-menu-title">Mathématiques</p>
            <p class="main-menu-subtitle">Nom<p>
          </div> <!-- container-2 -->
        </a>
      </div> <!--container-->

      <div class="main-menu-container-info">
        <a href="{{ route("informatique")}}" class="lien-main-menu">
          <div class="main-menu-container-2">
            <p class="main-menu-title">Informatique</p>
            <p class="main-menu-subtitle">Escape Colle<p>
          </div> <!-- container-2 -->
        </a>
      </div> <!--container-->

    </div> <!-- main menu -->

  </body>
</html>
