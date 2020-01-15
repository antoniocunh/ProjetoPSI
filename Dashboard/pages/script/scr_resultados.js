$(function () {
    $(document).ready(function () {
        var resp;

        $.ajax({
            url: "../../assets/php/Object/obj_GetResultados.php",
            success: function (result) {
                resp = JSON.parse(result);
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
                //html = html + '<td><form id="form' + element[5] + '"><input id="f' + element[5]  + '" type="file" class="submitTrabalho" /></form></tr>';
                $("#tb_resultados").append(html);
            })
        }

        $(document).on("change", ".submitTrabalho", function(e){
            e.preventDefault();
            var fd = new FormData();
            var file = $("#" + this.id)[0].files[0];
            fd.append('file', file);
            fd.append('iIdWork', this.id.substring(1, this.id.length));
            console.log(fd.get("file"));
            $.ajax({
                url: "../../assets/php/Object/obj_InsertTrabalhoFinal.php",
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function (result) {
                    console.log(result);
                }
            })
        })
    })
})