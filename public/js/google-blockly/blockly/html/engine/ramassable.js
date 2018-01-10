class Ramassable{
    constructor(jsonRamassable){
        this.ramassed = false;
        this.xTab = jsonRamassable.xTab;
        this.yTab = jsonRamassable.yTab;
        this.action = jsonRamassable.action
        if(jsonRamassable.img) {
            this.x = jsonRamassable.x;
            this.y = jsonRamassable.y;
            this.tailleX = jsonRamassable.tailleX;
            this.tailleY = jsonRamassable.tailleY;
            this.img = new Image();
            this.img.src = '../js/google-blockly/blockly/html/resources/images/' + jsonRamassable.img;
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

    testerRamasse(x, y){
        var possible = false;
        if(this.xTab == x && this.yTab == y) {
            eval(this.action);
            this.ramassed = true;
            this.img.src = "";
            this.xTab = -1;
            this.yTab = -1;
            return true;
        }

        return false;
    }
}

function setupRamassables(jsonData, dessins){
    var tabRamassables = Array();
    if (jsonData.ramassables) {
        for (var i = 0; i < jsonData.ramassables.length; i++) {
            tabRamassables[i] = new Ramassable(jsonData.ramassables[i]);
            dessins.push(tabRamassables[i]);
        }
    }
    return tabRamassables;
}