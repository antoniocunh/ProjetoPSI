/**
 *  Função ajax que vai buscar as informações do evento à base de dados, utilizando json,
 *  e vai alterar os detalhes do evento na home page de acordo com os dados recebidos.
 */

$(function () {
    $(document).ready(function () {

        $.ajax({
            url: "assets/php/Object/obj.GetEvent.php",
            success: function (result) {
                _Resp = JSON.parse(result);
                console.log(_Resp);
                $('#conferenceTitle').html(_Resp.vcTitle);
                $("#descricao").html(_Resp.vcDescription);
                var inicio = new Date(_Resp.dtIniEvent);
                var fim = new Date(_Resp.dtEndEvent);
                //$("#diasELocal").html(_Resp.dtIniEvent);
                var dateInit = inicio.getDate() + "/" + inicio.getMonth() + "/" + inicio.getFullYear();
                var dateEnd = fim.getDate() + "/" + fim.getMonth() + "/" + fim.getFullYear();

                var text = "Do dia " + dateInit + " a " + dateEnd + " em " + _Resp.vcLocal;
                //$("#vcAbout").append(_Resp.vcAbout);
                $("#diasELocal").html(text);
                $("#dataInicioh").html(inicio.getDate() + "/" + inicio.getMonth() + "/" + inicio.getFullYear());
                $("#cidade").html(_Resp.vcLocal);            
            }
        })
    })
});