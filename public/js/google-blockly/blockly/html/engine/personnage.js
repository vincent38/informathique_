/**classe personnage
 *      --> Objet infranchissable
 *          Avec des coordonnées
 *          Et une image
 *      --> JSON :
 *          "personnages" : [
 *          {
 *              "xTab" : ...,
 *              "yTab" : ...,
 *              "x" : ...,
 *              "y" : ...,
 *              "tailleX" : ...,
 *              "tailleY" : ...,
 *              "image" : ...,
 *              "imageG"
 *              "imageD"
 *              "imageH"
 *              "imageB"
 *          }, ...
 *          ]
 * TODO : méthodes de déplacement
 *
 */

class Personnage{
    constructor(jsonPersonnage){
        this.xTab = jsonPersonnage.xTab;
        this.yTab = jsonPersonnage.yTab;
        this.x = jsonPersonnage.x;
        this.y = jsonPersonnage.y;
        this.tailleX = jsonPersonnage.tailleX;
        this.tailleY = jsonPersonnage.tailleY;
        this.img = new Image();
        this.img.src = '../js/google-blockly/blockly/html/resources/images/'+jsonPersonnage.image;
        this.imgG = '../js/google-blockly/blockly/html/resources/images/'+jsonPersonnage.imageG || 0;
        this.imgD = '../js/google-blockly/blockly/html/resources/images/'+jsonPersonnage.imageD || 0;
        this.imgH = '../js/google-blockly/blockly/html/resources/images/'+jsonPersonnage.imageH || 0;
        this.imgB = '../js/google-blockly/blockly/html/resources/images/'+jsonPersonnage.imageB || 0;

        this.affiche();
    }
    affiche(){
        var sup = this;
        this.img.onload = function () {
            scene.context.drawImage(this, sup.x, sup.y, this.tailleX,this.tailleY);
        }
    }
    repaint() {
        scene.context.drawImage(this.img, this.x, this.y, this.tailleX,this.tailleY);
    }
}

function setupPersonnages(jsonData, dessins){
    var tabPersonnages = Array();
    if (jsonData.personnages) {
        for (var i = 0; i < jsonData.personnages.length; i++) {
            tabPersonnages[i] = new Personnage(jsonData.personnages[i]);
            dessins.push(tabPersonnages[i]);
        }
    }
    return tabPersonnages;
}