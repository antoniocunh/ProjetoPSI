
var $url = "assets/php/Facade/Event.php";

$(function getTitle()
{
    $.ajax({
            url: $url,
            success: function (result) 
            {
                _Resp = JSON.parse(result);
                console.log(_Resp);
                 $('#confTitle').html(_Resp[0].vcTitle);
            }
})});