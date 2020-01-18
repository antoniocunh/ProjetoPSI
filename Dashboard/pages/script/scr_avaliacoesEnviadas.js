$(document.body).hide();
$(function () {
    $(document).ready(function () {
        var resp;

        $.ajax({
            url: "../../assets/php/Object/obj_GetAvaliacoesPessoais.php",
            success: function (result) {
                resp = JSON.parse(result);
                if(jQuery.isEmptyObject(resp)){
                    $("#tb_resultados").html("<p>Neste preciso momento você não avaliou nenhum trabalho.</p>");
                }
                writeRows();
            }
        })


        function writeRows() {
            $("#tb_Users").empty();
            $("#tb_Users").append('<thead class=" text-primary"> <th> Nome de Utilizador </th> <th> Nome </th> <th> Apelido </th> <th> Morada </th> <th> Pais </th> <th> Cidade </th> <th> Código Postal </th> <th> E-mail </th> <th> Telemovel </th> <th> Organização </th> </tbody>');
            resp.forEach(element => {
                var index = resp.indexOf(element);
                var html = "<tr>";
                
                for (var count = 0; count <= 3; count++) {
                    html = html + "<td>";
                    if(count == 0){
                        
                        html += element[0] + " " + element[4];
                    }else{
                        html += element[count];
                    }

                    html +=  "</td>";
                }
                $("#tb_resultados").append(html);
            })
        }
         
    $(document.body).fadeIn(300);
    })
})