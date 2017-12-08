var mainDiv = document.getElementById("mainDiv");



afficherDiv01();

function afficherDiv01() {
  mainDiv.innerHTML = "<h1>Bienvenue</h1>"
                    + "<p>Ceci est une histoire test. Clique sur le bouton ci-dessous pour continuer (on dirait pas mais c'est cliquable, fais pas chier) :</p>"
                    + "<span id=\"button1\">Continuer</span>";

  var button1 = document.getElementById("button1");

  button1.onclick = function() {
    afficherDiv02();
  };
}

function afficherDiv02() {
  mainDiv.innerHTML = "<h1>Bravo</h1>"
                    + "<p>C'est bien, t'as réussi à cliquer sur un bouton, t'es pas trop con. Maintenant, choisis un des deux boutons ci-dessous (toujours pareil, c'est cliquable, t'as compris) :</p>"
                    + "<span id=\"button2\">Choix 1</span> <span id=\"button3\">Choix 2</span>";

  var button2 = document.getElementById("button2");
  var button3 = document.getElementById("button3");

  button2.onclick = function() {
    afficherDiv03();
  };

  button3.onclick = function() {
    afficherDiv04();
  };
}

function afficherDiv03() {
    mainDiv.innerHTML = "<h1>Super</h1>"
                      + "<p>T'as choisis le premier choix. T'es content ?";
  }

function afficherDiv04() {
  mainDiv.innerHTML = "<h1>Géniol</h1>"
                    + "<p>T'as choisis le deuxième choix. Tu es bien talentueux.";
}
