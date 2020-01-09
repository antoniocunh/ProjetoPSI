$(function () {
    var resp;

    $(document).on('click', ".update", function(){
        keys = Object.keys(resp[this.id]);
        keys.forEach(element => {
            $("#" + element).val(resp[this.id][element]);
      });
      $("#Modal").modal("show");
    });

    $.ajax({
        url: "../../assets/php/Object/getUsers.php",
        success: function (result) {
            resp = JSON.parse(result);

            resp.forEach(element => {
                var index = resp.indexOf(element);
                var html = "<tr id='" + index + "'>";
                for (var count = 0; count <= 9; count++) {
                    html = html + "<td>" + element[count] + "</td>";
                }
                html = html + '<td><button id="' + index + '" class="btn btn-warning update">Atualizar</button></td><td><button type="button" class="btn btn-danger">Apagar</button></td></tr>';
                $("#tb_Users").append(html);
            });
        }
    })

})
