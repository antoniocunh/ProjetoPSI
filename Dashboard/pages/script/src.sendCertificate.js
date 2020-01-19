$(function () {
    
    $(document).ready(function () {

        $(document).on('click', "#enviar", function () {
            if($('form[name="certificados"]').valid())
                $("#Modal").modal('show');
        });

        $(document).on('click', "#submit", function () {
            $("#Modal").modal('toggle');

            var notify = $.notify('<strong>A processar</strong> - Certificados estão a ser gerados.', {
                allow_dismiss: false,
                showProgressbar: true
            });

            $.ajax({
                url: '../../assets/php/Object/obj.Certificates.php',
                type: 'POST',
                data: {
                    subject: $("#subject").val(), 
                    message: $("#message").val(),
                    role: $("#role").val()
                },
                success: function(result) {
                    var returned = true;

                    if(result.trim()=='0')
                        returned=false;

                    calledSuccess(returned, notify);
                }      
            });
        });

        
        function calledSuccess(result, notify) {
            if(result) {
                setTimeout(function() {
                    notify.update({
                        'type': 'success', 
                        'message': '</i><strong>Sucesso</strong> - Certificados enviados com sucesso!', 
                        'progress': 100
                    })
                ;}, 2000);
            } else {
                setTimeout(function() {
                    notify.update({
                        'type': 'danger', 
                        'message': '</i><strong>Falhou</strong> - Algo correu mal!', 
                        'progress': 100
                    })
                ;}, 2000);
            }
          }


        $('form[name="certificados"]').validate({
            rules: {
              message: 'required',
              subject: 'required',
            },
            messages: {
                message: 'Por favor introduza uma mensagem para o corpo do email.',
                subject: 'Por favor introduza um titulo de email.',
            submitHandler: function (form) {
                    form.submit();
                }
            }
          })
    });
})

