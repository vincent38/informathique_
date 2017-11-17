<?php
  $nbNiveaux = 1; // Nombre de niveaux, sans compter le didacticiel
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Escape Colle - Kinimi</title>
    <link rel="stylesheet" href="{{ asset("css/global.css") }}">
  </head>
  <body>
    <h1>Escape Colle</h1>

    <a href="{{ route("home") }}">Retour à l'accueil</a>

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

  </body>
</html>
