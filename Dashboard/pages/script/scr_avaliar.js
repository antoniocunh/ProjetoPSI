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
        resp.forEach(element => {
            var index = resp.indexOf(element);
            var html = "<tr id='" + index + "'>";
            
            console.log(element);
            for (var count = 0; count <= 4; count++) {
                html += "<td>";
                //apagar para o Ciro
                if(count == 3){
                    html += element[count] + " " + element.vcLastName;
                }else if(count == 4){
                    html += "<a href='../../assets/php/Object/getTrabalho.php?iIdAttachment=" + element.iIdAttachment +"'>" + element[count] + "</a>";
                }else{
                    html += element[count];
                }
                html += "</td>";

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