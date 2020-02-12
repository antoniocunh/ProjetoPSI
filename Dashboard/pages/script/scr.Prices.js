$(document.body).hide();
$(function () {
    $(document).ready(function () {
        var resp_Price;

        $.ajax({
            url: "../../assets/php/Object/obj.GetPrices.php",
            success: function (result) {
                resp_Price = JSON.parse(result);
                if (jQuery.isEmptyObject(resp_Price)) {
                    $("#tb_price").html("<p>Neste preciso momento não existem preços definidos.</p>");
                }
                writeRows();
            }
        });
        
        $.ajax({
            url: '../../assets/php/Object/obj.GetRoles.php',
            type: 'POST',
            success: function (msg) {
                var resp = JSON.parse(msg);
                resp.forEach(function (element) {
                    console.log(element);
                    $("#role").append("<option id='role" + element.iIDTypeUser + "' value ='" + element.iIDTypeUser + "'>" + element.vcDescription + "</option>");
                })
            }
        });

        //Get Rows for table in HTML
        function writeRows() {
            $("#tb_price").empty();
            $("#tb_price").append('<thead class=" text-primary"> <th style="width: 50px;">ID</th> <th  style="width: 80px;">Preço</th> <th>Descrição</th> <th  style="width: 50px;">Ação</th> </thead> <tbody>');

            var html = "";

            resp_Price.forEach(element => {
                var index = resp_Price.indexOf(element);
                html += "<tr id='" + index + "'>";

                for (var count = 0; count <= 2; count++) {
                    html += "<td>";
                    html += element[count];
                    html += "</td>";
                }

                html += '<td align="center"> <button id="e' + index + '" class="btn btn-warning editar"><i class="fa fa-pencil"></i></button> </td> </tr>';
            })
            $("#tb_price").append(html);
            $("#tb_price").append('</tbody>');
            $(document).on('DOMNodeInserted', function (e) {
                $('#tb_price').DataTable();
            })
        }

        //Click Button ->Show Modal
        $(document).on('click', ".editar", function () {
            var id = this.id.substring(1);

            $("#iIdPrice").val(resp_Price[id][0]);
            $("#dPrice").val(resp_Price[id][1]);
            $("#vcDescription").val(resp_Price[id][2]);

            /*console.log(resp_Price[id][4]);
            $("#role").val(resp_Price[id][4]);*/
            
            $("#Modal").modal("show");
        });

        //Insert Price
        $(document).on('click', "#editPrice", function () {
            $.ajax({
                url: '../../assets/php/Object/obj.UpdatePrice.php',
                type: 'POST',
                data: {
                    iIdPrice: $("#iIdPrice").val(),
                    dPrice: $("#dPrice").val(),
                    vcDescription: $("#vcDescription").val(),
                    iIDTypeUser: $("#role").val()
                },
                success: function (msg) {
                    var text = JSON.parse(msg);
                    $("#Modal").modal("toggle");
                    location.reload();
                }
            });
        });

        $(document).on('click', ".adicionar", function () {
            $("#ModalAddPrice").modal("show");
        });

        //Insert Price
        $(document).on('click', "#insertPrice", function () {
            $.ajax({
                url: '../../assets/php/Object/obj.InsertPrice.php',
                type: 'POST',
                data: {
                    dPrice: $("#add_dPrice").val(),
                    vcDescription: $("#add_vcDescription").val()
                },
                success: function (msg) {
                    var text = JSON.parse(msg);
                    $("#ModalAddPrice").modal("toggle");
                    location.reload();
                }
            });
        });

        $(document.body).fadeIn(300);
    })

});


/*
  $(function() {
        $("#ModalAddPrice").validate({
          rules: {
            add_dPrice: {
              required: true,
            },
            action: "required"
          },
          messages: {
            add_dPrice: {
                required: 'Por favor introduza um preço valido.'
            },
            action: "Please provide some data"
          }
        });
      });*/