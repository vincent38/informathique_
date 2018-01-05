//'use strict';
//goog.require('Blockly.JavaScript');

goog.provide('Blockly.Blocks.m_blocks');

Blockly.Blocks['m_colour_rgb'] = {
  init: function() {
    this.appendDummyInput()
        .setAlign(Blockly.ALIGN_RIGHT)
        .appendField("Couleur RVB");
    this.appendValueInput("RED")
        .setCheck("Number")
        .setAlign(Blockly.ALIGN_RIGHT)
        .appendField("red");
    this.appendValueInput("GREEN")
        .setCheck("Number")
        .setAlign(Blockly.ALIGN_RIGHT)
        .appendField("green");
    this.appendValueInput("BLUE")
        .setCheck("Number")
        .setAlign(Blockly.ALIGN_RIGHT)
        .appendField("blue");
    this.setInputsInline(false);
    this.setOutput(true, "Array");
    this.setColour(230);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['m_heros_monter'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("Monter");
    this.setInputsInline(false);
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(230);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['m_heros_descendre'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("Descendre");
    this.setInputsInline(false);
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(230);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['m_heros_gauche'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("Aller à gauche");
    this.setInputsInline(false);
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(230);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['m_heros_droite'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("Aller à droite");
    this.setInputsInline(false);
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(230);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['m_jarno'] = {
  init: function() {
    this.appendValueInput("test jarno")
        .setCheck("String")
        .appendField("test jarno");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(230);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['m_echappe'] = {
    init: function() {
        this.appendDummyInput()
            .appendField("S'échapper");
        this.setPreviousStatement(true, null);
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['m_levier'] = {
    init: function() {
        this.appendDummyInput()
            .appendField("Levier");
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['m_ramasser'] = {
    init: function() {
        this.appendDummyInput()
            .appendField("Ramasser");
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};