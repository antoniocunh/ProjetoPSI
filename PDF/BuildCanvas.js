$(function () {

        $.ajax({
            url: "./AAA.php",
            success: function (result) 
            {
                console.log(result);
                
                var myCanvas = {
                    canvas : document.createElement("canvas"),
                    start : function() 
                    {
                        this.canvas.width = 480;
                        this.canvas.height = 270;
                        this.context = this.canvas.getContext("2d");
                        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
                    }
                }

                myGameArea.start();
            }
        })
})