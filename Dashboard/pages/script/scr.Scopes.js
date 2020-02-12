$(document.body).hide();
$(function () {
    $(document).ready(function () {
        var resp_Scope, table;

        $.ajax({
            url: "../../assets/php/Object/obj.GetScope.php",
            success: function (result) {
                resp_Scope = JSON.parse(result);
                if (jQuery.isEmptyObject(resp_Scope)) {
                    $("#tb_scope").html("<p>Neste preciso momento não existem preços definidos.</p>");
                }
                writeRows();
            }
        });

        //Get Rows for table in HTML
        function writeRows() {
            $("#tb_scope").empty();
            $("#tb_scope").append('<thead class=" text-primary"> <th style="width: 50px;">ID</th> <th>Nome</th> <th style="width: 150px;">Ações</th> </thead> <tbody>');

            var html = "";

            resp_Scope.forEach(element => {
                var index = resp_Scope.indexOf(element);
                html += "<tr id='" + index + "'>";

                for (var count = 0; count <= 1; count++) {
                    html += "<td>";
                    html += element[count];
                    html += "</td>";
                }

                html += '<td align="center"> <button id="e' + index + '" class="btn btn-warning editar"><i class="fa fa-pencil"></i></button> <button id="e' + index + '" class="btn btn-danger eliminar"><i class="fa fa-trash"></i></button> </td> </tr>';
            })
            $("#tb_scope").append(html);
            $("#tb_scope").append('</tbody>');
            $(document).on('DOMNodeInserted', function (e) {
                $('#tb_scope').DataTable();
            })
        }

        //Click Button ->Show Modal
        $(document).on('click', ".editar", function () {
            var id = this.id.substring(1);

            $("#iIdScope").val(resp_Scope[id][0]);
            $("#vcName").val(resp_Scope[id][1]);

            $("#Modal").modal("show");
        });

        //Insert Scope
        $(document).on('click', "#editScope", function () {
            $.ajax({
                url: '../../assets/php/Object/obj.UpdateScope.php',
                type: 'POST',
                data: {
                    iIdScope: $("#iIdScope").val(),
                    vcName: $("#vcName").val()
                },
                success: function (msg) {
                    var text = JSON.parse(msg);
                    $("#Modal").modal("toggle");
                    location.reload();
                }
            });
        });

        $(document).on('click', ".adicionar", function () {
            $("#ModalAddScope").modal("show");
        });

        
        $(document).on('click', ".eliminar", function () {
            var id = this.id.substring(1);
            $.ajax({
                url: '../../assets/php/Object/obj.DeleteScope.php',
                type: 'POST',
                data: {
                    iIdScope: resp_Scope[id].iIdScope,
                },
                success: function (msg) {
                  try{
                    var text = JSON.parse(msg);
                    alert(text.msg);

                    resp_Scope.splice($.inArray(resp_Scope[id], resp_Scope), 1);
                    //writeRows();
                    location.reload();
                  }catch(e)
                  {
                    alert('Este Âmbito não pode ser apagado pois existem relações com o mesmo.');
                  }
                }
                
            });
           
        });

        //Insert Scope
        $(document).on('click', "#insertScope", function () {
            $.ajax({
                url: '../../assets/php/Object/obj.InsertScope.php',
                type: 'POST',
                data: {
                    vcName: $("#add_vcName").val(),
                },
                success: function (msg) {
                    var text = JSON.parse(msg);
                    $("#ModalAddScope").modal("toggle");
                    location.reload();
                }
            });
        });

        $(document.body).fadeIn(300);
    })


    $(function() {
        $("#ModalAddScope").validate({
          rules: {
            vcName: {
              required: true,
            },
            action: "required"
          },
          messages: {
            vcName: {
                required: 'Por favor introduza um nome.'
            },
            action: "Please provide some data"
          }
        });
      });

});

