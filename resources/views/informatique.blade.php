@extends('layouts.headerPages')
@section('site')

<?php
  $nbNiveaux = 1; // Nombre de niveaux, sans compter le didacticiel
 ?>

 <div class="container" id="msgentete">
   <div class="row">
     <div class="col-lg-12">
       <p>Bienvenue sur la partie « Informatique » de Kinimi ! Ici, tu vas pouvoir jouer au jeu Escape-Colle&nbsp;: tu dois aider Kini à s'échapper de là où il se trouve, en lui indiquant les mouvements qu'il doit faire.</p>
     </div> <!-- col> -->
   </div> <!-- row -->
 </div> <!-- container -->
<div class="main-menu">

  <div class="main-menu-container-info">
    <h2>Facile</h2>
    <ul>
      <li>
        <a href="google-blockly/blockly/html/jeu.php">Didacticiel</a>
      </li>
      <?php
      for($i = 1; $i <= $nbNiveaux; $i++) { ?>
        <li>
          <a href="google-blockly/blockly/html/jeu.php?lvl=<?php echo $i;?>">
            Niveau <?php echo $i; ?>
          </a>
        </li>
      <?php }
      ?>
      <li>En construction !</li>
    </ul>
  </div> <!--container-->

  <div class="main-menu-container-info">
    <h2>Médium</h2>
    <ul>
        <li>En construction !</li>
    </ul>
  </div> <!--container-->

  <div class="main-menu-container-info">
    <h2>Expert</h2>
    <ul>
        <li>En construction !</li>
    </ul>
  </div> <!--container-->

</div> <!-- main menu -->

@endsection
