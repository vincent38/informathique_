var errorDiv = document.getElementById("jserror");
var script = document.getElementById("script");
//var mainDiv = document.getElementById("mainDiv");

// On retire le message d'erreur affiché par défaut
errorDiv.parentNode.removeChild(errorDiv);

// Création et insertion de la div principale d'id mainDiv
var mainDiv = document.createElement("div");
mainDiv.setAttribute("id", "mainDiv");
mainDiv.setAttribute("class", "container");
script.parentNode.insertBefore(mainDiv, script);

// Fonction pour lire le fichier JSON
function loadJSON(cb) {

    var xobj = new XMLHttpRequest();
        //xobj.overrideMimeType("application/json");
    xobj.open('GET', 'data/maths/theme1.json', true); // Replace 'my_data' with the path to your file
    xobj.onreadystatechange = function () {
          if (xobj.readyState == 4 && xobj.status == "200") {
            // Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
            //console.log(JSON.parse(xobj.responseText));
            cb(JSON.parse(xobj.responseText));
          }
    };
    xobj.send(null);
}

// C'est ici que tout se passe
loadJSON(function(json){

  function afficherDiv(numPage) {
    // On enlève ce qui est dans la div actuellement
    mainDiv.innerHTML = null;

    // Affichage du titre et du texte
    mainDiv.innerHTML += "<h1>" + json.textes[numPage].titre + "</h1>";
    mainDiv.innerHTML += "<p>" + json.textes[numPage].texte + "</p>";

    // Affichage des boutons
    for(var i = 0; i < json.textes[numPage].boutons.length; i++) {
      var texteBouton = json.textes[numPage].boutons[i].texte;
      let lienBouton  = json.textes[numPage].boutons[i].pageLien;

      // Création du bouton
      var bouton = document.createElement("span");
      bouton.setAttribute("class", "btn btn-info btn-lg btn-block");
      bouton.id = i;
      bouton.innerHTML = texteBouton;

      // Lors du clic sur le bouton, on redirige vers la page correspondante
      bouton.addEventListener("click", function() {
        afficherDiv(lienBouton);
      });

      // Affichage du bouton
      mainDiv.appendChild(bouton);
      //mainDiv.appendChild(document.createElement("br"));
    }

    // Si la page en cours est un exercice
    if (json.textes[numPage].exercice) {

      for(var i = 0; i < json.textes[numPage].reponses.length; i++) {
        var texteBouton = json.textes[numPage].reponses[i].texteReponse;
        let correcte = json.textes[numPage].reponses[i].correct
        // Création du bouton
        var bouton = document.createElement("span");
        bouton.setAttribute("class", "bouton");
        bouton.id = i;
        bouton.innerHTML = texteBouton;

        // Lors du clic sur le bouton, on redirige vers la page correspondante
        bouton.addEventListener("click", function() {
          if(correcte) {
            alert("Bonne réponse !");
          } else {
            alert("Eh non !");
          }
        });

        mainDiv.appendChild(bouton);
        mainDiv.appendChild(document.createElement("br"));
      }
    }
    //alert(json.textes[numPage].exercice);
  }

  // Affichage de la première page
  afficherDiv(0);

});

////////////////////// END //////////////////////
