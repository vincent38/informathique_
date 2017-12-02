@extends('layouts.headerPages')
@section('site')

@if (Route::has('login'))
  @auth
    <div class="container" id="msgentete">
      <div class="row">
        <div class="col-lg-12">
          <h2>Bienvenue {{ $user->name }}</h2>
          <p>Sur cette page, tu peux consulter ton avancement, mais également faire tout un tas d'autres trucs vachement cools.</p>
          <h3>Votre niveau</h3>
          <p>Niveau : {{ $user_lvl[0]->lvl }} - Expérience : {{ $user_lvl[0]->exp }} / {{ $user_lvl[0]->exp*100 }}</p>
          <h3>Vos badges</h3>
          @foreach($user_badges as $ub)
            <p>Badge {{ $badges[$ub->id_badge][0]->name }} obtenu le {{ $ub->created_at }}</p>
          @endforeach
        </div> <!-- col -->
      </div> <!-- row -->
    </div> <!-- container -->



  <!-- UTILISATEUR NON CONNECTE -->
  @else
  <div class="container" id="menu">
    <div class="row">
      <div class="col-lg-12">
        <h2>Tu n'es pas connecté !</h2>
        <p>Tu ne peux pas accéder à cette page si tu n'es pas connecté ! Si tu as déjà créé un compte sur {{ config('app.name', '') }}, connecte-toi avec ton identifiant et ton mot de passe. Sinon, tu peux t'inscrire, c'est entièrement gratuit !</p>
      </div> <!-- col -->
    </div> <!-- row -->
    <div class="row" style="margin-bottom: 20px">
      <div class="col-xs-6">
        <a href="{{ route('login') }}" class="btn btn-info btn-lg btn-block"><span class="glyphicon glyphicon-log-in"></span> Connexion</a>
      </div> <!-- col -->
      <div class="col-xs-6">
        <a href="{{ route('register') }}" class="btn btn-success btn-lg btn-block"><span class="glyphicon glyphicon-check"></span> Inscription</a>
      </div> <!-- col -->
    </div> <!-- row -->
    <div class="row">
      <div class="col-xs-12">
        <a href="{{ route("home") }}" class="btn btn-success btn-lg  btn-block">Retour à l'accueil</a>
      </div> <!-- col -->
    </div> <!-- row -->
  </div> <!-- container -->
  <!-- FIN UTILISATEUR NON CONNECTE -->

  @endauth
@endif

@endsection
