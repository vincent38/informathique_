var scene = {
    canvas: document.getElementById("scene"),

    start: function () {
        //this.canvas.setAttribute('width', '1000');
        //alert(jsonData.tailleFondX);
        this.canvas.width = jsonData.tailleFondX;
        this.canvas.height = jsonData.tailleFondY;
        this.context = this.canvas.getContext("2d");
    },

    clear: function () {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);

    }

}