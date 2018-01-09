var errorDiv = document.getElementById("jserror");
var script = document.getElementById("script");

// SCORING SYSTEM
var g = 0;
var b = 0;

var debug = true;
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

	var numHistoire = document.getElementById("numHistoire").getAttribute("value");
	var jsonFile = '../data/maths/theme' + numHistoire + '.json';

	var xobj = new XMLHttpRequest();
	//xobj.overrideMimeType("application/json");
	xobj.open('GET', jsonFile, true); // Replace 'my_data' with the path to your file
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
loadJSON(function (json) {

	function finish() {
		var xhr = new XMLHttpRequest();
		xhr.open('GET', './finish/' + uuid + '/' + 1 + '/' + 1 + '/' + 1, false);
		xhr.send();
		if (xhr.readyState != 4 || (xhr.status != 200 && xhr.status != 0)) {
			throw new Error("impossible de charger le lien : " + xhr.status);
		}
		var r = JSON.parse(xhr.responseText);
		if (r.badge != undefined && r.badge['status'] === 'badge_unlocked') {
			swal(r.badge["badge_name"], r.badge["badge_data"], 'info').then(() => {
				swal(r.status, r.infoplus, r.msg_status);
			});
		} else {
			swal(r.status, r.infoplus, r.msg_status);
		}
	}

	function afficherDiv(numPage) {
		if (debug) {
			console.log("Affichage de la page " + json.textes[numPage].numeroPage);
			if (json.textes[numPage].exercice) {
				console.log("EXERCICE");
			}
		}
		// On enlève ce qui est dans la div actuellement
		mainDiv.innerHTML = null;

		// Affichage du titre et du texte
		mainDiv.innerHTML += "<h1>" + json.textes[numPage].titre + "</h1>";
		mainDiv.innerHTML += "<p>" + json.textes[numPage].texte + "</p>";

		// Affichage des boutons
		for (var i = 0; i < json.textes[numPage].boutons.length; i++) {
			var texteBouton = json.textes[numPage].boutons[i].texte;
			let lienBouton = json.textes[numPage].boutons[i].pageLien;

			// Création du bouton
			var bouton = document.createElement("span");
			bouton.setAttribute("class", "btn btn-info btn-lg btn-block");
			bouton.id = i;
			bouton.innerHTML = texteBouton;

			// Lors du clic sur le bouton, on redirige vers la page correspondante
			bouton.addEventListener("click", function () {
				if (lienBouton != 4269404) {
					afficherDiv(lienBouton);
				} else {
					finish();
				}
			});

			// Affichage du bouton
			mainDiv.appendChild(bouton);
			//mainDiv.appendChild(document.createElement("br"));
		} // Fin affichage boutons
		if (debug) {
			var bouton = document.createElement("span");
			bouton.setAttribute("class", "btn btn-danger btn-sm");
			bouton.id = "debug-retour-debut";
			bouton.innerHTML = "(debug) Retour au début";
			bouton.addEventListener("click", function () {
				afficherDiv(0);
			});
			mainDiv.appendChild(bouton);
		}

		// Si la page en cours est un exercice
		if (json.textes[numPage].exercice) {
			var pageLien = json.textes[numPage].pageLien;

			for (var i = 0; i < json.textes[numPage].reponses.length; i++) {
				var texteBouton = json.textes[numPage].reponses[i].texteReponse;
				let correcte = json.textes[numPage].reponses[i].correct
				// Création du bouton
				let bouton = document.createElement("span");
				bouton.setAttribute("class", "btn btn-info btn-lg btn-block");
				bouton.id = i;
				bouton.innerHTML = texteBouton;

				// Lors du clic sur le bouton, on redirige vers la page correspondante
				bouton.addEventListener("click", function () {
					if (correcte) {
						bouton.setAttribute("class", "btn btn-bonne-reponse btn-lg btn-block");
						g = g + 1;
						afficherBoutonContinuer(pageLien);
					} else {
						bouton.setAttribute("class", "btn btn-mauvaise-reponse btn-lg btn-block");
						b = b + 1;
					}
				});

				mainDiv.appendChild(bouton);
			}
		}
		//alert(json.textes[numPage].exercice);
	}

	function afficherBoutonContinuer(numPage) {
		var bouton = document.getElementById("bouton-continuer-apres-exercice");
		if (bouton === null) { // On affiche le bouton seulement si il n'est pas déjà affiché
			bouton = document.createElement("span");
			bouton.setAttribute("class", "btn btn-info btn-lg btn-block");
			bouton.id = "bouton-continuer-apres-exercice";
			bouton.innerHTML = "Continuer";
			bouton.addEventListener("click", function () {
				afficherDiv(numPage);
			});
			mainDiv.appendChild(bouton);
		}
	}

	// Affichage de la première page
	afficherDiv(0);

});

////////////////////// END //////////////////////
