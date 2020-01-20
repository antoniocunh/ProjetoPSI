$(function () {
    $.ajax({
            url: "../assets/php/Object/obj.GetScope.php",
            success: function (result) 
            {
                _Resp = JSON.parse(result);
                _Resp.forEach(function (item) { $('#scope').append("<option value='" + item.iIdScope + "'> "+ item.vcName + "</option>"); });
            }
        }),

        $.validator.addMethod("maior18", function(value, element) {
            chooseDate = new Date(value);
            atualDate = new Date(Date.now());
            if(atualDate.getFullYear() - chooseDate.getFullYear() == 18){
                if(chooseDate.getMonth() <= atualDate.getMonth()){      
                    if(chooseDate.getDate() <= atualDate.getDate()){      
                        return true;
                    }
                }
            }
            if(atualDate.getFullYear() - chooseDate.getFullYear() > 18){
                return true;
            }
            return false;
        });


        $('form[name="registo"]').validate({
            debug: true,
            errorElement: "div",
            rules: {
                nome: {
                    required: true
                },
                ultimoNome: {
                    required: true
                },
                scope: 'required',
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
                        url: "../assets/php/Object/obj.GetEmail.php",
                        type: "post",
                        data: {
                          username: function() {
                            return $( "#email" ).val();
                          }
                        }
                      }
                },
                username: {
                    required: true,
                    minlength: 4,
                    remote: {
                        url: "../assets/php/Object/obj.GetUsername.php",
                        type: "post",
                        pattern: /^[a-zA-Z0-9]+$/,
                        data: {
                          username: function() {
                            return $( "#username" ).val();
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
                nome:{
                    required: 'Por favor introduza um nome. CONA'
                },
                ultimoNome: {
                    required: 'Por favor introduza um sobrenome.'
                },
                scope: 'Por favor selecione um âmbito.',
                morada: 'Por favor introduza uma morada.',
                telefone: 'Por favor introduza um nº de telefone.',
                pais: 'Por favor selecione um pais.',
                cidade: 'Por favor introduza uma cidade.',
                dataNascimento:{
                    required: 'Por favor introduza a sua data de Nascimento',
                    maior18: 'Tem de ser maior de 18 para poder se registar.'
                },
                email: {
                    required: 'Por favor introduza um email.',
                    email: 'Por favor introduza um email válido.',
                },
                username: {
                    required: 'Por favor introduza um username.',
                    minlength: 'O username tem de ter pelo menos 4 caracteres.',
                    pattern: "O campo username não permite caracteres especiais ou numeros"
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
                    url: '../../assets/php/Object/obj.CreateUser.php',
                    type: 'POST',
                    data: $("#registo").serialize(),
                    success: function (msg) {
                        var text = JSON.parse(msg);
                        alert(text.msg);
                        location.href = "../../Login/index.php";
                    }
                });
            }
        });

        
        
  

});