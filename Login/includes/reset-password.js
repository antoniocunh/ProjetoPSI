$(document).ready(function () {
    $('form[name="novaPass"]').validate({
        rules: {
            pass: {
                required: true,
                minlength: 8,
            },
            confirmPass: {
                equalTo: "#pass1"
            },
        },
        messages: {
            pass: {
                required: 'Por favor introduza uma passe.',
                minlength: 'A palavra-passe tem de ter pelo menos 8 caractéres.',
            },
            confirmPass: {
                required: 'Por favor introduza uma palavra-passe.',
                equalTo: 'A palavra-passe não é igual á introduzida anteriormente'
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});

