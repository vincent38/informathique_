class Porte {
    constructor(jsonPorte) {
        this.xTab = jsonPorte.xTab;
        this.yTab = jsonPorte.yTab;
        this.x = jsonPorte.x;
        this.y = jsonPorte.y;
        this.img = new Image();
        this.img.src = '../js/google-blockly/blockly/html/resources/images/'+jsonPorte.imgFermee;
        this.imgOuverte = '../js/google-blockly/blockly/html/resources/images/'+jsonPorte.imgOuverte;
        this.affiche();
    }

    affiche() {
        var sup = this;
        this.img.onload = function () {
            scene.context.drawImage(this, sup.x, sup.y, 150, 150);
        }
    }

    repaint() {
        scene.context.drawImage(this.img, this.x, this.y, 150, 150);
    }

    ouvre() {
        tabNiveau.tab[this.xTab][this.yTab] = -1;
        this.img.src = this.imgOuverte;
    }
}

function setupPorte(jsonData, dessins) {
    if (jsonData.porte) {
        var tepor = new Porte(jsonData.porte);
        dessins.push(tepor);
            /*tabLeviers[i] = new Levier(jsonData.porte[i]);
            dessins.push(tabLeviers[i]);*/
    }
    //return tabLeviers;
    return tepor;
}
/*
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
            alert('Pas de levier ici');
            perdu = true;
        }
    }
}*/