@extends('layouts.headerHome')
@section('site')

<div class="container" id="msgentete">
  <div class="row">
    <div class="col-lg-12">
      <p>Bienvenue sur la partie « Mathématiques » de Kinimi ! Ici, tu trouveras des exercices sous forme d'histoires interactives amusantes. Choisis une des quatre histoires ci-dessous pour commencer l'aventure !</p>
      <p>Tu peux aussi effectuer des exercices classiques si tu ne souhaites pas faire les histoires. Ces exercices sont classés par chapitre et te permettront de réviser ce que tu veux.</p>
    </div> <!-- col> -->
  </div> <!-- row -->
</div> <!-- container -->


<div class="container menu">
  <div class="row">
    <div class="col-lg-12">
      <h2>Les aventures de Kini<h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <h3>Kini au monde du thème 1</h3>
      <a href="{{ route("maths-th1") }}" class="btn btn-success btn-lg  btn-block">Commencer l'aventure</a>
      <p>Description putain Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div> <!-- col -->
    <div class="col-md-6">
      <h3>Kini au monde du thème 2</h3>
      <a href="{{ route("maths-th2") }}" class="btn btn-success btn-lg  btn-block">Commencer l'aventure</a>
      <p>Description putain</p>
    </div> <!-- col -->
  </div> <!-- row -->
  <div class="row">
    <div class="col-md-6">
      <h3>Kini au monde du thème 3</h3>
      <a href="{{ route("maths-th3") }}" class="btn btn-success btn-lg  btn-block">Commencer l'aventure</a>
      <p>Description putain</p>
    </div> <!-- col -->
    <div class="col-md-6">
      <h3>Kini dans la ville de Géométra</h3>
      <a href="/mathematiques-theme-4" class="btn btn-success btn-lg  btn-block">Commencer l'aventure</a>
      <p>Description putain Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container menu -->

<div class="container menu">
  <div class="row">
    <div class="col-lg-12">
      <h2>Exercices classiques</h2>
    </div> <!-- col -->
  </div> <!-- row -->
  <div class="row">
    <div class="col-md-6">
      <h3>Thème 1</h3>
      <a href="" class="btn btn-success btn-lg  btn-block">Accéder aux exercices</a>
      <p>Description bordel</p>
    </div> <!-- col -->
    <div class="col-md-6">
      <h3>Thème 2</h3>
      <a href="" class="btn btn-success btn-lg  btn-block">Accéder aux exercices</a>
      <p>Description bordel Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div> <!-- col -->
  </div> <!-- row -->
  <div class="row">
    <div class="col-md-6">
      <h3>Thème 3</h3>
      <a href="" class="btn btn-success btn-lg  btn-block">Accéder aux exercices</a>
      <p>Description bordel Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div> <!-- col -->
    <div class="col-md-6">
      <h3>Thème 4</h3>
      <a href="" class="btn btn-success btn-lg  btn-block">Accéder aux exercices</a>
      <p>Description bordel</p>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container menu -->



@endsection
