/**classe obstacle
 *          "obstacles" : [
 *          {
 *              "xTab" : ...,
 *              "yTab" : ...,
 *              "x" : ...,
 *              "y" : ...,
 *              "tailleX" : ...,
 *              "tailleY" : ...,
 *              "image" : ...,
 *          }, ...
 *          ]
 */

class Obstacle{
    constructor(jsonObstacle){
        this.xTab = jsonObstacle.xTab;
        this.yTab = jsonObstacle.yTab;
        //pas propre, obstacles invisibles pour gérer des gros obstacles TODO : gérer des obstacles de taille variable
        if(jsonObstacle.image) {
            this.x = jsonObstacle.x;
            this.y = jsonObstacle.y;
            this.tailleX = jsonObstacle.tailleX;
            this.tailleY = jsonObstacle.tailleY;
            this.img = new Image();
            this.img.src = '../js/google-blockly/blockly/html/resources/images/' + jsonObstacle.image;
            this.affiche();
        }
    }
    affiche(){
        var sup = this;
        this.img.onload = function () {
            scene.context.drawImage(this, sup.x, sup.y, this.tailleX,this.tailleY);
        }
    }
    repaint() {
        if(this.img) {
            scene.context.drawImage(this.img, this.x, this.y, this.tailleX, this.tailleY);
        }
    }
}

function setupObstacles(jsonData, dessins){
    var tabObstacles = Array();
    if (jsonData.obstacles) {
        for (var i = 0; i < jsonData.obstacles.length; i++) {
            tabObstacles[i] = new Obstacle(jsonData.obstacles[i]);
            dessins.push(tabObstacles[i]);
        }
    }
    return tabObstacles;
}