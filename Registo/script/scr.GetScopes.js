$(function () {
    $.ajax({
            url: "../assets/php/Object/obj.GetScope.php",
            success: function (result) 
            {
                _Resp = JSON.parse(result);
                _Resp.forEach(function (item) { $('#scope').append("<option value='" + item.iIdScope + "'> "+ item.vcName + "</option>"); });
            }
        }),

        $.validator.addMethod("maior18", function(value, element) {
            chooseDate = new Date(value);
            atualDate = new Date(Date.now());
            if(atualDate.getFullYear() - chooseDate.getFullYear() == 18){
                if(chooseDate.getMonth() <= atualDate.getMonth()){      
                    if(chooseDate.getDate() <= atualDate.getDate()){      
                        return true;
                    }
                }
            }
            if(atualDate.getFullYear() - chooseDate.getFullYear() > 18){
                return true;
            }
            return false;
        });

});