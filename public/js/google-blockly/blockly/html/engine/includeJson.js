function getXMLHttpRequest() {
    var xhr = null;
    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest();
        }
    } else {
        alert("Erreur : Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }

    return xhr;
}

function loadMap(lvl) {
    var xhr = getXMLHttpRequest();
    //chargement du fichier
    xhr.open("GET", '../js/google-blockly/blockly/html/resources/niveaux/' + lvl + '.json', false);
    xhr.send(null);
    if (xhr.readyState != 4 || (xhr.status != 200 && xhr.status != 0)) {
        throw new Error("impossible de charger le niveau : " + xhr.status);
    }
    var mapJsonData = xhr.responseText;
    var mapData = JSON.parse(mapJsonData);
    return mapData;
}