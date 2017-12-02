@extends('layouts.headerPages')
@section('site')

<?php
  $nbNiveauxFaciles = 27; // Nombre de niveaux faciles
  $nbNiveauxMoyens = 14; // Nombre de niveaux moyens
  $nbNiveauxDifficiles = 17; // T'as compris

  $lienJeu = "google-blockly/blockly/html/jeu.php";
 ?>

 <div class="container" id="msgentete">
   <div class="row">
     <div class="col-lg-12">
       <p>Bienvenue sur la partie « Informatique » de Kinimi ! Ici, tu vas pouvoir jouer au jeu Escape-Colle&nbsp;: tu dois aider Kini à s'échapper de là où il se trouve, en lui indiquant les mouvements qu'il doit faire.</p>
     </div> <!-- col> -->
   </div> <!-- row -->
 </div> <!-- container -->
<div class="main-menu">

<div class="container menu">
  <div class="row">
    <div class="col-lg-12">
      <h2>Tutoriel</h2>
      <a href="<?php echo $lienJeu; ?>" class="btn btn-success btn-lg btn-block">Accéder au tutoriel</a>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container menu -->

<div class="container" id="menu">
  <div class="row">
    <div class="col-md-4">
      <h2>Niveaux faciles</h2>
      <?php
      for($i = 1; $i <= $nbNiveauxFaciles; $i++) {
        $numNiveau = $i;
        $lien = $lienJeu."?lvl=".$numNiveau; ?>
        <a href="<?php echo $lien; ?>" class="btn btn-success btn-lg  btn-block">Niveau <?php echo $i; ?></a>
      <?php } ?>
    </div> <!-- col -->
    <div class="col-md-4">
      <h2>Niveaux moyens</h2>
      <?php
      for($i = 1; $i <= $nbNiveauxMoyens; $i++) {
        $numNiveau = $i + $nbNiveauxFaciles;
        $lien = $lienJeu."?lvl=".$numNiveau; ?>
        <a href="<?php echo $lien; ?>" class="btn btn-warning btn-lg  btn-block">Niveau <?php echo $i+$nbNiveauxFaciles; ?></a>
      <?php } ?>
    </div> <!-- col -->
    <div class="col-md-4">
      <h2>Niveaux difficiles</h2>
      <?php
      for($i = 1; $i <= $nbNiveauxDifficiles; $i++) {
        $numNiveau = $i + $nbNiveauxFaciles + $nbNiveauxMoyens;
        $lien = $lienJeu."?lvl=".$numNiveau; ?>
        <a href="<?php echo $lien; ?>" class="btn btn-danger btn-lg  btn-block">Niveau <?php echo $i+$nbNiveauxFaciles+$nbNiveauxMoyens; ?></a>
      <?php } ?>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container #menu -->

@endsection
