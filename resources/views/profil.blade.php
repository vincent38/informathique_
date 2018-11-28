@extends('layouts.headerHome')
@section('site')

@if (Route::has('login'))
  @auth
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>Bienvenue {{ $user->name }}</h2>
          @if (isset($message))
          <div class="alert alert-info">
             {{ $message }}
          </div>
          @endif
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <p>Sur cette page, tu peux consulter ton avancement, modifier tes informations personnelles (mot de passe, pseudo, adresse mail) et contacter les administrateurs si tu as rencontré un problème sur le site.</p>
        </div> <!-- col -->
      </div> <!-- row -->
    </div> <!-- container -->


    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>Progression</h2>
        </div> <!-- col -->
      </div> <!-- row -->
      <div class="row">
        <div class="col-lg-12">
          <h3>Ton niveau</h3>
          <p>Niveau : {{ $user_lvl[0]->lvl }} - Expérience : {{ $user_lvl[0]->exp }} / {{ $user_lvl[0]->lvl*100 }}</p>
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: {{ ($user_lvl[0]->exp*100)/($user_lvl[0]->lvl*100)  }}%" aria-valuenow="{{ $user_lvl[0]->exp }}" aria-valuemin="0" aria-valuemax="{{ $user_lvl[0]->lvl*100 }}"></div>
          </div>
        </div> <!-- col -->
      </div> <!-- row -->
      <div class="row">
        <div class="col-lg-12">
          <h3>Tes badges</h3>
          @foreach($user_badges as $ub)
            <img style="width: 10%" src="{{ URL::to('/') }}/img/badges/{{ $badges[$ub->id_badge][0]->action }}.png" onerror="this.src='{{ URL::to('/') }}/img/badges/default.png'"" alt="{{ $badges[$ub->id_badge][0]->name }}" title="Badge {{ $badges[$ub->id_badge][0]->name }} obtenu le {{ date('d/m/Y',  strtotime($ub->created_at)) }} - {{ $badges[$ub->id_badge][0]->data }}">
          @endforeach
          <br>
          <br>
          <p>Obtiens tous les badges en complétant les exercices de mathématiques et en terminant les niveaux d'Escape-Colle !</p>
        </div> <!-- col -->
      </div> <!-- row -->

      <div class="row">
        <div class="col-md-6">
          <h3>Exercices terminés (mathématiques)</h3>
          @if ($user_maths == null)
              <p>Pas d'histoire terminée à afficher pour le moment...</p>
            @else
              @foreach($user_maths as $um)
                <p>Histoire n°{{ $um->id_story }} terminée le {{ date('d/m/Y',  strtotime($um->created_at)) }} avec un score de {{ $um->score }}</p>
              @endforeach
            @endif
        </div> <!-- col -->

        <div class="col-md-6">
          <h3>Niveaux terminés (Escape-Colle)</h3>
            @if ($user_info == null)
              <p>Pas d'exercice terminé à afficher pour le moment...</p>
            @else
              @foreach($user_info as $ui)
                @if ($ui->id_exercise == 0)
                  <p>Didacticiel terminé le {{ date('d/m/Y',  strtotime($ui->created_at)) }} avec un score de {{ $ui->score }}</p>
                @else
                  <p>Exercice {{ $ui->id_exercise }} terminé le {{ date('d/m/Y',  strtotime($ui->created_at)) }} avec un score de {{ $ui->score }}</p>
                @endif
              @endforeach
            @endif
        </div> <!-- col -->
      </div> <!-- row -->
    </div> <!-- container -->

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Tes informations</h3>
          <p>Pseudo : {{ $user->name }}</p>
          <p>Adresse e-mail : {{ $user->email }}</p>

          <!--Deleted user options-->
        <p>Les options de modification du profil sont désactivées.</p>
        </div> <!-- col -->

        <script id="jsChangementProfil" src="{{ asset("js/leChangementCestMaintenant.js")}}"></script>
      </div> <!-- row -->
    </div> <!-- container menu -->




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
