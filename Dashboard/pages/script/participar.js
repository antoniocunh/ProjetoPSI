$(function () {
  

    $(document).ready(function () {
      $.ajax({
        url: "../../assets/php/Object/getUsers.php",
        success: function (result) {
          resp = JSON.parse(result);
          console.log(resp);
  
          resp.forEach(element => {
            console.log(element[0]);
            $("#autores").append("<option>" + element["vcUsername"] + "</option>");
          });
        }
      });
        var options = {
          url: "../../assets/php/Object/getUsers.php",
          placeholder: "Selecione Autor Principal",
          getValue: "vcUsername",
          list: {
            match: {
              enabled: true
            }
          }
        };

      $("#autorPrincipal").easyAutocomplete(options);
    });

})