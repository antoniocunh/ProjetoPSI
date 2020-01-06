$(function () {
        $.ajax({
            url: "../../assets/php/Object/Register/getAmbito.php",
            success: function (result) 
            {
                resp = JSON.parse(result);
                
                keys = Object.keys(resp);
                keys.forEach(element => {
                    $("[name='" + element + "']").append("<option name='" + elemen + "'>" + resp[element] + "</option>");
                    console.log(element);
                });
            }
    })
    

     function user(){
        $.ajax({
            url: "../../assets/php/Object/obj_GetProfile.php",
            success: function (result) 
            {
                resp = JSON.parse(result);
                console.log(resp);
                
                keys = Object.keys(resp);
                keys.forEach(element => {
                    $("[name='" + element + "']").val(resp[element]);
                    console.log(element);
                    if(element === "iIdScope"){
                        $("[name='" + resp[element] + "']").html("<option name='" + elemen + "'>" + resp[element] + "</option>");
                    }
                });
            }
        })
    }

    ambito();
    user();
})