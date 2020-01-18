$(document.body).hide();
$(function () {
    $(document).ready(function () {
    var resp;

    $.ajax({
        url: "../../assets/php/Object/obj_GetTrabalhosPessoais.php",
        success: function (result) {
            resp = JSON.parse(result);
            if(jQuery.isEmptyObject(resp)){
                $("#tb_Work").html("<p>Neste preciso momento você não enviou nenhum trabalho.</p>");
            }
            getRows();
        }
    });

    //Get Rows for table in HTML
    function getRows() {
        resp.forEach(element => {
            var index = resp.indexOf(element);
            var html = "<tr id='" + index + "'>";
            
            console.log(element);
            for (var count = 0; count <= 5; count++) {
                console.log(element[count]);
                html += "<td>";
                //apagar para o Ciro
                if(count == 3){
                    html += element[count] + " " + element.vcLastName;
                }else if(count == 5){
                    html += "<a href='../../assets/php/Object/getTrabalho.php?iIdAttachment=" + element.iIdAttachment +"'>" + element[count] + "</a>";
                }else{
                    html += element[count];
                }
                html += "</td>";

            }
            $("#tb_Work").append(html);
        })
    }
     
    $(document.body).fadeIn(300);
    })
});