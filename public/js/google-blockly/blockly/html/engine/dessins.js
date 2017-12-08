var dessins = new Array();
function updateGameArea() {
    scene.clear();
    for (var i = 0; i < dessins.length; i++) {
        dessins[i].repaint();
        //setTimeout(function(){updateGameArea();}, 1000);
    }
}