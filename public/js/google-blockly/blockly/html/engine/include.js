const engineDiv = document.getElementById("engine");
function includeJs(url){
    var script = document.createElement("script");
    script.src =  "../js/google-blockly/blockly/html/engine/"+url;
    engineDiv.appendChild(script);

}

includeJs("globalVars.js");
includeJs("includeJson.js");
includeJs("scene.js");
includeJs("niveau.js");
includeJs("fond.js");
includeJs("dessins.js");
includeJs("heros.js");
includeJs("personnage.js");
includeJs("ramassable.js");
includeJs("obstacle.js");
includeJs("levier.js");
includeJs("porte.js");

setTimeout('includeJs("jeu.js")', 1000);//pour etre sur de ne pas créer d'erreurs par l'appel de fonctions pas encore incluses
//includeJs("jeu.js");
