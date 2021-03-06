<!--
=========================================================
 Paper Dashboard 2 - v2.0.0
=========================================================

 Product Page: https://www.creative-tim.com/product/paper-dashboard-2
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/paper-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<?php
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/ValidationDates/obj.DtSubmition.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Participar Evento
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../../assets/css/paper-dashboard.css" rel="stylesheet" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="../../assets/js/plugins/autocomplete/jquery.easy-autocomplete.min.js"></script>
  <link rel="stylesheet" href="../../assets/js/plugins/autocomplete/easy-autocomplete.min.css">
  <link rel="stylesheet" href="./css/participar.css?v=2">
  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
</head>



<body style="background-color : #f4f3ef">
  <script>
    $(document).ready(function() {
      $.ajax({
        url: "../../assets/php/Object/obj.GetRoleUser.php",
        success: function(result) {
          var resp = JSON.parse(result);
          var temp = resp[0].iIdUserType;
          if(temp != 5 && temp != 7){
            $("#participarBox").remove();
          }
          if(temp == 5){
            $("#enviarTrabalho").remove();
            $("#textParticipar").html("Você já está inscrito no evento como participante.");
            $("#botaoParticipante").remove();
          }
        }
      }),
      $.ajax({
        url: "../../assets/php/Object/obj.GetEvent.php",
        success: function(result) {
          var temp= JSON.parse(result);
          if(Date.parse(temp.dtIniSubscription) > Date.now()){
            $("#textParticipar").html("A data de subscrição só está disponível a partir do dia " + temp.dtIniSubscription + ".");
            $("#botaoParticipante").remove();
          }else if(Date.parse(temp.dtEndSubscription) < Date.now()){
            $("#textParticipar").html("A data de subscrição só esteve disponível a até do dia " + temp.dtEndSubscription + ".");
            $("#botaoParticipante").remove();
          } 

          if(Date.parse(temp.dtIniSubmition) > Date.now()){
            $("#textTrabalho").html("A data de submissão só vai estar disponível a partir do dia " + temp.dtIniSubmition + ".");
            $("#submit").remove();
          }else if(Date.parse(temp.dtEndSubmition) < Date.now()){
            $("#textTrabalho").html("A data de submissão só esteve disponível a até ao dia " + temp.dtEndSubmition + ".");
            $("#submit").remove();
          }
        }
      })


      

      $("#sidebar").load("../../Common/sidebar-dashboard.html");
      $(document).on('DOMNodeInserted', function(e) {
        $("#participar").addClass("active");
      })
    })
  </script>
  <div id="sidebar"></div>

  <div class="main-panel">

    <div class="content mt-0">
      <div class="container-fluid">
        <div class="content">
          <div class="row" id="participarBox">
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header ">
                  <h5 class="card-title">Participar</h5>

                </div>
                <div class="card-body" id="textParticipar">
                  <p>Se deseja participar na conferência, confira no botão abaixo</p>
                </div>
                <div class="card-footer ">
                  <hr>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" id="botaoParticipante">
                      Participar
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row" id="enviarTrabalho">
            <div class="col-md-12">
              <div class="card" >
                <div class="card-header ">
                  <h5 class="card-title">Enviar Trabalho</h5>
                </div>
                <div class="card-body" id="textTrabalho">
                  <form id="InsertWork" name="InsertWork" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Tipo de Trabalho</label>
                          <select name="iIdTypeWork" id="iIdTypeWork" class="form-control"></select>
                          <div id="iIdTypeWork_validate">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Âmbito</label>
                          <select name="iIdScope" id="iIdScope" class="form-control"></select>
                          <div id="iIdScope_validate">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Titulo</label>
                          <input name="vcTitle" id="vcTitle" type="text" class="form-control" placeholder="Titulo">
                          <div id="vcTitle_validate">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Resumo</label>
                          <textarea name="vcSummary" id="vcSummary" type="text" class="form-control" placeholder="Resumo"> </textarea>
                          <div id="vcSummary_validate">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Membros do Grupo</label>
                          <span class="autocomplete-select"></span>
                          <div id="membros[]_validate">
                          </div>
                        </div>
                        <div class="d-none">
                          <select name="membros[]" id="sendMembros" multiple></select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group" id="principal">
                          <label>Nome do Autor/Orador principal</label>
                          <div id="autorP_validate">
                          </div>
                        </div>
                        <div class="d-none">
                          <select name="autorP" id="sendAutorP"></select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group" id="speakers">
                          <label>Membros que vão apresentar</label>
                          <div id="speakers[]_validate">
                          </div>
                        </div>
                        <div class="d-none">
                          <select class="visibility-visible" name="speakers[]" id="sendSpeakers" multiple></select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 mt-4">
                        <div class="image-upload-wrap h-100 ">
                          <input id="docs" class="file-upload-input" type='file' accept=".docx, .pdf" />
                          <div class="drag-text"></div>
                        </div>
                      </div>
                    </div>
                </div>
                <div id="spanContent">
                </div>
                <div class="card-footer ">
                  <hr>
                  <button type="submit" class="btn btn-warning" id="submit">
                    Enviar Trabalho
                  </button>
                </div>
                </form>

              </div>
            </div>
          </div>
        </div> <!-- Modal -->
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Participação na Conferência</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                  Você está prestes a inscrever-se na conferência como participante
                </div>
              </div>
              <div class="modal-footer">
                <div class="left-side">
                  <button type="button" class="btn btn-default btn-link" data-dismiss="modal">Sair</button>
                </div>
                <div class="divider"></div>
                <div class="right-side">
                  <button id="submit" type="button" class="btn btn-danger btn-link">Confirmar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span>
            </div>
          </div>
        </div>
    </div>
    </footer>
  </div>

  <!--   Core JS Files   -->
  <script src="../../assets/js/core/popper.min.js"></script>
  <script src="../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <!-- Chart JS -->
  <script src="../../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <script src="../../assets/js/plugins/bundle.min.js"></script>

  <script src="./script/scr.Participate.js?v=2"></script>


</body>

</html>