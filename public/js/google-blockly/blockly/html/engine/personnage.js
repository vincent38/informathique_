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

        if(jsonPersonnage.surveillant){
            this.surveillant = true;
            if(jsonPersonnage.CVB){
                this.CVB = new Array();
                for(var i = 0; i < jsonPersonnage.CVB.length; i++){
                    this.CVB[i] = new Array(jsonPersonnage.CVB[i][0], jsonPersonnage.CVB[i][1]);
                }
                /*this.imgCVG = new Image();
                this.imgCVG.src */
            }
            if(jsonPersonnage.CVG){
                this.CVG = new Array();
                for(var i = 0; i < jsonPersonnage.CVG.length; i++){
                    this.CVG[i] = new Array(jsonPersonnage.CVG[i][0], jsonPersonnage.CVG[i][1]);
                }
            }
            if(jsonPersonnage.CVH){
                this.CVH = new Array();
                for(var i = 0; i < jsonPersonnage.CVH.length; i++){
                    this.CVH[i] = new Array(jsonPersonnage.CVH[i][0], jsonPersonnage.CVH[i][1]);
                }
            }
            if(jsonPersonnage.CVD){
                this.CVD = new Array();
                for(var i = 0; i < jsonPersonnage.CVD.length; i++){
                    this.CVB[i] = new Array(jsonPersonnage.CVD[i][0], jsonPersonnage.CVD[i][1]);
                }
            }
        }

        this.onTick = jsonPersonnage.onTick || "";
        this.xTab = jsonPersonnage.xTab;
        this.yTab = jsonPersonnage.yTab;
        this.x = jsonPersonnage.x;
        this.y = jsonPersonnage.y;
        this.tailleX = jsonPersonnage.tailleX;
        this.tailleY = jsonPersonnage.tailleY;
        this.img = new Image();
        this.img.src = '../js/google-blockly/blockly/html/resources/images/'+jsonPersonnage.image;
        if(jsonPersonnage.imageG){this.imgG = new Image(); this.imgG.src = '../js/google-blockly/blockly/html/resources/images/'+jsonPersonnage.imageG || "";}
        if(jsonPersonnage.imageD){this.imgD = new Image(); this.imgD.src = '../js/google-blockly/blockly/html/resources/images/'+jsonPersonnage.imageD || "";}
        if(jsonPersonnage.imageH){this.imgH = new Image(); this.imgH.src = '../js/google-blockly/blockly/html/resources/images/'+jsonPersonnage.imageH || "";}
        if(jsonPersonnage.imageB){this.imgB = new Image(); this.imgB.src = '../js/google-blockly/blockly/html/resources/images/'+jsonPersonnage.imageB || "";}

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

    tick(){
        eval(this.onTick);
/*
        if(typeof this.phase === 'undefined'){
            this.phase = 1;
        }
        switch(this.phase){
            case 1:
                this.img.src = this.imgG.src;
                this.tailleX = 40;
                this.tailleY = 40;
                this.testerDetectionHeros(this.CVG);
                this.phase++;
                break;
            case 2:
                this.img.src = this.imgH.src;
                this.tailleX = 50;
                this.tailleY = 50;
                this.testerDetectionHeros(this.CVH);
                this.phase++;
                break;
            case 3:
                this.img.src = this.imgG.src;
                this.tailleX = 40;
                this.tailleY = 40;
                this.testerDetectionHeros(this.CVG);
                this.phase++;
                break;
            case 4:
                this.img.src = this.imgB.src;
                this.tailleX = 50;this.tailleY = 50;
                this.testerDetectionHeros(this.CVB);
                this.phase = 1;
                break;
        }*/

    }
    testerDetectionHeros(CV){
        for(var i = 0; i < CV.length; i++){
            if(heros.tabX == CV[i][0] && heros.tabY == CV[i][1]){
                perdu = 1;
                swal("Repéré", "Le surveillant vous a repéré dans la zone interdite, vous avez perdu", 'error');
            }
        }
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

function test(){
}