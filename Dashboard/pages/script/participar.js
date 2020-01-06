$(function () {  
  function autocompleteUnique() {
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
}

function autocompleteMultiple(users) {
  var autocomplete = new SelectPure(".autocomplete-select", {
    options: users,
    multiple: true,
    autocomplete: true,
    icon: "fa fa-times",
    onChange: value => {
      value.forEach(function(element){
        $("#" + element).attr("selected", "selected");
      })
      console.log(value);
    },
  });
}

$(document).ready(function () {
  $.ajax({
    url: "../../assets/php/Object/getUsers.php",
    success: function (result) {
      var users = [];
      resp = JSON.parse(result);

      resp.forEach(element => {
        $("#autores").append("<option>" + element["vcUsername"] + "</option>");
        $("#phpSender").append("<option id ='" + element["vcUsername"] + "'>" + element["vcUsername"] + "</option>");
        var temp = {
          label: element["vcUsername"],
          value: element["vcUsername"]
        }
        users.push(temp);
      });
      autocompleteUnique();
      autocompleteMultiple(users);

    }
  });
});
  $("#submit").on("click", function () {
    $("#form").submit();
  })
})