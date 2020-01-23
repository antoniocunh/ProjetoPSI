$(document.body).hide();
$(function () {
    $(document).ready(function () {
        var resp;

        $.ajax({
            url: "../../assets/php/Object/obj.GetReviewsSent.php",
            success: function (result) {
                console.log(result);
                resp = JSON.parse(result);
                if (jQuery.isEmptyObject(resp)) {
                    $("#tb_resultados").html("<p>Neste preciso momento você não recebeu nenhuma avaliação.</p>");
                }
                writeRows();
            }
        });


        function writeRows() {
            $("#tb_resultados").empty();
            $("#tb_resultados").append('<thead class=" text-primary"> <th>ID</th> <th>Autor Principal</th> <th>Titulo</th> <th>Ficheiro Provisório</th> <th>Ficheiro Final </th>  <th>Critica</th> <th>Ver</th></thead> <tbody>');
                
            var html="";
            resp.forEach(element => {
                var index = resp.indexOf(element);
                html += "<tr id='" + index + "'>";
                
                for (var count = 0; count <= 2; count++) {
                    html += "<td>";
                    html += element[count];
                    html += "</td>";
                }

                html += "<td><a href='../../assets/php/Object/obj.GetWork.php?iIdAttachment=" + element.BlobProvisorio +"'>" + element.Provisorio + "</a></td>";
                if(element.Final == null){
                    html += "<td><p>O Trabalho final não foi introduzido.</p></td>";
                }else{
                    html += "<td><a href='../../assets/php/Object/obj.GetWork.php?iIdAttachment=" + element.BlobFinal +"'>" + element.Final + "</a></td>";
                }
                
                html += '<td><button id="c' + element[0] + '" class="btn btn-warning verCritica">Critica</button></td>';
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