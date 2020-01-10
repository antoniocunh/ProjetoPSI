$.ajax({
    url: "../../assets/php/Object/obj_Avaliacao.php",
    success: function (result) {
        resp = JSON.parse(result);

        resp.forEach(element => {
            var index = resp.indexOf(element);
            var html = "<tr id='" + index + "'>";
            for (var count = 0; count <= 9; count++) {
                html = html + "<td>" + element[count] + "</td>";
            }
            html = html + '<td><button id="a' + index + '" class="btn btn-warning update">Enviar</button></td></tr>';
            $("#tb_Article").append(html);
        });
    }
});