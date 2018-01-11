var divChangement       = document.getElementById("chgInfo"); // Contient les boutons
var divChangementPseudo = document.getElementById("chgPseudo");
var divChangementMail   = document.getElementById("chgMail");
var divChangementMdp    = document.getElementById("chgPw");
var divContact    = document.getElementById("contact");

var boutonPseudo = document.getElementById("btnChgPseudo");
var boutonMail   = document.getElementById("btnChgMail");
var boutonPw     = document.getElementById("btnChgPw");
var boutonContact     = document.getElementById("btnContact");

var boutonPseudoCancel = document.getElementById("btnChgPseudoCancel");
var boutonMailCancel   = document.getElementById("btnChgMailCancel");
var boutonMdpCancel    = document.getElementById("btnChgPwCancel");
var boutonContactCancel = document.getElementById("btnContactCancel");


// Initialisation de l'affichage
divChangementPseudo.style.display = "none";
divChangementMail.style.display = "none";
divChangementMdp.style.display = "none";
divContact.style.display = "none";

// Lors du clic sur un des trois boutons
boutonPseudo.onclick = function() {
  divChangementPseudo.style.display = "block";

  divChangement.style.display = "none";
};

boutonMail.onclick = function() {
  divChangementMail.style.display = "block";

  divChangement.style.display = "none";
};

boutonPw.onclick = function() {
  divChangementMdp.style.display = "block";

  divChangement.style.display = "none";
};

boutonContact.onclick = function() {
  divContact.style.display = "block";

  divChangement.style.display = "none";
};


// Lors du clic sur un bouton d'annulation
boutonPseudoCancel.onclick = function() {
  reset();
};

boutonMailCancel.onclick = function() {
  reset();
};

boutonMdpCancel.onclick = function() {
  reset();
};

boutonContactCancel.onclick = function() {
  reset();
};


//
function reset() {
  divChangementPseudo.style.display = "none";
  divChangementMail.style.display = "none";
  divChangementMdp.style.display = "none";
  divContact.style.display = "none";

  divChangement.style.display = "block";
}
