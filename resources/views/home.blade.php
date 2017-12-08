@extends('layouts.headerHome')
@section('site')


<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2>Bienvenue sur {{ config('app.name', '') }} !</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container -->


<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <h2 class="menu-title">Mathématiques</h2>
      <a href="{{ route("mathematiques")}}" class="menu-bouton btn btn-success btn-lg btn-block">Accéder aux exercices</a>
      <p class="menu-desc">On a des supers exos de maths avec des histoires et tout et tout, et même des exos classiques sans histoire, parfait pour réviser ! Allez viens, on est bien ! En plus j'ai des bonbons, tu vas voir tu vas te régaler...</p>
    </div> <!-- col -->
    <div class="col-sm-6">
      <h2 class="menu-title">Informatique</h2>
      <a href="{{ route("informatique")}}" class="menu-bouton btn btn-success btn-lg btn-block">Accéder à Escape-Colle</a>
      <p class="menu-desc">Si tu cherches des idées pour t'échapper de classe, ce jeu est parfait pour te l'apprendre ! On va te transformer en délinquant, espèce de sale racaille !</p>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container -->

@endsection
