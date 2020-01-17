$(function () {
    function ambito(){
        $.ajax({
            url: "../../assets/php/Object/Register/getAmbito.php",
            success: function (result) 
            {
                resp = JSON.parse(result);
                keys = Object.keys(resp);
                keys.forEach(element => {
                    $("[name='iIdScope']").append("<option name='" + resp[element].iIdScope + "' value='" + resp[element].iIdScope + "'>" + resp[element].vcName + "</option>");
                });
            }
    })
    }

     function user(){
        $.ajax({
            url: "../../assets/php/Object/obj_GetProfile.php",
            success: function (result) 
            {
                resp = JSON.parse(result);
                
                keys = Object.keys(resp);
                keys.forEach(element => {
                    $("[name='" + element + "']").val(resp[element]);
                });
            }
        })
    }

    $('form[name="formPerfil"]').validate({
        debug: true,
        errorElement: "div",
        rules: {
            nome: 'required',
            ultimoNome: 'required',
            ambito: 'required',
            morada: 'required',
            telefone: 'required',
            pais: 'required',
            cidade: 'required',
            dataNascimento: {
                required: true,
                maior18: true,
                date: true
            },
            email: {
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
            username: {
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
            pass1: {
                required: true,
                minlength: 8,
            },
            pass2: {
                equalTo: "#pass1"
            },
        },
        messages: {
            nome: 'Por favor introduza um nome.',
            ultimoNome: 'Por favor introduza um sobrenome.',
            ambito: 'Por favor selecione um âmbito.',
            morada: 'Por favor introduza uma morada.',
            telefone: 'Por favor introduza um nº de telefone.',
            pais: 'Por favor selecione um pais.',
            cidade: 'Por favor introduza uma cidade.',
            dataNascimento: {
                required: 'Por favor introduza a sua data de Nascimento',
                maior18: 'Tem de ser maior de 18 para poder se registar.'
            },
            email: {
                required: 'Por favor introduza um email.',
                email: 'Por favor introduza um email válido.',
            },
            username: {
                required: 'Por favor introduza um username.',
                minlength: 'O username tem de ter pelo menos 4 caracteres.'
            },
            pass1: {
                required: 'Por favor introduza uma palavra-passe.',
                minlength: 'A palavra-passe tem de ter pelo menos 8 caractéres.',
            },
            pass2: {
                required: 'Por favor introduza uma palavra-passe.',
                equalTo: 'A palavra-passe não é igual á introduzida anteriormente'
            },
        },
        submitHandler: function (form) {
            $.ajax({
                url: "../../assets/php/Object/updatePerfil.php",
                type: 'POST',
                data: $("#formPerfil").serialize(),
                success: function (msg) {
                    var text = JSON.parse(msg);
                    alert(text.msg);
                }
            });
        }
    });

    ambito();
    user();
})