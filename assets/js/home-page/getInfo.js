
$(function () {
    $.ajax({
            url: "assets/php/apis/getPageEventInfo.php",
            success: function (result) {
                teste = JSON.parse(result);
                console.log(teste);
                 $('#conferenceTitle').html(teste[0].vcDescription);
            }
        })});