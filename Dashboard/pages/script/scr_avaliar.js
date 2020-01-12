$(function () {
    $(document).ready(function () {
    var resp;

    $.ajax({
        url: "../../assets/php/Object/obj_GetTrabalhos.php",
        success: function (result) {
            resp = JSON.parse(result);
            getRows();
        }
    });

    //Get Rows for table in HTML
    function getRows() {
        console.log(resp);
        resp.forEach(element => {
            var index = resp.indexOf(element);
            var html = "<tr id='" + index + "'>";
            for (var count = 0; count <= 4; count++) {
                html = html + "<td>" + element[count] + "</td>";
            }
            html = html + '<td><button id="a' + index + '" class="btn btn-warning avaliar">Avaliar</button></td></tr>';
            $("#tb_Work").append(html);
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
            url: '../../assets/php/Object/obj_InsertAvaliacao.php',
            type: 'POST',
            data: {
                iIdWork: $("#iIdWork").val(), 
                iRate: $("#FormControlSelect1").val(),
                vcReview: $("#vcReview").val()
            },
            success: function(msg) {
                console.log(msg);
                var text = JSON.parse(msg);
                alert(text.msg);
                
            }               
        });
    });


    })
});