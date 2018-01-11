

var scene = {
    canvas: document.getElementById("scene"),

    /*getPosition : function (event){
        var x = event.x;
        var y = event.y;

        x -= this.canvas.offsetLeft;
        y -= this.canvas.offsetTop;

        alert("x:" + x + " y:" + y);
    },*/

    start: function () {

        //this.canvas.setAttribute('width', '1000');
        //alert(jsonData.tailleFondX);
        this.canvas.width = jsonData.tailleFondX;
        this.canvas.height = jsonData.tailleFondY;
        this.context = this.canvas.getContext("2d");
        /*this.canvas.addEventListener('click', () => {
            console.log('canvas click');
        });*/
        if(dev){
            this.canvas.addEventListener("mousedown", function(event){
                var x = event.clientX;
                var y = event.clientY;

                var canvas = document.getElementById("scene");
                x -= canvas.offsetLeft+90;  //offset de base
                y -= canvas.offsetTop;

                alert("x:" + x + " y:" + y);
            }, false);


        }
    },

    clear: function () {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);

    }
}