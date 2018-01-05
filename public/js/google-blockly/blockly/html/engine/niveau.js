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
            for (var j = 0; j < data[i].length; j++) {
                //alert(i + ' ' + j);
                dataTemp[j][i] = data[i][j];
            }
        }
        data = dataTemp;
        return data;
    }
}