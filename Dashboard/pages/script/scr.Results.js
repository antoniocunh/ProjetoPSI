$(document.body).hide();
$(function () {
    $(document).ready(function () {
        var resp;

        $.ajax({
            url: "../../assets/php/Object/obj.GetResults.php",
            success: function (result) {
                resp = JSON.parse(result);
                if (jQuery.isEmptyObject(resp)) {
                    $("#tb_resultados").html("<p>Neste preciso momento você não recebeu nenhuma avaliação.</p>");
                }
                writeRows();
            }
        });


        function writeRows() {
            $("#tb_resultados").empty();
            $("#tb_resultados").append('<thead class=" text-primary"> <th>ID</th> <th>Nome do Autor</th><th>Trabalho</th><th>Trabalho Final</th></thead> <tbody>');
                
            var html="";

            resp.forEach(element => {
                var index = resp.indexOf(element);
                html += "<tr id='" + index + "'>";
                
                for (var count = 0; count <= 1; count++) {
                    html += "<td>";
                    html += count == 1 ? element[1] + " " + element[3] : element[count];
                    html += "</td>";
                }

                html += '<td><form id="form' + element[5] + '"><input id="f' + element[5] + '" type="file" class="submitTrabalho" /></form></td>';
                html += '<td><button id="c' + element[5] + '" class="btn btn-warning verCritica">Critica</button></td></tr>';
            });
        
            $("#tb_resultados").append(html);
            $("#tb_resultados").append('</tbody>');
            $(document).on('DOMNodeInserted', function(e) { $('#tb_resultados').DataTable(); })
        }

        $(document).on("change", ".submitTrabalho", function (e) {
            e.preventDefault();
            var fd = new FormData();
            var file = $("#" + this.id)[0].files[0];
            console.log($("#" + this.id)[0]);
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
                data: this.id.substr(1),
                type: 'POST',
                success: function (result) {
                    console.log(result);
                }
            });
        });

        $(document.body).fadeIn(300);
    });
});