$(function () {
    $(document).ready(function () {
        var resp;

        $.ajax({
            url: "../../assets/php/Object/getUsers.php",
            success: function (result) {
                resp = JSON.parse(result);
                writeRows();
            }
        });

        $.ajax({
            url: "../../assets/php/Object/Register/getAmbito.php",
            success: function (result) {
                var resp1 = JSON.parse(result);
                resp1.forEach(element => {
                    $("[name='iIdScope']").append("<option name='opt" + element.iIdScope + "' value='" + element.iIdScope + "'>" + element.vcName + "</option>");
                });
            }
        });

        $(document).on('click', ".update", function () {
            var id = this.id.substring(1);
            keys = Object.keys(resp[id]);
            keys.forEach(element => {
                $("#" + element).val(resp[id][element]);
            });
            $("#Modal").modal("show");
        });

        $(document).on('click', ".delete", function () {
            var id = this.id.substring(1);
            $.ajax({
                url: '../../assets/php/Object/deleteUser.php',
                type: 'POST',
                data: {
                    username: resp[id].vcUsername,
                },
                success: function (msg) {
                    var text = JSON.parse(msg);
                    alert(text.msg);
                }
            });
            keys = Object.keys(resp[id]);
            resp.splice($.inArray(id, resp), 1);
            writeRows();

        });

        $(document).on('click', "#uploadModal", function () {
            $.ajax({
                url: '../../assets/php/Object/updateUser.php',
                type: 'POST',
                data: $("#updateUser1").serialize(),
                success: function (msg) {
                    writeRows();
                    var text = JSON.parse(msg);
                    $("#Modal").modal('toggle');
                    location.reload();
                }
            });
        });

        function writeRows() {
            $("#tb_Users").empty();
            $("#tb_Users").append('<thead class=" text-primary"> <th> Nome de Utilizador </th> <th> Nome </th> <th> Apelido </th> <th> Morada </th> <th> Pais </th> <th> Cidade </th> <th> Código Postal </th> <th> E-mail </th> <th> Telemovel </th> <th> Organização </th> </tbody>');
            resp.forEach(element => {
                var index = resp.indexOf(element);
                var html = "<tr id='" + index + "'>";
                for (var count = 0; count <= 9; count++) {
                    html = html + "<td>" + element[count] + "</td>";
                }
                html = html + '<td><button id="a' + index + '" class="btn btn-warning update">Atualizar</button></td><td><button id="d' + index + '" type="button" class="btn btn-danger delete">Apagar</button></td></tr>';
                $("#tb_Users").append(html);
            })
        }

        $.validator.addMethod("maior18", function (value, element) {
            chooseDate = new Date(value);
            atualDate = new Date(Date.now());
            if (atualDate.getFullYear() - chooseDate.getFullYear() == 18) {
                if (chooseDate.getMonth() <= atualDate.getMonth()) {
                    if (chooseDate.getDate() <= atualDate.getDate()) {
                        return true;
                    }
                }
            }
            if (atualDate.getFullYear() - chooseDate.getFullYear() > 18) {
                return true;
            }
            return false;
        });

        $('form[name="updateUser1"]').validate({
            rules: {
                vcName: 'required',
                vcLastName: 'required',
                vcAddress: 'required',
                vcCountry: 'required',
                vcCity: 'required',
                vcPostalName: 'required',
                vcPhoneNumber: 'required',
                vcEmail: {
                    required: true,
                    email: true,
                    remote: {
                        url: "../../assets/php/Object/Register/getEmail.php",
                        type: "post",
                        data: {
                            username: function () {
                                return $("#email").val();
                            }
                        }
                    }
                },
                vcUsername: {
                    required: true,
                    minlength: 4,
                    remote: {
                        url: "../../assets/php/Object/Register/getUsername.php",
                        type: "post",
                        data: {
                            username: function () {
                                return $("#username").val();
                            }
                        }
                    }
                },
            },
            messages: {
                vcName: 'Por favor introduza um nome.',
                vcLastName: 'Por favor introduza um sobrenome.',
                vcScope: 'Por favor selecione um âmbito.',
                vcAddress: 'Por favor introduza uma morada.',
                vcCountry: 'Por favor preencha o país',
                vcPhoneNumber: 'Por favor introduza um nº de telefone.',
                vcPostalName: 'Por favor selecione um pais.',
                vcCity: 'Por favor introduza uma cidade.',
                vcEmail: {
                    required: 'Por favor introduza um email.',
                    email: 'Por favor introduza um email válido.',
                },
                vcUsername: {
                    required: 'Por favor introduza um username.',
                    minlength: 'O username tem de ter pelo menos 4 caracteres.'
                },
                submitHandler: function (form) {
                    form.preventDefault();
                    $.ajax({
                        url: '../../assets/php/Object/updateUser.php',
                        type: 'POST',
                        data: $("#updateUser1").serialize(),
                        success: function (msg) {
                            var text = JSON.parse(msg);
                        }
                    });
                }
            }
        })
    })
});