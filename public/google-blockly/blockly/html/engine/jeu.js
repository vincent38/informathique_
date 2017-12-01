//var tabNiveau = require('./resources/niveaux/didactitiel.json');
/*loadJSON(function(response){
  var actual_JSON = JSON.parse(response);
  alert(actual_JSON);
});*/

//alert(tabNiveau);
var tabNiveau;
var timeout;
var heros;
var dessins = new Array();
var gagne = false;
var perdu;
var leviers;

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


var scene = {
    /*canvas : document.createElement("canvas"),
    start : function(){
      this.canvas.width = 600/2;
      this.canvas.height = 1380/2;
      this.context = this.canvas.getContext("2d");
      document.body.insertBefore(this.canvas, document.body.childNodes[6]);
    },*/

    canvas: document.getElementById("scene"),

    start: function () {
        //this.canvas.setAttribute('width', '1000');
        //alert(jsonData.tailleFondX);
        this.canvas.width = jsonData.tailleFondX;
        this.canvas.height = jsonData.tailleFondY;
        this.context = this.canvas.getContext("2d");
    },

    clear: function () {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);

    }

}

class TabNiveau {
    constructor(parsedJson) {
        //this.tab = parsedJson.data;
        this.tab = this.rearrangeJsonTab(parsedJson.data);
        this.xMax = parsedJson.xMax;
        this.yMax = parsedJson.yMax;
    }

    rearrangeJsonTab(data) {
        var dataTemp = clone(data);
        for(var i = 0; i < data.length; i++){
            for(var j = 0; j < data[i].length; j++){
                //alert(i + ' ' + j);
                dataTemp[j][i] = data[i][j];
            }
        }
        data = dataTemp;
        //alert('*');
        return data;
    }
}

/*function Fond(){
  this.width = scene.canvas.width;
  this.height = scene.canvas.height;
  img = new Image();
  img.src='resources/images/0.png';

  img.onload = function(){
    scene.context.drawImage(img, 0, 0, scene.canvas.width, scene.canvas.height);
  }

  function repaint(){
    scene.context.drawImage(img, 0, 0, scene.canvas.width, scene.canvas.height);
  }

}*/

class Fond {
    constructor() {
        this.width = scene.canvas.width;
        this.height = scene.canvas.height;
        this.img = new Image();
        this.img.src = './resources/images/' + lvl + '.png';



        var sup = this;
        this.img.onload = function () {
            scene.context.drawImage(this, 0, 0, scene.canvas.width, scene.canvas.height);
        }
    }

    repaint() {
        scene.context.drawImage(this.img, 0, 0, scene.canvas.width, scene.canvas.height);
    }

}

class Heros {
    constructor() {
        this.tailleDeplacement = jsonData.tailleDeplacement;
        this.tabX = jsonData.spawnTabX;
        this.tabY = jsonData.spawnTabY;
        this.x = jsonData.spawnX;
        this.y = jsonData.spawnY;
        this.width = 50;
        this.height = 50;
        this.img = new Image();
        this.img.src = './resources/images/heros.png';

        setTimeout(this.afficher(), 2000);

    }
    afficher(){
        var sup = this;
        this.img.onload = function () {
            scene.context.drawImage(this, sup.x, sup.y, sup.width, sup.height);
        }
    }

    monter() {
        if (this.testerMonter() && !perdu) {
            this.y -= this.tailleDeplacement;
            this.tabY--;
        } else if(perdu){}
        else {
            alert("Impossible de monter");
            perdu = true;

        }
        //sleep(500);
    }

    testerMonter() {
        return (this.tabY > 0 && tabNiveau.tab[this.tabX][this.tabY - 1] != 1);
    }

    descendre() {
        if (this.testerDescendre() && !perdu) {
            this.y += this.tailleDeplacement;
            this.tabY++;
        } else if(perdu){}
        else {
            alert("Impossible de descendre");
            perdu = true;
        }
    }

    testerDescendre() {
        return (this.tabY < tabNiveau.yMax - 1 && tabNiveau.tab[this.tabX][this.tabY + 1] != 1);
    }

    goGauche() {
        if (this.testerGoGauche() && !perdu) {
            this.x -= this.tailleDeplacement;
            this.tabX--;
        } else if(perdu){}
        else {
            alert("Impossible d'aller à gauche");
            perdu = true;
        }
    }

    testerGoGauche() {
        return (this.tabX > 0 && tabNiveau.tab[this.tabX - 1][this.tabY] != 1);
    }

    goDroite() {
        if (this.testerGoDroite() && !perdu) {
            this.x += this.tailleDeplacement;
            this.tabX++;
        } else if(perdu){}
        else {
            alert("Impossible d'aller à droite");
            perdu = true;
        }
    }

    testerGoDroite() {
        //alert(tabNiveau.tab[this.tabX+1][this.tabY]);
        return (this.tabX < tabNiveau.xMax - 1 && tabNiveau.tab[this.tabX + 1][this.tabY] != 1);
    }

    repaint() {
        scene.context.drawImage(this.img, this.x, this.y, this.width, this.height);
    }
}

function updateGameArea() {
    scene.clear();
    for (var i = 0; i < dessins.length; i++) {
        dessins[i].repaint();
        //setTimeout(function(){updateGameArea();}, 1000);
    }
}

/*function loadJSON(callback){
  var xobj = new XMLHttpRequest();
  xobj.overrideMimeType("application/json");
  xobj.open('GET', './resources/niveaux/0.json', true);
  xobj.onreadystatechange = function(){
    if (xobj.readyState == 4 && xobj.status == "200"){
      callback(xobj.responseText);
    }
  };
  xobj.send(null);
}*/
function getXMLHttpRequest() {
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
        alert("Erreur : Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }

    return xhr;
}

function loadMap(lvl) {
    var xhr = getXMLHttpRequest();
    //chargement du fichier
    xhr.open("GET", './resources/niveaux/'+lvl+'.json', false);
    xhr.send(null);
    if (xhr.readyState != 4 || (xhr.status != 200 && xhr.status != 0)) {
        throw new Error("impossible de charger le niveau : " + xhr.status);
    }
    var mapJsonData = xhr.responseText;
    var mapData = JSON.parse(mapJsonData);
    return mapData;
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

function clone(obj){
    try{
        var copy = JSON.parse(JSON.stringify(obj));
    } catch(ex){
        alert("Votre navigateur n'est pas compatible à ce site");
    }
    return copy;
}

class Levier{
    constructor(jsonLevier){
        this.xTab = jsonLevier.xTab;
        this.yTab = jsonLevier.yTab;
        this.x = jsonLevier.x;
        this.y = jsonLevier.y;
        this.action = jsonLevier.action;
        this.img = new Image();
        this.img.src = './resources/images/heros.png';
        this.affiche();
    }

    affiche(){
        var sup = this;
        this.img.onload = function () {
            scene.context.drawImage(this, sup.x, sup.y, 50, 50);
        }
    }
    repaint(){
        scene.context.drawImage(this.img, this.x, this.y, 50, 50);
    }
}

function setupLeviers(jsonData, dessins){
    var tabLeviers = Array();
    for(var i = 0; i < jsonData.leviers.length; i++){
        tabLeviers[i] = new Levier(jsonData.leviers[i]);
        dessins.push(tabLeviers[i]);
    }
    return tabLeviers;
}

function actionLevier() {
    if (!perdu) {
        var trouve = false;
        for (var i = 0; i < leviers.length; i++) {
            var lev = leviers[i];
            if (lev.xTab == heros.tabX && lev.yTab == heros.tabY) {
                trouve = true;
                eval(lev.action);
            }
        }
        if (!trouve) {
            alert('Pas de levier ici');
        }
    }


}


startGame();