$(function () {
    $.ajax({
            url: "../../assets/php/Object/getEvento.php",
            success: function (result) 
            {
                resp = JSON.parse(result);
                console.log(resp);
                
                keys = Object.keys(resp);
                keys.forEach(element => {
                    $("[name='" + element + "']").val(resp[element]);
                    console.log(resp[element]);
                    if(element == "dtIniSubmition"){
                        $("[name='" + element + "']").val(resp[element].substring(0, resp[element].indexOf(' ')));
                    }
                });
            }
    }),

    $('form[name="registo"]').validate({
        rules: {
            iIdEvent:"required",
            vcTitle:"required",
            vcDescription:"required",
            dtIniSubmition:"required",
            dtEndSubmition:"required",
            dtIniEvaluation:"required",
            dtEndEvaluation:"required",
            dtResults:"required",
            dtIniFinalSubmission:"required",
            dtEndFinalSubmission:"required",
            dtIniSubscription:"required",
            dtEndSubscription:"required",
            vcLocal:"required",
            dtIniEvent:"required",
            dtEndEvent:"required"
        },
        messages: {
            iIdEvent:"Nome de evento obrigatório.",
            vcTitle:"required",
            vcDescription:"required",
            dtIniSubmition:"required",
            dtEndSubmition:"required",
            dtIniEvaluation:"required",
            dtEndEvaluation:"required",
            dtResults:"required",
            dtIniFinalSubmission:"required",
            dtEndFinalSubmission:"required",
            dtIniSubscription:"required",
            dtEndSubscription:"required",
            vcLocal:"required",
            dtIniEvent:"required",
            dtEndEvent:"required"
        },
        submitHandler: function(form){
            form.submit();
        }
    })
})