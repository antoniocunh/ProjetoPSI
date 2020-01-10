$(function () {  
  function autocompleteUnique(users) {
    $(".single-select").remove();
    $("#principal").append("<span class='single-select'></span>");
    console.log(users);
    var single = new SelectPure(".single-select", {
      options: users,
      placeholder: "- Escolha Por Favor -",
      onChange: value => { console.log(value); },
    });
}

function autocompleteMulti(users) {
  $(".multi-select").remove();
  $("#speakers").append("<span class='multi-select'></span>");
  console.log(users);
  var single = new SelectPure(".multi-select", {
    options: users,
    placeholder: "- Escolha Por Favor -",
    multiple: true,
    autocomplete: true,
    icon: "fa fa-times",
    onChange: value => { console.log(value); },
  });
}

function autocompleteMultiple(users) {
  var autocomplete = new SelectPure(".autocomplete-select", {
    options: users,
    multiple: true,
    autocomplete: true,
    icon: "fa fa-times",
    placeholder: "- Escolha Por Favor -",
    onChange: value => {
      var user = [];
      value.forEach(function(element){
        $("#autores").append("<option>" + element["vcUsername"] + "</option>");
        $("#phpSender").append("<option id ='" + element["vcUsername"] + "'>" + element["vcUsername"] + "</option>");
        $("#" + element).attr("selected", "selected");      
        var temp = {
          label: element,
          value: element
        }
        user.push(temp);
      })
      autocompleteUnique(user);
      autocompleteMulti(user);
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
        var temp = {
          label: element["vcUsername"],
          value: element["vcUsername"]
        }
        users.push(temp);
      });
      autocompleteMulti([]);
      autocompleteUnique([]);
      autocompleteMultiple(users);

    }
  });
});
  $("#submit").on("click", function () {
    $("#form").submit();
  })
})