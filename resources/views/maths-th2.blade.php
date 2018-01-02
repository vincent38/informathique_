@extends('layouts.headerHome')
@section('site')

<input id="numHistoire" type="hidden" value="2"> <!-- Permet au script de savoir quel fichier charger -->

<div id="jserror" class="container">
  <h1>Erreur</h1>
  <p>On dirait que ton navigateur ne permet pas d'afficher l'histoire...</p>
  <div class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span> Kinimi a besoin d'exécuter du Javascript pour fonctionner. Nous te recommandons d'utiliser <a href="https://www.mozilla.org/fr/firefox/new/" target="_blank">Firefox</a> ou <a href="https://www.google.fr/chrome/browser/desktop/index.html" target="_blank">Chrome</a> pour profiter pleinement de Kinimi. Si tu possèdes déjà un de ces deux navigateurs, vérifie que le Javascript est bien autorisé dans les paramètres de ton navigateur, ou contacte les administrateurs.</div>
</div>
<!--<div id="mainDiv" class="container" style="display: none;"></div> -->
<script src="js/maths/histoiremaths.js" id="script"></script>

@endsection
