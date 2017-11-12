//MAIN
var rect;
//FIN MAIN

//fonction appelée par <body> dans html.html
function startGame() {
    myGameArea.start();
    rect = new rectangle(30,30, 10, 120, "red");
}

/**
 * contient un canvas et son contexte
 * @type {Object}
 */
var myGameArea = {
    canvas : document.createElement("canvas"),
    /**
     * définit le canvas, récupère son contexte et l'insère dans le html
     * @return {[type]} [description]
     */
    start : function() {
        //intervalle de raffraichissement du html
        this.interval = setInterval(updateGameArea, 20);

        this.canvas.width = 480;
        this.canvas.height = 270;
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
    },

    //nettoie le canvas
    clear : function(){
      this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    }
}


function rectangle(width, height, x, y, color) {
    this.width = width;
    this.height = height;
    this.x = x;
    this.y = y;
    //récupération du contexte
    ctx = myGameArea.context;
    ctx.fillStyle = color;
    //remplissage du contexte par un rectangle
    ctx.fillRect(this.x, this.y, this.width, this.height);

    this.update = function() {
      ctx.fillRect(this.x, this.y, this.width, this.height);
    }
}

/**
 * met à jour le html
 * @return {[type]} [description]
 */
var avancer = 5;
function updateGameArea(){
  myGameArea.clear();
  if(rect.x == myGameArea.canvas.width - rect.width || rect.x == 0){
    avancer = -avancer;
  }
  rect.x += avancer;
  rect.update();
}
