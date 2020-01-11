$(function () {
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
        console.log(value);
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


  /*$("#submit").on("click", function () {
    $("#form").submit();
  })*/

  $(document).ready(function () {
    $.ajax({
      url: "../../assets/php/Object/Register/getAmbito.php",
      success: function (result) 
      {
          resp = JSON.parse(result);
          keys = Object.keys(resp);
          keys.forEach(element => {
              $("[name='iIdScope']").append("<option name='" + resp[element].iIdScope + "' value='" + resp[element].iIdScope + "'>" + resp[element].vcName + "</option>");
          });
        }
      });
    });

    $(document).ready(function () {
      $.ajax({
        url: "../../assets/php/Object/obj_GetWorkType.php",
        success: function (result) 
        {
            resp = JSON.parse(result);
            keys = Object.keys(resp);
            keys.forEach(element => {
                $("[name='iIdTypeWork']").append("<option name='" + resp[element].iIdTypeWork + "' value='" + resp[element].iIdTypeWork + "'>" + resp[element].vcDescription + "</option>");
            });
          }
        });
    });

  $(document).on('click', "#submit", function () {
    /*
      NOTA 

      O nome deste campo na tb_worktype tá assim:
        iIdTypeWork (PK)
      O nome deste campo na tb_article tá assim:
        iIDTypeWork (FK)
      
        Isto faz diferença

        Pra ja pode tar assim mas depois é pra rever



        O post desta cena acho q nao é assim q se faz
         -> obj_InsertTrabalho.php
    */
    $.ajax({
        url: '../../assets/php/Object/obj_InsertAvaliacao.php',
        type: 'POST',
        data: $("#InsertArticle").serialize(),
        success: function(msg) {
            console.log(msg);
            var text = JSON.parse(msg);
        }               
    });
  });

  
  $('form[name="InsertArticle"]').validate({
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
            form.submit();
        }
    }
  })
  

})