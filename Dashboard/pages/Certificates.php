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
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyAdminRole.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyCO.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.OutOfPermitionRedirect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Certificados
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  
  <script src="../../assets/js/core/jquery.min.js"></script>
  
</head>

<body style="background-color : #f4f3ef">
  <script>
    $(document).ready(function() {
      $("#sidebar").load("../../Common/sidebar-dashboard.html");
      $(document).on('DOMNodeInserted', function(e) {
        $("#sendCertificates").addClass("active");
      })
    })
  </script>
  <div id="sidebar"></div>

  <div class="main-panel">
    <div class="content mt-0">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Certificados</h4>
              </div>
              <div class="card-body">
                <form method="POST" id="certificados" name="certificados">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label>Titulo</label>
                        <input id="subject" type="text" placeholder="Titulo" class="form-control" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label>Selecionar grupo</label>
                        <select id="role" name="role" class="form-control"></select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <label>Mensagem</label>
                        <textarea id="message" rows="4" cols="80" class="form-control" placeholder="Descrição" required></textarea>
                      </div>
                    </div>
                  </div>
                  <button id="enviar" type="button" class="btn btn-danger">Enviar<i class="fa fa-send" style="margin-left:5px;"></i></button>
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Enviar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="alert alert-warning" role="alert">
                  Tem a certeza que quer enviar os certificados para esta role?
                </div>
              </div>
              
              <div class="modal-footer">
                <div class="divider"></div>
                <div class="right-side">
                  <button id="submit" type="submit" class="btn btn-danger">Confirmar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- Modal -->
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
    </footer>
  </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../../assets/js/core/jquery.min.js"></script>
  <script src="../../assets/js/core/popper.min.js"></script>
  <script src="../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chart JS -->
  <script src="../../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <script src="./script/scr.GetRoles.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
  <script src="./script/scr.SendCertificate.js"></script>
</body>

</html>