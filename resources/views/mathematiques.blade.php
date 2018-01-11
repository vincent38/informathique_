@extends('layouts.headerHome')
@section('site')

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <p>Bienvenue sur la partie « Mathématiques » de Kinimi ! Ici, tu trouveras des exercices sous forme d'histoires interactives amusantes. Choisis une des quatre histoires ci-dessous pour commencer l'aventure !</p>
      <p>Tu peux aussi effectuer des exercices classiques si tu ne souhaites pas faire les histoires. Ces exercices sont classés par chapitre et te permettront de réviser ce que tu veux.</p>
    </div> <!-- col> -->
  </div> <!-- row -->
</div> <!-- container -->


<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2>Les aventures de Kini<h2>
    </div> <!-- col -->
  </div> <!-- row -->
  <div class="row">
    <div class="col-md-6">
      <h3>Kini et le mystérieux problème</h3>
      <a href="{{ route("launchStory", ['id' => 1]) }}" class="btn btn-success btn-lg btn-block">Commencer l'aventure</a>
      <p>
        Bienvenue sur Kinimi ! Cette aventure est pour l'instant une démonstration du moteur de jeu qui fait fonctionner la partie mathématiques. <br>
        Plus tard dans le futur, elle sera remplaçée par une vraie aventure, alors restez branchés !
      </p>
    </div> <!-- col -->
    <div class="col-md-6">
      <h3>Kini et le monde ordonné</h3>
      <a href="{{ route("launchStory", ['id' => 2]) }}" class="btn btn-success btn-lg btn-block disabled">Commencer l'aventure</a>
      <p>Cette histoire est en pleine phase de réflexion ! <br> Revenez plus tard :)</p>
    </div> <!-- col -->
  </div> <!-- row -->
  <div class="row">
    <div class="col-md-6">
      <h3>Kini au pays métrique</h3>
      <a href="{{ route("launchStory", ['id' => 3]) }}" class="btn btn-success btn-lg btn-block disabled">Commencer l'aventure</a>
      <p>Cette histoire est en pleine phase de réflexion ! <br> Revenez plus tard :)</p>
    </div> <!-- col -->
    <div class="col-md-6">
      <h3>Kini dans la ville de Géométra</h3>
      <a href="{{ route("launchStory", ['id' => 4]) }}" class="btn btn-success btn-lg btn-block">Commencer l'aventure</a>
      <p><span class="badge badge-success">Nouveau !</span> Après une séance intensive de révisions, Kini s'endort, l'esprit occupé par ses cours de géométrie.<br>
        Le voici propulsé dans une ville où les bâtiments ont milles formes, et répondant au nom de Géométra. <br>
        Quelles surprises renferment cet étrange lieu ? A vous de le découvrir !
      </p>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container -->

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2>Exercices classiques</h2>
    </div> <!-- col -->
  </div> <!-- row -->
  <div class="row">
    <div class="col-md-6">
      <h3>Thème 1</h3>
      <a href="{{ route("launchStory", ['id' => 101]) }}" class="btn btn-success btn-lg btn-block">Accéder aux exercices</a>
      <p><span class="badge badge-success">Nouveau !</span> Cette session spéciale reprend les principaux exercices de l'aventure "Kini et le mystérieux problème", mais sans devoir suivre l'histoire ! <br>
      Parfait pour réviser la résolution de problèmes, les nombres premiers et le calcul littéral.</p>
    </div> <!-- col -->
    <div class="col-md-6">
      <h3>Thème 2</h3>
      <a href="" class="btn btn-success btn-lg btn-block disabled">Accéder aux exercices</a>
      <p>(Session en cours de construction) Cette session spéciale reprend les principaux exercices de l'aventure "Kini et le monde ordonné", mais sans devoir suivre l'histoire ! <br>
      Parfait pour réviser l'interprétation et le traitement de données, les probabilités, la proportionnalité, ainsi que la notion de fonction.</p>
    </div> <!-- col -->
  </div> <!-- row -->
  <div class="row">
    <div class="col-md-6">
      <h3>Thème 3</h3>
      <a href="" class="btn btn-success btn-lg btn-block disabled">Accéder aux exercices</a>
      <p>(Session en cours de construction) Cette session spéciale reprend les principaux exercices de l'aventure "Kini au pays métrique", mais sans devoir suivre l'histoire ! <br>
      Parfait pour réviser les grandeurs et unités de mesures.</p>
    </div> <!-- col -->
    <div class="col-md-6">
      <h3>Thème 4</h3>
      <a href="" class="btn btn-success btn-lg btn-block disabled">Accéder aux exercices</a>
      <p>Cette session spéciale reprend les principaux exercices de l'aventure "Kini dans la ville de Géométra", mais sans devoir suivre l'histoire ! <br>
      Parfait pour réviser les notions d'espace et de géométrie plane.</p>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container -->



@endsection
