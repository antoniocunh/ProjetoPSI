$.ajax({
    url: '../../assets/php/Object/obj_getRoles.php',
    type: 'POST',
    success: function (msg) {
        var resp = JSON.parse(msg);
        resp.forEach(function (element) {
            console.log(element);
            //if(element.iIDTypeUser!=0)
                $("#role").append("<option id='role" + element.iIDTypeUser + "' value ='" + element.iIDTypeUser + "'>" + element.vcDescription + "</option>");
        })
    }
});