class Levier {
    constructor(jsonLevier) {
        this.xTab = jsonLevier.xTab;
        this.yTab = jsonLevier.yTab;
        this.x = jsonLevier.x;
        this.y = jsonLevier.y;
        this.tailleX = jsonLevier.tailleX || 70;
        this.tailleY = jsonLevier.tailleY || 70;
        this.action = jsonLevier.action;
        this.img = new Image();
        this.img.src = '../js/google-blockly/blockly/html/resources/images/'+jsonLevier.imgHaut;
        this.imgBas = '../js/google-blockly/blockly/html/resources/images/'+jsonLevier.imgBas;
        this.affiche();
    }

    affiche() {
        var sup = this;
        this.img.onload = function () {
            scene.context.drawImage(this, sup.x, sup.y, this.tailleX, this.tailleY);
        }
    }

    repaint() {
        scene.context.drawImage(this.img, this.x, this.y, this.tailleX, this.tailleY);
    }
}

function setupLeviers(jsonData, dessins) {
    var tabLeviers = Array();
    if (jsonData.leviers) {
        for (var i = 0; i < jsonData.leviers.length; i++) {
            tabLeviers[i] = new Levier(jsonData.leviers[i]);
            dessins.push(tabLeviers[i]);
        }
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
                lev.img.src = lev.imgBas;
                eval(lev.action);
            }
        }
        if (!trouve) {
            swal("Pas de levier ici", "", "error");
            perdu = true;
        }
        tick();
    }
}
