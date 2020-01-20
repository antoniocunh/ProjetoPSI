$(document.body).hide();
$(function () {
    $(document).ready(function () {
        var resp4;

        $.ajax({
            url: "../../assets/php/Object/obj.GetPersonalWorks.php",
            success: function (result) {
                console.log(result);
                resp4 = JSON.parse(result);
                if(jQuery.isEmptyObject(resp4)){
                    $("#tb_Work").html("<p>Neste preciso momento você não enviou nenhum trabalho.</p>");
                }
                getRows();
            }
        });

        //Get Rows for table in HTML
        function getRows() 
        {
            $("#tb_Work").empty();
            $("#tb_Work").append('<thead class=" text-primary"> <th>ID</th> <th>Titulo</th> <th>Descrição</th> <th>Nome</th> <th>Tipo</th> <th>Ficheiro</th> </thead> <tbody>');

            var html="";

            resp4.forEach(element => {
                var index = resp4.indexOf(element);
                html += "<tr id='" + index + "'>";
                
                for (var count = 0; count <= 6; count++) 
                {
                    if(count != 4){
                    html += "<td>";
                    
                    if(count == 3){
                        html += element[count] + " " + element.vcLastName;
                    }else if(count == 6){
                        html += "<a href='../../assets/php/Object/obj.GetWork.php?iIdAttachment=" + element.iIdAttachment +"'>" + element[count] + "</a>";
                    }else
                        html += element[count];
                    
                    html += "</td>";
                }
                }

                html += '</tr>';
            })
            $("#tb_Work").append(html);
            $("#tb_Work").append('</tbody>');
            $(document).on('DOMNodeInserted', function(e) { $('#tb_Work').DataTable(); })
        }

        $(document.body).fadeIn(300);
    })

});