@extends('layouts.headerHome')
@section('site')

<?php
  /*$nbNiveauxFaciles = 20; // Nombre de niveaux faciles
  $nbNiveauxMoyens = 20; // Nombre de niveaux moyens
  $nbNiveauxDifficiles = 20; // T'as compris */

  //$lienJeu = "google-blockly/blockly/html/jeu.php";
 ?>

 <div class="container">
   <div class="row">
     <div class="col-lg-12">
       <p>Bienvenue sur la partie « Informatique » de Kinimi ! Ici, tu vas pouvoir jouer au jeu Escape-Colle&nbsp;: tu dois aider Kini à s'échapper de là où il se trouve, en lui indiquant les mouvements qu'il doit faire.</p>
       <dl class="dl-horizontal">
         <dt>Niveaux faciles</dt>
         <dd>Les niveaux faciles sont destinés à t'apprendre le fonctionnement du jeu Escape-Colle. Tu vas devoir utiliser les blocs de base pour déplacer ton personnage et terminer les niveaux. Pas de panique, nous te donnerons quelques aides et conseils pour que tu puisses te repérer rapidement dans l'interface :)</dd>

         <dt>Niveaux moyens</dt>
         <dd>Les niveaux moyens vont commencer à te donner du fil à retordre. Utilise les boucles et les conditions pour déplacer ton personnage et éviter les pièges, et ne te fais pas repérer par les surveillants.</dd>

         <dt>Niveaux difficiles</dt>
         <dd>Les niveaux difficiles ont été conçus par nos meilleurs experts en bâtiments haute sécurité. Tout ce que tu as pu voir précédemment, c'était du gâteau à côté de ce qui t'attend maintenant. Prêt à démontrer ta réputation de roi de l'Escape-Colle ?</dd>
       </dl>
     </div> <!-- col -->
   </div> <!-- row -->
 </div> <!-- container -->

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2>Didacticiel</h2>
      <a href="{{ route('launchGame', ['id' => 0]) }}" class="btn btn-no-margin btn-success btn-lg btn-block">Accéder au didacticiel</a>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container -->

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <h2>Niveaux faciles</h2>
      <a href="{{ route('launchGame', ['id' => 1]) }}" class="btn btn-informatique btn-success btn-lg  btn-block">Niveau 1</a>
      <?php
      for($i = 2; $i <= 20; $i++) {
        $numNiveau = $i; ?>
        <a href="{{ route('launchGame', ['id' => $numNiveau]) }}" class="btn btn-informatique btn-success btn-lg btn-block disabled">Niveau <?php echo $i; ?></a>
      <?php } ?>
    </div> <!-- col -->
    <div class="col-md-4">
      <h2>Niveaux moyens</h2>
      <a href="{{ route('launchGame', ['id' => 21]) }}" class="btn btn-informatique btn-warning btn-lg  btn-block">Niveau 21</a>
      <?php
      for($i = 22; $i <= 40; $i++) { ?>
        <a href="{{ route('launchGame', ['id' => $numNiveau]) }}" class="btn btn-informatique btn-warning btn-lg btn-block disabled">Niveau <?php echo $i; ?></a>
      <?php } ?>
    </div> <!-- col -->
    <div class="col-md-4">
      <h2>Niveaux difficiles</h2>
      <a href="{{ route('launchGame', ['id' => 41]) }}" class="btn btn-informatique btn-danger btn-lg btn-block">Niveau 41</a>
      <?php
      for($i = 42; $i <= 60; $i++) { ?>
        <a href="{{ route('launchGame', ['id' => $numNiveau]) }}" class="btn btn-informatique btn-danger btn-lg btn-block disabled">Niveau <?php echo $i; ?></a>
      <?php } ?>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container -->

@endsection
