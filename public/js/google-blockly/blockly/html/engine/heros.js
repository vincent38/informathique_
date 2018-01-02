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
        this.img.src = '../js/google-blockly/blockly/html/resources/images/heros.png';

        setTimeout(this.afficher(), 2000);

    }

    afficher() {
        var sup = this;
        this.img.onload = function () {
            scene.context.drawImage(this, sup.x, sup.y, sup.width, sup.height);
        }
    }

    monter() {
        if (this.testerMonter() && !perdu) {
            this.y -= this.tailleDeplacement;
            this.tabY--;
        } else if (perdu) {
        }
        else {
            swal("Impossible de monter", "Ton héros monte... Et se prend un obstacle. On a fait mieux niveau discrétion.", "error");
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
        } else if (perdu) {
        }
        else {
            swal("Impossible de descendre", "Ton héros descend... Et se prend un obstacle. On a fait mieux niveau discrétion.", "error");
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
        } else if (perdu) {
        }
        else {
            swal("Impossible d'aller à gauche", "Ton héros va a gauche... Et se prend un obstacle. On a fait mieux niveau discrétion.", "error");
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
        } else if (perdu) {
        }
        else {
            swal("Impossible d'aller à droite", "Ton héros va a droite... Et se prend un obstacle. On a fait mieux niveau discrétion.", "error");
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