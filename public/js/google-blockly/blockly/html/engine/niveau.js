function clone(obj) {
    try {
        var copy = JSON.parse(JSON.stringify(obj));
    } catch (ex) {
        swal("Erreur technique", "Erreur : Ton navigateur est incompatible avec le jeu. Pense à le mettre à jour, ou migre vers un navigateur moderne !", "error");
    }
    return copy;
}

class TabNiveau {
    constructor(parsedJson) {
        this.tab = this.rearrangeJsonTab(parsedJson.data);
        this.xMax = parsedJson.xMax;
        this.yMax = parsedJson.yMax;
    }
    rearrangeJsonTab(data) {
        var dataTemp = clone(data);
        for (var i = 0; i < data.length; i++) {
                //alert(i + ' ' + j);
                dataTemp.push(data[i]);
                //dataTemp[j][i] = data[i][j];
        }
        data = dataTemp;
        return data;
    }
}

function testerObstacle(x, y){
    var obstacle = 0;
    //on teste qu'on  sort pas de la map
    if (x < 0 || x > tabNiveau.xMax) return 1;
    if (y < 0 || y > tabNiveau.yMax) return 1;

    //on teste les obstacles non-objets
    if(tabNiveau.tab[x][y] == 1) return 1;

    //on regarde si un personnage est sur le chemin
    for(var i = 0; i < personnages.length; i++){
        if(personnages[i].xTab == x && personnages[i].yTab == y) return 1;
    }

    //on regarde si un obstacle classique est sur le chemin
    for(var i = 0; i < obstacles.length; i++){
        if(obstacles[i].xTab == x && obstacles[i].yTab == y) return 1;
    }







    return 0;
}
