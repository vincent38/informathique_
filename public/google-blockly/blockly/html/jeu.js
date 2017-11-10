var heros;
var dessins = new Array();

function startGame(){
  scene.start();
  var fond = new Fond();
  dessins.push(fond);
  heros = new Heros();
  dessins.push(heros);
}

var scene = {
  canvas : document.createElement("canvas"),
  start : function(){
    this.canvas.width = 600/2;
    this.canvas.height = 1380/2;
    this.context = this.canvas.getContext("2d");
    document.body.insertBefore(this.canvas, document.body.childNodes[6]);
  },

  clear : function(){
    this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
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
    this.y -= this.tailleDeplacement;
  }

  descendre(){
    this.y += this.tailleDeplacement;
  }

  goGauche(){
    this.x -= this.tailleDeplacement;
  }

  goDroite(){
    this.x += this.tailleDeplacement;
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
