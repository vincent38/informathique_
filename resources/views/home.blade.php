@extends('layouts.headerHome')
@section('site')


<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2>Bienvenue sur {{ config('app.name', '') }} !</h2>
      <p>Tu es en troisième ? Le brevet approche vite ? Trop vite ? <br> 
        Pas de panique ! <br> 
        Avec {{ config('app.name', '') }}, révise les mathématiques et l'informatique simplement et en t'amusant ! Et pour ceux qui cherchent juste à réviser, on a ce qu'il vous faut :)
      </p>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container -->


<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <h2 class="menu-title">Mathématiques</h2>
      <a href="{{ route("mathematiques")}}" class="btn btn-success btn-lg btn-block">Accéder aux exercices</a>
      <p class="menu-desc">Besoin de réviser les maths en t'amusant ? C'est ici que ça se passe ! <br>
        Notre équipe te propose d'incarner notre héros maison, Kini, à travers quatre aventures fantastiques (qui arriveront au fur et à mesure) pour travailler le calcul littéral, les fonctions, la géométrie, et bien plus encore. <br>
        Tu retrouveras ici aussi des séries d'exercices tirées des aventures si tu souhaites réviser efficacement !
      </p>
    </div> <!-- col -->
    <div class="col-sm-6">
      <h2 class="menu-title">Informatique</h2>
      <a href="{{ route("informatique")}}" class="btn btn-success btn-lg btn-block">Accéder à Escape-Colle</a>
      <p class="menu-desc">Envie de découvrir (ou redécouvrir) l'algorithmique ? Alors ce jeu est fait pour toi ! <br>
        Guide Kini à travers des salles remplies de mécanismes, trappes et autres dangers et deviens le roi de l'Escape-Colle ! <br>
        Un bon moyen d'appliquer ces boucles et conditions qui paraissaient si abstraites sur le papier ;)
      </p>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container -->

@endsection
