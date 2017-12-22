@extends('layouts.headerHome')
@section('site')

<?php
  $nbNiveauxFaciles = 17; // Nombre de niveaux faciles
  $nbNiveauxMoyens = 20; // Nombre de niveaux moyens
  $nbNiveauxDifficiles = 8; // T'as compris

  //$lienJeu = "google-blockly/blockly/html/jeu.php";
 ?>

 <div class="container">
   <div class="row">
     <div class="col-lg-12">
       <p>Bienvenue sur la partie « Informatique » de Kinimi ! Ici, tu vas pouvoir jouer au jeu Escape-Colle&nbsp;: tu dois aider Kini à s'échapper de là où il se trouve, en lui indiquant les mouvements qu'il doit faire.</p>
       <dl class="dl-horizontal">
         <dt>Niveaux faciles</dt>
         <dd>Les niveaux faciles sont destinés à t'apprendre le fonctionnement du jeu Escape-Colle. Tu vas devoir utiliser les blocs de base pour déplacer ton personnage et terminer les niveaux.</dd>

         <dt>Niveaux moyens</dt>
         <dd>Les niveaux moyens vont commencer à te donner du fil à retordre. Utilise les boucles et les conditions pour déplacer ton personnage et éviter les pièges, et ne te fais pas repérer par les surveillants.</dd>

         <dt>Niveaux difficiles</dt>
         <dd>Les niveaux difficiles sont difficiles. Je sais pas quoi dire d'autre, mais on mettra quand même du texte parce que c'est important de bien expliquer ce que c'est.</dd>
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
      <?php
      for($i = 1; $i <= $nbNiveauxFaciles; $i++) {
        $numNiveau = $i; ?>
        <a href="{{ route('launchGame', ['id' => $numNiveau]) }}" class="btn btn-informatique btn-success btn-lg  btn-block">Niveau <?php echo $i; ?></a>
      <?php } ?>
    </div> <!-- col -->
    <div class="col-md-4">
      <h2>Niveaux moyens</h2>
      <?php
      for($i = 1; $i <= $nbNiveauxMoyens; $i++) {
        $numNiveau = $i + $nbNiveauxFaciles; ?>
        <a href="{{ route('launchGame', ['id' => $numNiveau]) }}" class="btn btn-informatique btn-warning btn-lg  btn-block">Niveau <?php echo $i+$nbNiveauxFaciles; ?></a>
      <?php } ?>
    </div> <!-- col -->
    <div class="col-md-4">
      <h2>Niveaux difficiles</h2>
      <?php
      for($i = 1; $i <= $nbNiveauxDifficiles; $i++) {
        $numNiveau = $i + $nbNiveauxFaciles + $nbNiveauxMoyens;?>
        <a href="{{ route('launchGame', ['id' => $numNiveau]) }}" class="btn btn-informatique btn-danger btn-lg  btn-block">Niveau <?php echo $i+$nbNiveauxFaciles+$nbNiveauxMoyens; ?></a>
      <?php } ?>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container -->

@endsection
