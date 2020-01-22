$(document.body).hide();
$(function () {
  $(document).ready(function () {
    var username;

    function autocompleteUnique(users) {
      $(".single-select").remove();
      $("#principal").append("<span class='single-select'></span>");
      var single = new SelectPure(".single-select", {
        options: users,
        placeholder: "- Escolha Por Favor -",
        onChange: value => {
          $("#sendAutorP").append("<option id ='AP" + value + "'>" + value + "</option>");
          $("#AP" + value).attr("selected", "selected");
        },
      });
    }

    function autocompleteMulti(users) {
      $(".multi-select").remove();
      $("#speakers").append("<span class='multi-select'></span>");
      var single = new SelectPure(".multi-select", {
        options: users,
        placeholder: "- Escolha Por Favor -",
        multiple: true,
        autocomplete: true,
        icon: "fa fa-times",
        onChange: value => {
          $("#sendSpeakers").empty();
          value.forEach(function (element) {
            $("#sendSpeakers").append("<option id ='S" + element + "'>" + element + "</option>");
            $("#S" + element).attr("selected", "selected");
          });

        },
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
          value.forEach(function (element) {
            $("#M" + element).attr("selected", "selected");
            var temp = {
              label: element,
              value: element
            }
            user.push(temp);
          })
          var mainUser = {
            label: username,
            value: username
          }
          user.push(mainUser);
          autocompleteUnique(user);
          autocompleteMulti(user);
        },
      });
    }

    $(document).ready(function () {
      $.ajax({
        url: "../../assets/php/Object/obj.GetUsernames.php",
        success: function (result) {
          var users = [];
          var respPers = JSON.parse(result);


          $.ajax({
            url: "../../assets/php/Object/obj.GetMyUsername.php",
            success: function (result) {
              username = JSON.parse(result);

              respPers.forEach(element => {
                if (element["vcUsername"] != username) {
                  var temp = {
                    label: element["vcUsername"],
                    value: element["vcUsername"]
                  }
                  $("#sendMembros").append("<option id ='M" + element["vcUsername"] + "'>" + element["vcUsername"] + "</option>");
                  users.push(temp);
                }
              });
              var mainUser = {
                label: username,
                value: username
              }
              $("#sendMembros").append("<option id ='M" + username + "'>" + username + "</option>");
              $("#M" + username).attr("selected", "selected");
              autocompleteMulti([mainUser]);
              autocompleteUnique([mainUser]);
              autocompleteMultiple(users, [username]);
            }
          });
        }
      });
    });

    $.ajax({
      url: "../../assets/php/Object/obj.GetScope.php",
      success: function (result) {
        resp = JSON.parse(result);
        keys = Object.keys(resp);
        keys.forEach(element => {
          $("[name='iIdScope']").append("<option name='" + resp[element].iIdScope + "' value='" + resp[element].iIdScope + "'>" + resp[element].vcName + "</option>");
        });
      }
    });

    $.ajax({
      url: "../../assets/php/Object/obj.GetWorkType.php",
      success: function (result) {
        var resp = JSON.parse(result);
        keys = Object.keys(resp);
        keys.forEach(element => {
          $("[name='iIdTypeWork']").append("<option name='" + resp[element].iIdTypeWork + "' value='" + resp[element].iIdTypeWork + "'>" + resp[element].vcDescription + "</option>");
        });
      }
    });

    $(document).on('click', "#botaoParticipante", function (e) {
      $.ajax({
        url: "../../assets/php/Object/obj.SetParticipant.php",
        success: function (result) {
          console.log(result);
          var resp = JSON.parse(result);

          alert(resp.msg);
          location.reload();
        }
      });
    });

    $('form[name="InsertWork"]').validate({
      rules: {
        vcTitle: 'required',
        vcSummary: 'required',
        'membros[]': {
          required: true,
          minlength: 1
        },
        autorP: 'required',
        'speakers[]': {
          required: true,
          minlength: 1
        },
      },
      messages: {
        vcTitle: 'Por favor introduza um Titulo.',
        vcSummary: 'Por favor introduza um Resumo.',
        'membros[]': 'Por favor selecione pelo menos 1 utilizador.',
        autorP: 'Por favor selecione o autor principal.',
        'speakers[]': 'Por favor selecione pelo menos 1 apresentador.',
      },
      submitHandler: function (form) {
        var fd = new FormData();
        var file = document.getElementById("docs").files[0];
        console.log(file);
        fd.append('file', file);
        fd.append("iIdTypeWork", $("#iIdTypeWork").val());
        fd.append("iIdScope", $("#iIdScope").val());
        fd.append("vcTitle", $("#vcTitle").val());
        fd.append("vcSummary", $("#vcSummary").val());
        fd.append("membros", JSON.stringify($("#sendMembros").val()));
        fd.append("autorP", $("#sendAutorP").val());
        fd.append("speakers", JSON.stringify($("#sendSpeakers").val()));
        $.ajax({
          url: "../../assets/php/Object/obj.InsertWork.php",
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          type: 'POST',
          beforeSend: function () {
            $("#submit").prop("disabled", true);
          },
          success: function (result) {
            var text = JSON.parse(result);
            alert(text.msg);
            location.reload();
          }
        })
        //location.reload();
      }
    }),
    $(document.body).fadeIn(300);
  });
})