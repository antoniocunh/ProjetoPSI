$(function () {
    function ambito(){
        $.ajax({
            url: "../../assets/php/Object/Register/getAmbito.php",
            success: function (result) 
            {
                resp = JSON.parse(result);
                keys = Object.keys(resp);
                keys.forEach(element => {
                    $("[name='iIdScope']").append("<option name='" + resp[element].iIdScope + "' value='" + resp[element].iIdScope + "'>" + resp[element].vcName + "</option>");
                });
            }
    })
}

     function user(){
        $.ajax({
            url: "../../assets/php/Object/obj_GetProfile.php",
            success: function (result) 
            {
                resp = JSON.parse(result);
                
                keys = Object.keys(resp);
                keys.forEach(element => {
                    console.log(element);
                    if(element !== "iIdScope"){
                        $("[name='" + element + "']").val(resp[element]);
                    }
                });
            }
        })
    }
    ambito();
    user();
})