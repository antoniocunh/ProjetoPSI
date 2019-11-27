$(function() {
    $('form[name="registo"]').validate(
    {
        rules: {
            nome: 'required',
            ultimoNome: 'required',
            ambito: 'required',
            morada: 'required',
            telefone: 'required',
            pais: 'required',
            cidade: 'required',
            codPostal: 'required',
            organizacao: 'required',
            email: 'required',
            username: {
                required: true,
                email: true,
            },
            pass1: {
                required: true,
                minlength: 8,
            },
            pass2: {
                required: true,
                minlength: 8,
            }
        },
        messages: {
            nome: 'This field is required',
            nome: 'required',
            ultimoNome: 'required',
            ambito: 'required',
            morada: 'required',
            telefone: 'required',
            pais: 'required',
            cidade: 'required',
            codPostal: 'required',
            organizacao: 'required',
            email: 'required',
            username: {
                required: 'required',
                email: 'required',
            },
            pass1: {
                required: 'required',
                minlength: 'required',
            },
            pass2: {
                required: 'required',
                minlength: 'required',
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});