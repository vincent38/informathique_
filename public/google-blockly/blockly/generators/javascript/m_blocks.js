
Blockly.JavaScript['m_colour_rgb'] = function(block) {
  var value_red = Blockly.JavaScript.valueToCode(block, 'RED', Blockly.JavaScript.ORDER_ATOMIC);
  var value_green = Blockly.JavaScript.valueToCode(block, 'GREEN', Blockly.JavaScript.ORDER_ATOMIC);
  var value_blue = Blockly.JavaScript.valueToCode(block, 'BLUE', Blockly.JavaScript.ORDER_ATOMIC);
  // TODO: Assemble JavaScript into code variable.
  var code = '[' + value_red + ', ' + value_green + ', ' + value_blue + ']';
  // TODO: Change ORDER_NONE to the correct strength.
  return [code, Blockly.JavaScript.ORDER_ATOMIC];
};

Blockly.JavaScript['m_heros_monter'] = function(block) {
  // TODO: Assemble JavaScript into code variable.
  //var code = 'timeout += 5000;\nsetTimeout(heros.monter(), timeout);\nupdateGameArea();\n';
    //update plus tard car risque que update se fasse avant heros.monter
    var code = 'timeout += delay;\nsetTimeout(\'heros.monter()\', timeout);\nsetTimeout(\'updateGameArea()\', timeout + 10);\n';
  return code;
};

Blockly.JavaScript['m_heros_descendre'] = function(block) {
  // TODO: Assemble JavaScript into code variable.
    var code = 'timeout += delay;\nsetTimeout(\'heros.descendre()\', timeout);\nsetTimeout(\'updateGameArea()\', timeout + 10);\n';
  return code;
};

Blockly.JavaScript['m_heros_gauche'] = function(block) {
  // TODO: Assemble JavaScript into code variable.
    var code = 'timeout += delay;\nsetTimeout(\'heros.goGauche()\', timeout);\nsetTimeout(\'updateGameArea()\', timeout + 10);\n';
  return code;
};

Blockly.JavaScript['m_heros_droite'] = function(block) {
  // TODO: Assemble JavaScript into code variable.
    var code = 'timeout += delay;\nsetTimeout(\'heros.goDroite()\', timeout);\nsetTimeout(\'updateGameArea()\', timeout + 10);\n';
  return code;
};

Blockly.JavaScript['m_jarno'] = function(block) {
  var value_bite = Blockly.JavaScript.valueToCode(block, 'bite', Blockly.JavaScript.ORDER_ATOMIC);
  var code = 'alert(\'bite\');\n';
  return code;
};

Blockly.JavaScript['m_echappe'] = function(block) {
    // TODO: Assemble JavaScript into code variable.
    var code = 'timeout += delay;\nsetTimeout(\'testerGagne(heros)\', timeout);\n';
    return code;
};