$(function () {
    $.ajax({
            url: "../../assets/php/Object/getEvento.php",
            success: function (result) 
            {
                resp = JSON.parse(result);
                console.log(resp);
                keys = Object.keys(resp);
                keys.forEach(element => {
                    if(element == "dtIniEvent"){
                        console.log(resp[element]);
                        resp[element] = resp[element].replace(/ /g, "T", -1);
                    }
                    $("[name='" + element + "']").val(resp[element]);
                    console.log(resp[element]);
                    console.log(element);
                });
            }
    }),

    $('form[name="evento"]').validate({
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
            vcTitle:"Titulo obrigatório.",
            vcDescription:"Descrição obrigatório.",
            dtIniSubmition:"Data do inicio de submissão obrigatório.",
            dtEndSubmition:"Data do fim de submissão obrigatório.",
            dtIniEvaluation:"Data do inicio de avaliação obrigatório.",
            dtEndEvaluation:"Data do fim de avaliação obrigatório.",
            dtResults:"Data de lançamento dos resultados obrigatório.",
            dtIniFinalSubmission:"Data do inicio da submissão final obrigatória.",
            dtEndFinalSubmission:"Data do fim da submissão final obrigatória.",
            dtIniSubscription:"Data do inicio da inscrição no evento obrigatória.",
            dtEndSubscription:"Data do fim da inscrição no evento obrigatória.",
            vcLocal:"Local do evento obrigatório.",
            dtIniEvent:"Data do inicio do evento obrigatório.",
            dtEndEvent:"Data do fim do evento obrigatório."
        },
        submitHandler: function(form){
            form.submit();
        }
    })
})