@extends('layouts.headerHome')
@section('site')


<div class="container">
  <div class="row">
    <div class="col-lg-12">
    <noscript>
      <!-- Un lien vers un site externe -->
      <div class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span> Kinimi a besoin d'exécuter du Javascript pour fonctionner. Nous te recommandons d'utiliser <a href="https://www.mozilla.org/fr/firefox/new/" target="_blank">Firefox</a> ou <a href="https://www.google.fr/chrome/browser/desktop/index.html" target="_blank">Chrome</a> pour profiter pleinement de Kinimi. Si tu possèdes déjà un de ces deux navigateurs, vérifie que le Javascript est bien autorisé dans les paramètres de ton navigateur, ou contacte les administrateurs.</div>
    </noscript>
    <script src="../js/google-blockly/blockly/blockly_uncompressed.js"></script>
    <script src="../js/google-blockly/blockly/javascript_compressed.js">
    </script>
    <script src="../js/google-blockly/blockly/blocks_compressed.js"></script>

    <!--custom blocks-->
    <script src="../js/google-blockly/blockly/blocks/m_blocks.js"></script>
    <script src="../js/google-blockly/blockly/generators/javascript/m_blocks.js"></script>


    <script src="../js/google-blockly/blockly/msg/js/fr.js"></script>
    <link rel="stylesheet" href="../js/google-blockly/blockly/html/engine/style.css">
    <style media="screen">
      canvas {
          border: 1px solid #d3d3d3;
          background-color: #f1f1f1;
      }
    </style>
    <xml id="toolbox" style="display: none">
        <!--colour = 0 - 360 -->

        <category name ="Deplacements" colour="120">
          <block type="m_heros_monter"></block>
          <block type="m_heros_descendre"></block>
          <block type="m_heros_gauche"></block>
          <block type="m_heros_droite"></block>
        </category>

        <category name = "Actions" colour = "300">
          <block type="m_idle"></block>
          <block type="m_ramasser"></block>
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



      <input class="btn btn-info" type="button" value="Lancer le programme" id="run">
      <div style="width: 45%" id="blocklyDiv"></div>

      <canvas id="scene"></canvas>
      <a href="{{ route('launchGame', ['id' => $myId+1]) }}">
      <div id="nextLvl">
      </div>
      </a>

  <!--query string pour js-->
  <input type="hidden" id="lvl" value="{{ $myId }}"/>
  <input type="hidden" id="u" value="{{ $uuid }}"/>
  <script>
    var workspace = Blockly.inject('blocklyDiv',
    {toolbox: document.getElementById('toolbox')});
  </script>


  <div id="engine"></div>
  <script src="../js/google-blockly/blockly/html/engine/include.js"></script>

  <!--<script src="../js/google-blockly/blockly/html/engine/jeu.js"></script>-->
  <!--script pour run le code-->
  <script src="../js/google-blockly/blockly/html/engine/run.js"></script>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container -->

@endsection