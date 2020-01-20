$(document.body).hide();
$(function () {
    $(document).ready(function () {
        var resp;

        $.ajax({
            url: "../../assets/php/Object/obj.GetReviewsSent.php",
            success: function (result) {
                resp = JSON.parse(result);
                if(jQuery.isEmptyObject(resp)){
                    $("#tb_resultados").html("<p>Neste preciso momento você não avaliou nenhum trabalho.</p>");
                }
                writeRows();
            }
        })

        function writeRows() {
            $("#tb_resultados").empty();
            $("#tb_resultados").append('<thead class=" text-primary"> <th>Nome do Autor Principal</th> <th>Trabalho</th> <th>Nota</th> <th>Critica</th> </thead> <tbody>');
        
            var html="";

            resp.forEach(element => {
                var index = resp.indexOf(element);
                html += "<tr id='" + index + "'>";
                
                for (var count = 0; count <= 3; count++) {
                    html += "<td>";
                    html += count == 0 ? element[0] + " " + element[4] : element[count];
                    html += "</td>";
                }

                html += '</tr>';
            })
        
            $("#tb_resultados").append(html);
            $("#tb_resultados").append('</tbody>');
            $(document).on('DOMNodeInserted', function(e) { $('#tb_resultados').DataTable(); })
        }
         
    $(document.body).fadeIn(300);
    })
})