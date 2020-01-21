$(document.body).hide();
$(function () {
    $(document).ready(function () {
        var resp;

        $.ajax({
            url: "../../assets/php/Object/obj.GetResults.php",
            success: function (result) {
                resp = JSON.parse(result);
                console.log(resp);
                if (jQuery.isEmptyObject(resp)) {
                    $("#tb_resultados").html("<p>Neste preciso momento você não recebeu nenhuma avaliação.</p>");
                }
                writeRows();
            }
        });


        function writeRows() {
            $("#tb_resultados").empty();
            $("#tb_resultados").append('<thead class=" text-primary"> <th>ID</th><th>Nome do Trabalho</th><th>Nome do Autor</th><th>Trabalho Final</th><th>Critica</th></thead> <tbody>');
                
            var html="";

            resp.forEach(element => {
                var index = resp.indexOf(element);
                html += "<tr id='" + index + "'>";
                
                for (var count = 0; count <= 2; count++) {
                    html += "<td>";
                    html += count == 2 ? element[2] + " " + element[4] : element[count];
                    html += "</td>";
                }

                html += '<td><form id="form' + element[0] + '"><input id="f' + element[0] + '" type="file" class="submitTrabalho" /></form></td>';
                html += '<td><button id="c' + element[0] + '" class="btn btn-warning verCritica">Critica</button></td></tr>';
            });
        
            $("#tb_resultados").append(html);
            $("#tb_resultados").append('</tbody>');
            $(document).on('DOMNodeInserted', function(e) { $('#tb_resultados').DataTable(); })
        }

        $(document).on("change", ".submitTrabalho", function (e) {
            e.preventDefault();
            var fd = new FormData();
            var file = $("#" + this.id)[0].files[0];
            fd.append('file', file);
            fd.append('iIdWork', this.id.substring(1, this.id.length));
            $.ajax({
                url: "../../assets/php/Object/obj.InsertFinalWork.php",
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function (result) {
                    console.log(result);
                }
            });
        });

        $(document).on("click", ".verCritica", function (e) {
            
            $.ajax({
                url: "../../assets/php/Object/obj.GetCriticas.php",
                data: {
                    iIdWork:this.id.substr(1)
                },
                type: 'POST',
                success: function (result) {
                    var critics = JSON.parse(result);
                    $("#bdCriticas").empty();
                    critics.forEach(function(critic){
                        html = '<div class="container"> <div class="clearfix"> <div class="float-left"> <h6>' + critic.vcName + ' ' +  critic.vcLastName + '</h6> </div>' +
                        '<div class="float-right"> <h6>Nota: ' + critic.iRate + ' </h6> </div></div>'+ 
                        '<div class="clearfix"> <p>' + critic.vcReview + '</p><hr/> </div></div>';
                        $("#bdCriticas").append(html);
                    })
                    console.log(critics);
                    $("#Modal").modal("show");
                }
            });
        });

        $(document.body).fadeIn(300);
    });
});