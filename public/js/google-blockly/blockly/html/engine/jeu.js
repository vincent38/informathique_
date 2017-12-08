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

    setTimeout('updateGameArea()', timeout + 10);
    timeout = 0;
}
startGame();