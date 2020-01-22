$(document.body).hide();
$(function () {
    $(document).ready(function () {
    var resp;

    $.ajax({
        url: "../../assets/php/Object/obj.GetWorks.php",
        success: function (result) {
            resp = JSON.parse(result);
            if(jQuery.isEmptyObject(resp)){
                $("#tb_Work").html("<p>Neste preciso momento você não tem nunhum trabalho para avaliar.</p>");
            }
            writeRows();
        }
    });

    function writeRows() {

        $("#tb_Work").empty();
        $("#tb_Work").append('<thead class=" text-primary"> <th>ID</th> <th>Titulo</th> <th>Descrição</th> <th>Autor</th> <th>Tipo</th> <th>Ficheiro</th> <th>Ações</th> </thead>');
        $("#tb_Work").append('<tbody>');
        var html="";

        resp.forEach(element => {
            var index = resp.indexOf(element);
            html += "<tr id='" + index + "'>";

            for (var count = 0; count <= 5; count++) {
                html += "<td>";
                //apagar para o Ciro
                if(count == 3){
                    html += element[count] + " " + element.vcLastName;
                }else if(count == 5){
                    html += "<a href='../../assets/php/Object/obj.GetWork.php?iIdAttachment=" + element.iIdAttachment +"'>" + element[count] + "</a>";
                }else{
                    html += element[count];
                }
                html += "</td>";
            }
            html += '<td align="center"> <button id="a' + index + '" class="btn btn-warning avaliar"><i class="fa fa-pencil-square"></i></button> </td> </tr>';
        })

        $("#tb_Work").append(html);
        $("#tb_Work").append('</tbody>');
        $(document).on('DOMNodeInserted', function(e) {
            $('#tb_Work').DataTable();    
          })
    }

    //Click Button ->Show Modal
    $(document).on('click', ".avaliar", function () {
        var id = this.id.substring(1);
        
        keys = Object.keys(resp[id]);
        keys.forEach(element => {
            $("#" + element).val(resp[id][element]);
        });

        $("#Modal").modal("show");
    });
   
    //Sent Review
     $(document).on('click', "#insertReview", function () {
        $.ajax({
            url: '../../assets/php/Object/obj.InsertReview.php',
            type: 'POST',
            data: {
                iIdWork: $("#iIdWork").val(), 
                iRate: $("#FormControlSelect1").val(),
                vcReview: $("#vcReview").val()
            },
            success: function(msg) {
                var text = JSON.parse(msg);
                $("#Modal").modal("toggle");
            }               
        });
    });
     
    $(document.body).fadeIn(300);
    })
});