
//var tabNiveau = require('./resources/niveaux/didactitiel.json');
/*loadJSON(function(response){
  var actual_JSON = JSON.parse(response);
  alert(actual_JSON);
});*/

//alert(tabNiveau);
var tabNiveau;

var heros;
var dessins = new Array();



function startGame(){

  scene.start();
  tabNiveau = new TabNiveau(loadMap());
  var fond = new Fond();
  dessins.push(fond);
  heros = new Heros();
  dessins.push(heros);
}


var scene = {
  /*canvas : document.createElement("canvas"),
  start : function(){
    this.canvas.width = 600/2;
    this.canvas.height = 1380/2;
    this.context = this.canvas.getContext("2d");
    document.body.insertBefore(this.canvas, document.body.childNodes[6]);
  },*/

  canvas : document.getElementById("scene"),

  start : function(){
    //this.canvas.setAttribute('width', '1000');
    this.canvas.width = 600/2;
    this.canvas.height = 1380/2;
    this.context = this.canvas.getContext("2d");
  },

  clear : function(){
    this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);

  }

}

class TabNiveau{
  constructor(parsedJson) {
    this.tab = parsedJson.data;
    this.xMax = parsedJson.xMax;
    this.yMax = parsedJson.yMax;
  }
}

/*function Fond(){
  this.width = scene.canvas.width;
  this.height = scene.canvas.height;
  img = new Image();
  img.src='resources/images/didactitiel.png';

  img.onload = function(){
    scene.context.drawImage(img, 0, 0, scene.canvas.width, scene.canvas.height);
  }

  function repaint(){
    scene.context.drawImage(img, 0, 0, scene.canvas.width, scene.canvas.height);
  }

}*/

class Fond{
  constructor(){
    this.width = scene.canvas.width;
    this.height = scene.canvas.height;
    this.img = new Image();
    this.img.src='resources/images/didactitiel.png';

    var sup = this;
    this.img.onload = function(){
      scene.context.drawImage(this, 0, 0, scene.canvas.width, scene.canvas.height);
    }
  }

  repaint(){
    scene.context.drawImage(this.img, 0, 0, scene.canvas.width, scene.canvas.height);
  }

}

class Heros {
  constructor() {
    this.tailleDeplacement = 42;
    this.tabX = 1;
    this.tabY = 14;
    this.x = 77;
    this.y = scene.canvas.height - 50;
    this.width = 50;
    this.height = 50;
    this.img = new Image();
    this.img.src = 'resources/images/heros.png';

    var sup = this;

    this.img.onload = function(){
      scene.context.drawImage(this, sup.x, sup.y, sup.width, sup.height);
    }
  }

  monter(){
    if(this.testerMonter()){
      this.y -= this.tailleDeplacement;
      this.tabY--;
    }else{
      alert("Impossible de monter");
    }
    //sleep(500);
  }

  testerMonter(){
    return(this.tabY > 0 && tabNiveau.tab[this.tabX][this.tabY - 1] == 0);
  }

  descendre(){
    if(this.testerDescendre()){
      this.y += this.tailleDeplacement;
      this.tabY++;
    }else{
      alert("Impossible de descendre");
    }
  }

  testerDescendre(){
    return(this.tabY < tabNiveau.yMax && tabNiveau.tab[this.tabX][this.tabY + 1] == 0);
  }

  goGauche(){
    if(this.testerGoGauche()){
      this.x -= this.tailleDeplacement;
      this.tabX--;
    }else{
      alert("Impossible d'aller à gauche");
    }
  }

  testerGoGauche(){
    return(this.tabX > 0 && tabNiveau.tab[this.tabX -1][this.tabY] == 0);
  }

  goDroite(){
    if(this.testerGoDroite()){
      this.x += this.tailleDeplacement;
      this.tabX++;
    }else{
      alert("Impossible d'aller à droite");
    }
  }

  testerGoDroite(){
    //alert(tabNiveau.tab[this.tabX+1][this.tabY]);
    return(this.tabX < tabNiveau.xMax && tabNiveau.tab[this.tabX +1][this.tabY] == 0);
  }

  repaint(){
    scene.context.drawImage(this.img, this.x, this.y, this.width, this.height);
  }
}

function updateGameArea(){
  scene.clear();
  for(var i = 0; i < dessins.length; i++){
    dessins[i].repaint();
  }
}

/*function loadJSON(callback){
  var xobj = new XMLHttpRequest();
  xobj.overrideMimeType("application/json");
  xobj.open('GET', './resources/niveaux/didactitiel.json', true);
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
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest();
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}

	return xhr;
}

function loadMap(){
  var xhr = getXMLHttpRequest();
  //chargement du fichier
  xhr.open("GET", './resources/niveaux/didactitiel.json', false);
  xhr.send(null);
  if(xhr.readyState != 4 || (xhr.status != 200 && xhr.status != 0)){
    throw new Error("impossible de charger le niveau : " + xhr.status);
  }
  var mapJsonData = xhr.responseText;
  var mapData = JSON.parse(mapJsonData);
  return mapData;
}

function sleep(miliseconds) {
   /*function wait(){}
   setTimeout(wait, 1000);*/
}


startGame();
