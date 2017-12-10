@extends('layouts.headerHome')
@section('site')

@if (Route::has('login'))
  @auth
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>Bienvenue {{ $user->name }}</h2>
          @if (isset($message))
          <div class="alert alert-success">
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
          <p>Sur cette page, tu peux consulter ton avancement, mais également faire tout un tas d'autres trucs vachement cools.</p>
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
        </div> <!-- col -->
      </div> <!-- row -->
      <div class="row">
        <div class="col-lg-12">
          <h3>Tes badges</h3>
          @foreach($user_badges as $ub)
            <p>Badge {{ $badges[$ub->id_badge][0]->name }} obtenu le {{ $ub->created_at }}</p>
          @endforeach
          <p>Obtiens tous les badges en complétant les exercices de mathématiques et en terminant les niveaux d'Escape-Colle !</p>
        </div> <!-- col -->
      </div> <!-- row -->

      <div class="row">
        <div class="col-md-6">
          <h3>Exercices terminés (mathématiques)</h3>
          <h4>Aventures</h4>
          <p>Kini au monde du thème 1</p>
          <p>Kini au monde du thème 2</p>
          <p>Kini au monde du thème 3</p>
          <p>Kini dans la ville de Géométra</p>
          <h4>Exercices - Thème 1</h4>
          <div class="row">
            <div class="col-xs-6">
              <p>Exercice 1</p>
            </div> <!-- col -->
            <div class="col-xs-6">
              <p><span class="label label-success">Terminé</span></p>
            </div> <!-- col -->
          </div> <!-- row -->
          <div class="row">
            <div class="col-xs-6">
              <p>Exercice 2</p>
            </div> <!-- col -->
            <div class="col-xs-6">
              <p><span class="label label-success">Terminé</span></p>
            </div> <!-- col -->
          </div> <!-- row -->
          <div class="row">
            <div class="col-xs-6">
              <p>Exercice 3</p>
            </div> <!-- col -->
            <div class="col-xs-6">
              <p><span class="label label-success">Terminé</span></p>
            </div> <!-- col -->
          </div> <!-- row -->
          <div class="row">
            <div class="col-xs-6">
              <p>Exercice 4</p>
            </div> <!-- col -->
            <div class="col-xs-6">
              <p><span class="label label-warning">Terminé avec aide</span></p>
            </div> <!-- col -->
          </div> <!-- row -->
          <div class="row">
            <div class="col-xs-6">
              <p>Exercice 5</p>
            </div> <!-- col -->
            <div class="col-xs-6">
              <p><span class="label label-danger">Abandonné</span></p>
            </div> <!-- col -->
          </div> <!-- row -->
          <div class="row">
            <div class="col-xs-6">
              <p>Exercice 6</p>
            </div> <!-- col -->
            <div class="col-xs-6">
              <p><span class="label label-default">Non débuté</span></p>
            </div> <!-- col -->
          </div> <!-- row -->
        </div> <!-- col -->

        <div class="col-md-6">
          <h3>Niveaux terminés (Escape-Colle)</h3>
          <div class="row">
            <div class="col-xs-6">
              <p>Didacticiel</p>
            </div> <!-- col -->
            <div class="col-xs-6">
              <p><span class="label label-success">Terminé</span></p>
            </div> <!-- col -->
          </div> <!-- row -->
          <h4>Niveaux faciles</h4>
          <div class="row">
            <div class="col-xs-6">
              <p>Niveau 1</p>
            </div> <!-- col -->
            <div class="col-xs-6">
              <p><span class="label label-success">Terminé</span></p>
            </div> <!-- col -->
          </div> <!-- row -->
          <div class="row">
            <div class="col-xs-6">
              <p>Niveau 2</p>
            </div> <!-- col -->
            <div class="col-xs-6">
              <p><span class="label label-success">Terminé</span></p>
            </div> <!-- col -->
          </div> <!-- row -->
          <div class="row">
            <div class="col-xs-6">
              <p>Niveau 3</p>
            </div> <!-- col -->
            <div class="col-xs-6">
              <p><span class="label label-warning">Non terminé</span></p>
            </div> <!-- col -->
          </div> <!-- row -->
          <h4>Niveaux moyens</h4>
          <div class="row">
            <div class="col-xs-6">
              <p>Niveau 4</p>
            </div> <!-- col -->
            <div class="col-xs-6">
              <p><span class="label label-success">Terminé</span></p>
            </div> <!-- col -->
          </div> <!-- row -->
          <div class="row">
            <div class="col-xs-6">
              <p>Niveau 5</p>
            </div> <!-- col -->
            <div class="col-xs-6">
              <p><span class="label label-warning">Non terminé</span></p>
            </div> <!-- col -->
          </div> <!-- row -->
          <div class="row">
            <div class="col-xs-6">
              <p>Niveau 6</p>
            </div> <!-- col -->
            <div class="col-xs-6">
              <p><span class="label label-default">Non débuté</span></p>
            </div> <!-- col -->
          </div> <!-- row -->
          <h4>Niveaux difficiles</h4>
          <div class="row">
            <div class="col-xs-6">
              <p>Niveau 7</p>
            </div> <!-- col -->
            <div class="col-xs-6">
              <p><span class="label label-warning">Non terminé</span></p>
            </div> <!-- col -->
          </div> <!-- row -->
          <div class="row">
            <div class="col-xs-6">
              <p>Niveau 8</p>
            </div> <!-- col -->
            <div class="col-xs-6">
              <p><span class="label label-success">Non débuté</span></p>
            </div> <!-- col -->
          </div> <!-- row -->
          <div class="row">
            <div class="col-xs-6">
              <p>Niveau 9</p>
            </div> <!-- col -->
            <div class="col-xs-6">
              <p><span class="label label-default">Non débuté</span></p>
            </div> <!-- col -->
          </div> <!-- row -->
        </div> <!-- col -->
      </div> <!-- row -->
    </div> <!-- container -->

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Tes informations</h3>
          <p>Pseudo : {{ $user->name }}</p>
          <p>Adresse e-mail : {{ $user->email }}</p>
          <p>Identifiant universel unique (UUID) : {{ $uuid[0]->string }}</p>
        </div> <!-- col -->
        <div class="col-lg-12" id="chgInfo">
          <span class="btn btn-success" id="btnChgPseudo">Changer de pseudo</span>
          <span class="btn btn-success" id="btnChgMail">Changer d'adresse e-mail</span>
          <span class="btn btn-success" id="btnChgPw">Changer de mot de passe</span>
        </div> <!-- col #chgInfo -->

        <!-- Changement de pseudo -->
        <div class="col-xs-9" id="chgPseudo">
          <h4>Changement de pseudo</h4>
          <form action="{{ route('updateProfil') }}" method="post" class="form-group">
            {!! csrf_field() !!}
            <input type="hidden" name="typeOfForm" value="pseudo">
            <label for="text" class="col-lg-4 control-label">Nouveau pseudo</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="newPseudo">
            </div>

            <label for="text" class="col-lg-4 control-label">Mot de passe</label>
            <div class="col-lg-8">
              <input type="password" class="form-control" name="password">
            </div>
            <span class="btn btn-primary btn-danger" id="btnChgPseudoCancel"><span class="glyphicon glyphicon-remove"></span> Annuler</span>
            <input type="submit" class="btn btn-primary btn-success" id="btnChgPseudoSubmit" value="Valider"> <!-- <span class='glyphicon glyphicon-ok'></span> -->
          </form> <!-- form-group -->
          
        </div> <!-- col #chgPseudo -->

        <!-- Changement e-mail -->
        <div class="col-xs-9" id="chgMail">
          <h4>Changement d'adresse e-mail</h4>
          <form action="{{ route('updateProfil') }}" method="post" class="form-group">
            {!! csrf_field() !!}
            <input type="hidden" name="typeOfForm" value="email">
            <label for="text" class="col-lg-4 control-label">Nouvel e-mail</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="newEmail">
            </div>

            <label for="text" class="col-lg-4 control-label">Mot de passe</label>
            <div class="col-lg-8">
              <input type="password" class="form-control" name="password">
            </div>

            <span class="btn btn-primary btn-danger" id="btnChgMailCancel"><span class="glyphicon glyphicon-remove"></span> Annuler</span>
            <input type="submit" class="btn btn-primary btn-success" id="btnChgMailSubmit" value="Valider">
          </form> <!-- form-group -->

        </div> <!-- col #chgMail -->

        <!-- Changement mot de passe -->
        <div class="col-xs-9" id="chgPw">
          <h4>Changement de mot de passe</h4>
          <form action="{{ route('updateProfil') }}" method="post" class="form-group">
            {!! csrf_field() !!}
            <input type="hidden" name="typeOfForm" value="password">
            <label for="text" class="col-lg-5 control-label">Mot de passe actuel</label>
            <div class="col-lg-7">
              <input type="password" class="form-control" name="currentPassword">
            </div>

            <label for="text" class="col-lg-5 control-label">Nouveau mot de passe</label>
            <div class="col-lg-7">
              <input type="password" class="form-control" name="newPassword">
            </div>

            <label for="text" class="col-lg-5 control-label">Confirme ton nouveau mot de passe</label>
            <div class="col-lg-7">
              <input type="password" class="form-control" name="confirmNewPassword">
            </div>
            <span class="btn btn-primary btn-danger" id="btnChgPwCancel"><span class="glyphicon glyphicon-remove"></span> Annuler</span>
            <input type="submit" class="btn btn-primary btn-success" id="btnChgPwSubmit" value="Valider">
          </form> <!-- form-group -->
        </div> <!-- col #chgPw -->

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
