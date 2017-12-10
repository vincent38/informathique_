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
            alert("Impossible de monter");
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
            alert("Impossible de descendre");
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
            alert("Impossible d'aller à gauche");
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
            alert("Impossible d'aller à droite");
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


function testerGagne(heros) {
    if (!perdu) {
        if (tabNiveau.tab[heros.tabX][heros.tabY] == -1) {
            gagne = true;
            alert("Vous vous etes échappé !");
            var div = document.getElementById("nextLvl");

            while (div.firstChild) {
                div.removeChild(div.firstChild);
            }

            var btn = document.createElement("input");
            btn.setAttribute("name", "nextLvl");
            btn.setAttribute("type", "button");
            btn.setAttribute("value", "prochain niveau");
            div.appendChild(btn);
        } else if (tabNiveau.tab[heros.tabX][heros.tabY] == -2) {
            alert("Porte fermée");
            perdu = true
        } else {
            alert("Pas de porte ici");
            perdu = true;
        }
    }
}