var mainDiv = document.getElementById("mainDiv");

function loadJSON(cb) {

    var xobj = new XMLHttpRequest();
        //xobj.overrideMimeType("application/json");
    xobj.open('GET', 'data/maths/theme1.json', true); // Replace 'my_data' with the path to your file
    xobj.onreadystatechange = function () {
          if (xobj.readyState == 4 && xobj.status == "200") {
            // Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
            //console.log(JSON.parse(xobj.responseText));
            cb(JSON.parse(xobj.responseText));
          }
    };
    xobj.send(null);
}


loadJSON(function(json){
  console.log(json);

  function afficherDiv(numPage) {
    mainDiv.innerHTML = null;

    mainDiv.innerHTML += "<h1>" + json.textes[numPage].titre + "</h1>";
    mainDiv.innerHTML += "<p>" + json.textes[numPage].texte + "</p>";
    mainDiv.innerHTML += "<p>" + json.textes[numPage].boutons.length + "</p>";
    for(var i = 0; i < json.textes[numPage].boutons.length; i++) {
      var texteBouton = json.textes[numPage].boutons[i].texte;
      let lienBouton  = json.textes[numPage].boutons[i].pageLien;

      var bouton = document.createElement("span");
      bouton.setAttribute("class", "bouton");
      bouton.id = i;
      bouton.innerHTML = texteBouton;
      bouton.addEventListener("click", function() {
        afficherDiv(lienBouton);
      });
      mainDiv.appendChild(bouton);
      var br = document.createElement("br");
      mainDiv.appendChild(br);
    }
  }


  afficherDiv(0);

});
