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
require_once($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/verifyLogin.php");
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
  <link rel="stylesheet" href="./css/participar.css">
</head>



<body style="background-color : #f4f3ef">
  <script>
    $(document).ready(function() {
      $("#sidebar").load("../../Common/sidebar-dashboard.html", function() {
        $("#participar").addClass("active");
      });
    })
  </script>
  <div id="sidebar"></div>

  <div class="main-panel">

    <div class="content mt-0">
      <div class="container-fluid">
        <div class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header ">
                  <h5 class="card-title">Participar</h5>

                </div>
                <div class="card-body ">
                  <p>Se deseja participar na conferência, confira no botão abaixo</p>
                </div>
                <div class="card-footer ">
                  <hr>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                    Participar
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header ">
                  <h5 class="card-title">Enviar Trabalho</h5>
                </div>
                <div class="card-body ">
                  <form id="form" method="post" action="../../assets/php/Object/getTrabalho.php" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Membros do Grupo</label>
                          <span class="autocomplete-select"></span>
                        </div>
                        <div class="d-none">
                          <select name="autores" id="phpSender" multiple>
                          </select>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                      <div class="col-md-5">
                        <div class="form-group" id="principal">
                          <label>Nome do Autor/Orador principal</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group" id="speakers">
                          <label>Membros que vão apresentar</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Resumo</label>
                          <input name="resumo" type="text" class="form-control" placeholder="Resumo">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 mt-4">
                        <div class="image-upload-wrap h-100 ">
                          <input name="file" class="file-upload-input" type='file' accept=".docx, .pdf" />
                          <div class="drag-text"></div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div id="spanContent">

                </div>
                <div class="card-footer ">
                  <hr>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                    Enviar Trabalho
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Participação na Conferência</h5>
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

  <script src="./script/participar.js?v=2"></script>


</body>

</html>