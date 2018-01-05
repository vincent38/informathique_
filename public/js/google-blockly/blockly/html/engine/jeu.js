//var tabNiveau = require('./resources/niveaux/didactitiel.json');
/*loadJSON(function(response){
  var actual_JSON = JSON.parse(response);
  alert(actual_JSON);
});*/

//alert(tabNiveau);
//TODO : ajouter les swal au début pour les instructions spécifiques à chaque niveau


var lvl = document.getElementById('lvl').value;
var jsonData = loadMap(lvl);
var delay = jsonData.delay || 300;

/*
Scoring system - variables for timers
*/
var tStart, tEnd, tTotal;
tStart = new Date().getTime() / 1000;
console.log(tStart); 

function startGame() {
    scene.start();
    perdu = false;
    dessins = new Array();
    jsonData = loadMap(lvl);
    tabNiveau = new TabNiveau(jsonData);
    var fond = new Fond();
    dessins.push(fond);
    heros = new Heros();
    personnages = setupPersonnages(jsonData, dessins);
    obstacles = setupObstacles(jsonData, dessins);
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
            tEnd = new Date().getTime() / 1000;
            console.log(tStart);
            console.log(tEnd);
            tTotal = Math.round(tEnd - tStart);
            /*
            On ajoute ici le message gagné - perdu et si le score est sauvegardé ou non
            */
            var uuid = document.getElementById("u").value;
            console.log(uuid);
            var id = document.getElementById("lvl").value;
            var xhr = getXMLHttpRequest2();
            xhr.open('GET','./finish/'+uuid+'/'+id+'/'+tTotal+'/'+leviers.length, false);
            xhr.send();
            if (xhr.readyState != 4 || (xhr.status != 200 && xhr.status != 0)) {
                throw new Error("impossible de charger le lien : " + xhr.status);
            }
            var r = JSON.parse(xhr.responseText);
            if (r.badge != undefined && r.badge['status'] === 'badge_unlocked') {
                swal(r.badge["badge_name"], r.badge["badge_data"], 'info').then(() => {
                    swal(r.status, r.infoplus, r.msg_status,{
                        buttons: {
                          retry: "Réessayer",
                          next: "Passer à la suite",
                        },
                      }).then((value) => {
                        switch (value){
                            case "retry":
                                window.location.replace("./"+id);
                                break;
                            case "next":
                                id = parseInt(id) + 1;
                                window.location.replace("./"+(id));
                                break;
                            default:
                                id = parseInt(id) + 1;
                                window.location.replace("./"+(id));
                        }
                      });
                });
            } else {
                swal(r.status, r.infoplus, r.msg_status,{
                    buttons: {
                        retry: "Réessayer",
                        next: "Passer à la suite",
                    },
                }).then((value) => {
                    switch (value){
                        case "retry":
                            window.location.replace("./"+id);
                            break;
                        case "next":
                            id = parseInt(id) + 1;
                            window.location.replace("./"+(id));
                            break;
                        default:
                            //id = parseInt(id) + 1;
                            //If click out of the dialog then retry
                            window.location.replace("./"+(id));
                    }
                });
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
setTimeout('startGame()', 1000);