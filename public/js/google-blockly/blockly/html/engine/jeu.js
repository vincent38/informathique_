//var tabNiveau = require('./resources/niveaux/didactitiel.json');
/*loadJSON(function(response){
  var actual_JSON = JSON.parse(response);
  alert(actual_JSON);
});*/

//alert(tabNiveau);

var lvl = document.getElementById('lvl').value;
var jsonData = loadMap(lvl);
var delay = jsonData.delay || 300;


function startGame() {
    scene.start();
    perdu = false;
    dessins = new Array();
    jsonData = loadMap(lvl);
    tabNiveau = new TabNiveau(jsonData);
    var fond = new Fond();
    dessins.push(fond);
    heros = new Heros();
    dessins.push(heros);
    leviers = setupLeviers(jsonData, dessins);
    porte = setupPorte(jsonData, dessins);
    //alert('u');

    setTimeout('updateGameArea()', timeout + 10);
    timeout = 0;
}

function getXMLHttpRequest2() {
    var xhr = null;
    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest();
        }
    } else {
        swal("Erreur technique", "Erreur : Ton navigateur ne supporte pas l'objet XMLHTTPRequest...", "error");
        return null;
    }

    return xhr;
}

function testerGagne(heros) {
    if (!perdu) {
        if (tabNiveau.tab[heros.tabX][heros.tabY] == -1) {
            gagne = true;
            /*
            On ajoute ici le message gagné - perdu et si le score est sauvegardé ou non
            */
            var xhr = getXMLHttpRequest2();
            xhr.open('GET','http://localhost:8081/projet/informathique_/public/escape/finish/b04965e6-a9bb-591f-8f8a-1adcb2c8dc39/0/1/10', false);
            xhr.send();
            if (xhr.readyState != 4 || (xhr.status != 200 && xhr.status != 0)) {
                throw new Error("impossible de charger le lien : " + xhr.status);
            }
            var r = JSON.parse(xhr.responseText);
            if (r.badge != undefined && r.badge['status'] === 'badge_unlocked') {
                swal(r.badge["badge_name"], r.badge["badge_data"], 'info').then(() => {
                    swal(r.status, "Vous pouvez maintenant passer au niveau suivant :)", r.msg_status);
                });
            } else {
                swal(r.status, "Vous pouvez maintenant passer au niveau suivant :)", r.msg_status);
            }
            /*
            Fin partie envoi vers serveur et affichage
            */
            var div = document.getElementById("nextLvl");

            while (div.firstChild) {
                div.removeChild(div.firstChild);
            }

            var btn = document.createElement("input");
            btn.setAttribute("name", "nextLvl");
            btn.setAttribute("type", "button");
            btn.setAttribute("value", "prochain niveau");
            div.appendChild(btn);
        } else if (tabNiveau.tab[heros.tabX][heros.tabY] == -2) {
            swal("Porte fermée", "Impossible de s'echapper, la porte est fermée... As-tu rempli tous les objectifs ?", "error");
            perdu = true
        } else {
            swal("Pas de porte ici", "Impossible de s'echapper, il n'y a pas de porte à cet endroit...", "error");
            perdu = true;
        }
    }
}

startGame();
