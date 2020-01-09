$(function () {
    $(document).ready(function () {
        var resp;
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
        });

        $.ajax({
            url: "../../assets/php/Object/Register/getAmbito.php",
            success: function (result) {
                resp = JSON.parse(result);
                resp.forEach(element => {
                    $("[name='iIdScope']").append("<option name='opt" + element.iIdScope + "' value='" + element.iIdScope + "'>" + element.vcName + "</option>");
                });
            }
        });

        $(document).on('click', ".update", function () {
            keys = Object.keys(resp[this.id]);
            keys.forEach(element => {
                $("#" + element).val(resp[this.id][element]);

            });
            $("#Modal").modal("show");
        });

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

        $('form[name="updateUser"]').validate({
            debug: true,
            errorElement: "div",
            rules: {
                vcName: 'required',
                vcLastName: 'required',
                vcAddress: 'required',
                vcCountry: 'required',
                vcCity: 'required',
                vcPostalName: 'required',
                vcPhoneNumber: 'required',
                dataNascimento: {
                    required: true,
                    maior18: true,
                    date: true
                },
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
                vcPhoneNumber: 'Por favor introduza um nº de telefone.',
                vcPostalName: 'Por favor selecione um pais.',
                vcCity: 'Por favor introduza uma cidade.',
                dataNascimento: {
                    required: 'Por favor introduza a sua data de Nascimento',
                    maior18: 'Tem de ser maior de 18 para poder se registar.'
                },
                vcEmail: {
                    required: 'Por favor introduza um email.',
                    email: 'Por favor introduza um email válido.',
                },
                vcUsername: {
                    required: 'Por favor introduza um username.',
                    minlength: 'O username tem de ter pelo menos 4 caracteres.'
                },
                submitHandler: function (form) {
                    form.submit();
                }
            }
        })
    })
});