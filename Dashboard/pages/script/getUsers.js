$(function () {
    $.ajax({
            url: "../../assets/php/Object/getUsers.php",
            success: function (result) 
            {
                resp = JSON.parse(result);
                console.log(resp);
                
                resp.forEach(element => 
                    {
                        //console.log(element[0]);
                        $("#tb_Users").append("<thead>");
                        for(var count = 0; count <= 9; count++)
                        {
                            $("#tb_Users").append("<td>" + element[count] + "</td>");
                        }
                        $("#tb_Users").append('<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Opções</button></td></thead>');
                    });
            }
    })
})