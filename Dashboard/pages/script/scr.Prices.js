$(document.body).hide();
$(function () {
    $(document).ready(function () {
        var resp_Preço;

        $.ajax({
            url: "../../assets/php/Object/obj.GetPrices.php",
            success: function (result) {
                console.log(result);
                resp_Preço = JSON.parse(result);
                if(jQuery.isEmptyObject(resp_Preço)){
                    $("#tb_price").html("<p>Neste preciso momento não existem preços definidos.</p>");
                }
                writeRows();
            }
        });

        //Get Rows for table in HTML
        function writeRows() 
        {
            $("#tb_price").empty();
            $("#tb_price").append('<thead class=" text-primary"> <th>ID</th> <th>Preço</th> <th>Descrição</th> </thead> <tbody>');

            var html="";

            resp_Preço.forEach(element => {
                var index = resp_Preço.indexOf(element);
                html += "<tr id='" + index + "'>";
                
                for (var count = 0; count <= 2; count++) 
                {
                    html += "<td>";
                    html += element[count];
                    html += "</td>";
                }

                html += '</tr>';
            })
            $("#tb_price").append(html);
            $("#tb_price").append('</tbody>');
            $(document).on('DOMNodeInserted', function(e) { $('#tb_price').DataTable(); })
        }

        $(document.body).fadeIn(300);
    })

});