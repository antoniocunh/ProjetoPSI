$(document.body).hide();
$(function () {
    var eventData;
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

        $.ajax({
            url: "../../assets/php/Object/obj.GetEvent.php",
            success: function (result) {
                eventData = JSON.parse(result);
            }
        })


        function writeRows() {
            $("#tb_resultados").empty();
            $("#tb_resultados").append('<thead class=" text-primary"> <th>ID</th><th>Titulo</th><th>Autor</th><th>Trabalho Final (Submeter)</th><th>Critica</th></thead> <tbody>');

            var html = "";

            resp.forEach(element => {
                var msg;
                var index = resp.indexOf(element);
                html += "<tr id='" + index + "'>";

                if (Date.parse(eventData.dtIniFinalSubmission) <= Date.now() && Date.parse(eventData.dtEndFinalSubmission) >= Date.now()) {
                    msg = '<td><form id="form' + element[0] + '"><input id="f' + element[0] + '" type="file" class="submitTrabalho" /></form></td>';
                } else {
                    msg = '<td><p>A data de submissão de trabalho já expirou.</p></td>';
                }
                for (var count = 0; count <= 2; count++) {
                    html += "<td>";
                    html += count == 2 ? element[2] + " " + element[4] : element[count];
                    html += "</td>";
                }

                    $.ajax({
                        url: "../../assets/php/Object/obj.GetVerificationFinalWork.php",
                        async: false,
                        data: {
                            iIdWork: element[0]
                        },
                        success: function (result) {
                            var respFW = JSON.parse(result);
                            if (respFW == -1) {
                                html += msg;
                            } else {
                                html += "<td><a href='../../assets/php/Object/obj.GetWork.php?iIdAttachment=" + respFW[0].iIdAttachment + "'>" + respFW[0].vcTitle + "</a></td>";
                            }
                        }
                    });

                    html += '<td><button id="c' + element[0] + '" class="btn btn-warning verCritica">Critica</button></td></tr>';
                
            });

            $("#tb_resultados").append(html);
            $("#tb_resultados").append('</tbody>');
            $(document).on('DOMNodeInserted', function (e) {
                $('#tb_resultados').DataTable();
            })
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
                    location.reload();
                }
            });
        });

        $(document).on("click", ".verCritica", function (e) {

            $.ajax({
                url: "../../assets/php/Object/obj.GetCriticas.php",
                data: {
                    iIdWork: this.id.substr(1)
                },
                type: 'POST',
                success: function (result) {
                    var critics = JSON.parse(result);
                    $("#bdCriticas").empty();
                    critics.forEach(function (critic) {
                        html = '<div class="container"> <div class="clearfix"> <div class="float-left"> <h6>' + critic.vcName + ' ' + critic.vcLastName + '</h6> </div>' +
                            '<div class="float-right"> <h6>Nota: ' + critic.iRate + ' </h6> </div></div>' +
                            '<div class="clearfix"> <p>' + critic.vcReview + '</p><hr/> </div></div>';
                        $("#bdCriticas").append(html);
                    })
                    $("#Modal").modal("show");
                }
            });
        });

        $(document.body).fadeIn(300);
    });
});