
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
  var code = 'heros.monter();\nupdateGameArea();\n';
  return code;
};

Blockly.JavaScript['m_heros_descendre'] = function(block) {
  // TODO: Assemble JavaScript into code variable.
  var code = 'heros.descendre();\nupdateGameArea();\n';
  return code;
};

Blockly.JavaScript['m_heros_gauche'] = function(block) {
  // TODO: Assemble JavaScript into code variable.
  var code = 'heros.goGauche();\nupdateGameArea();\n';
  return code;
};

Blockly.JavaScript['m_heros_droite'] = function(block) {
  // TODO: Assemble JavaScript into code variable.
  var code = 'heros.goDroite();\nupdateGameArea();\n';
  return code;
};

Blockly.JavaScript['m_jarno'] = function(block) {
  var value_bite = Blockly.JavaScript.valueToCode(block, 'bite', Blockly.JavaScript.ORDER_ATOMIC);
  var code = 'alert(\'bite\');\n';
  return code;
};
