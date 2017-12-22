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

function testerGagne(heros) {
    if (!perdu) {
        if (tabNiveau.tab[heros.tabX][heros.tabY] == -1) {
            gagne = true;
            alert("Vous vous etes échappé !");
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
            alert("Porte fermée");
            perdu = true
        } else {
            alert("Pas de porte ici");
            perdu = true;
        }
    }
}

startGame();
