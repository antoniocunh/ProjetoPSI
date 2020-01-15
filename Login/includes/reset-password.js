$(document).ready(function () {
    $('form[name="novaPass"]').validate({
        rules: {
            pass1: {
                required: true,
                minlength: 8,
            },
            pass2: {
                equalTo: "#pass1"
            },
        },
        messages: {
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

