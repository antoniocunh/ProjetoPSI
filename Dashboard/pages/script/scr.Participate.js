$(document.body).hide();
$(function () {
  $(document).ready(function () {
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

    function autocompleteMultiple(users, selected) {
      var autocomplete = new SelectPure(".autocomplete-select", {
        options: users,
        multiple: true,
        autocomplete: true,
        icon: "fa fa-times",
        placeholder: "- Escolha Por Favor -",
        value: selected,
        onChange: value => {
          var user = [];
          $("#sendMembros").empty();
          value.forEach(function (element) {
            $("#sendMembros").append("<option id ='M" + element + "'>" + element + "</option>");
            $("#M" + element).attr("selected", "selected");
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
      console.log(autocomplete);
    }

    $(document).ready(function () {
      $.ajax({
        url: "../../assets/php/Object/obj.GetUsernames.php",
        success: function (result) {
          var users = [];
          resp = JSON.parse(result);

          $.ajax({
            url: "../../assets/php/Object/obj.GetMyUsername.php",
            success: function (result) {
              username = JSON.parse(result);

              resp.forEach(element => {
                if(element["vcUsername"] == username){
                  var temp = {
                    label: element["vcUsername"],
                    value: element["vcUsername"],
                    disabled: true
                  }
                }else{
                  var temp = {
                    label: element["vcUsername"],
                    value: element["vcUsername"]
                  }
                }
                users.push(temp);
              });
              autocompleteMulti([]);
              autocompleteUnique([]);
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
        resp = JSON.parse(result);
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
          resp = JSON.parse(result);
          
          alert(resp.msg);
          location.reload();
        }
      });
    });

    $(document).on('click', "#submit", function (e) {

      e.preventDefault();
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
        success: function (result) {
          var text = JSON.parse(result);
          alert(text.msg);
          location.reload();
        }
      })
    })



    $('form[name="InsertWork"]').validate({
      rules: {
        vcTitle: 'required',
        vcSummary: 'required',
        sendMembros: 'required',
        sendAutorP: 'required',
        sendSpeakers: 'required',
      },
      messages: {
        vcTitle: 'Por favor introduza um Titulo.',
        vcSummary: 'Por favor introduza um Resumo.',
        sendMembros: 'Por favor selecione pelo menos 1 utilizador.',
        sendAutorP: 'Por favor selecione o autor principal.',
        sendSpeakers: 'Por favor selecione pelo menos 1 apresentador.',
        submitHandler: function (form) {
          //location.reload();
        }
      }
    })

    $(document.body).fadeIn(300);
  });
})