$(function () {
    $.ajax({
            url: "../assets/php/apis/getAmbito.php",
            success: function (result) {
                teste = JSON.parse(result);
                
                console.log(result);
                teste.forEach(function (item) {
                    console.log(item);
                    $('#scope').append("<option value='" + item.iIdScope + "'> "+ item.vcName + "</option>");
                });
            }
        }),


        $('form[name="registo"]').validate({
            errorElement: "div",
            rules: {
                nome: 'required',
                ultimoNome: 'required',
                ambito: 'required',
                morada: 'required',
                telefone: 'required',
                pais: 'required',
                cidade: 'required',
                dataNascimento: 'required',
                email: {
                    required: true,
                    email: true,
                },
                username: {
                    required: true,
                    minlength: 6,
                },
                pass1: {
                    required: true,
                    minlength: 8,
                },
                pass2: {
                    required: true,
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
                dataNascimento:'Por favor introduza a sua data de Nascimento',
                email: {
                    required: 'Por favor introduza um email.',
                    email: 'Por favor introduza um email válido.',
                },
                username: {
                    required: 'Por favor introduza um username.',
                    minlength: 'O user tem de ter pelo menos 6 caracteres.'
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
                form.submit();
            }
        });
});