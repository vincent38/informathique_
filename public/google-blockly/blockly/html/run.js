var testButton = document.getElementById('run');
testButton.onclick = function(){
  Blockly.JavaScript.addReservedWords('code');
  //on récupère dans un string le code des blocks
  var code = Blockly.JavaScript.workspaceToCode(workspace);
  try {
    //on réinitialise le jeu avant tout
    var codeTotal = "startGame();\n"+code;
    //on exécute le code généré par les blocks
    eval(codeTotal);
  } catch (e) {
    alert(e);
  }
}
