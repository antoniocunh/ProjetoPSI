$(function () {
    $(document).ready(function () {

        $(document).on('click', "#sendEmail", function () {
            $.ajax({
                url: './assets/php/Object/Email/obj.SendEmail.php',
                type: 'POST',
                data: {
                    email: $("#emailUser").val(),
                    name: $("#nomeUser").val(),
                    subject: "Contacta-nos", 
                    message: $("#msgUser").val()
                },
                success: function(result) {
                    alert('Enviado com sucesso!');
                    /*var returned = true;
                    if(result.trim()=='0')
                        returned=false;

                    calledSuccess(returned, notify);*/
                }      
            });
        });
    });
})
