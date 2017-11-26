<?php
$lvl = $_GET['lvl'] ?? '0';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>jeu</title>
    <script src="../blockly_uncompressed.js"></script>
    <script src="../javascript_compressed.js">
    </script>
    <script src="../blocks_compressed.js"></script>

    <!--custom blocks-->
    <script src="../blocks/m_blocks.js"></script>
    <script src="../generators/javascript/m_blocks.js"></script>


    <script src="../msg/js/fr.js"></script>
    <link rel="stylesheet" href="engine/style.css">
    <style media="screen">
      canvas {
          border: 1px solid #d3d3d3;
          background-color: #f1f1f1;
      }
    </style>


  </head>
  <body>
      <xml id="toolbox" style="display: none">
        <!--colour = 0 - 360 -->

        <category name ="Deplacements" colour="120">
          <block type="m_heros_monter"></block>
          <block type="m_heros_descendre"></block>
          <block type="m_heros_gauche"></block>
          <block type="m_heros_droite"></block>
        </category>

        <category name = "Actions" colour = "300">
          <block type="m_echappe"></block>
          <block type="m_levier"></block>
        </category>

        <category name="Mathématiques" colour="200">
            <block type="math_number"></block>
            <block type="controls_repeat_ext"></block>
        </category>

        <!--
        <category name="Variables" custom="VARIABLE" colour="60"></category>
        <category name="Procédures" custom="PROCEDURE" colour="360"></category>
        -->

      </xml>



      <input type="button" value="Lancer le programme" id="run">
      <div id="blocklyDiv"></div>

      <canvas id="scene"></canvas>
      <a href="?lvl=<?=$lvl + 1?>">
      <div id="nextLvl"></div>
      </a>

  <!--query string pour js-->
  <input type="hidden" id="lvl" value="<?=$lvl?>"/>
  </body>
  <script>
    var workspace = Blockly.inject('blocklyDiv',
    {toolbox: document.getElementById('toolbox')});
  </script>

  <script src="engine/jeu.js"></script>
  <!--script pour run le code-->
  <script src="engine/run.js"></script>
</html>
