class Fond {
    constructor() {
        this.width = scene.canvas.width;
        this.height = scene.canvas.height;
        this.img = new Image();
        this.img.src = '../js/google-blockly/blockly/html/resources/images/' + lvl + '.png';


        var sup = this;
        this.img.onload = function () {
            scene.context.drawImage(this, 0, 0, scene.canvas.width, scene.canvas.height);
        }
    }

    repaint() {
        scene.context.drawImage(this.img, 0, 0, scene.canvas.width, scene.canvas.height);
    }

}