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
    Editar Perfil
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
      $("#sidebar").load("../../Common/sidebar-dashboard.html", function() {
        $("#perfil").addClass("active");
      });
    })
  </script>
  <div id="sidebar"></div>

  <div class="main-panel">
    <div class="content mt-0">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Perfil</h4>
            </div>
            <div class="card-body">
              <form name="formPerfil" method="post" action="../../assets/php/Object/updatePerfil.php">
                <div class="row">
                  <div class="col ml-2">
                    <div class="form-group">
                      <label>Nome</label>
                      <input type="text" class="form-control" placeholder="Nome" name="vcName">
                    </div>
                  </div>
                  <div class="col ml-2">
                    <div class="form-group">
                      <label>Sobrenome</label>
                      <input type="text" class="form-control" placeholder="Sobrenome" name="vcLastName">
                    </div>
                  </div>
                  <div class="col ml-2">
                    <div class="form-group">
                      <label>Telemóvel</label>
                      <input type="text" placeholder="Número de Telemóvel" class="form-control" pattern="[0-9]+$" name="vcPhoneNumber">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col ml-2">
                    <div class="form-group">
                      <label>Afiliação</label>
                      <input type="text" class="form-control" placeholder="Afiliação" name="vcAfiliation">
                    </div>
                  </div>
                  <div class="col ml-2">
                    <div class="form-group">
                      <label>Ambito</label>
                      <select name="iIdScope" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col ml-2">
                    <div class="form-group">
                      <label>Data de Nascimento</label>
                      <input type="date" placeholder="Data de Nascimento" class="form-control" name="dtBirth">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col ml-2">
                    <div class="form-group">
                      <label>Morada</label>
                      <input type="text" class="form-control" placeholder="Morada" name="vcAddress">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col ml-2">
                    <div class="form-group">
                      <label>Pais</label>
                      <input type="text" class="form-control" placeholder="País" name="vcCountry">
                    </div>
                  </div>
                  <div class="col ml-2">
                    <div class="form-group">
                      <label>Cidade</label>
                      <input type="text" class="form-control" placeholder="Cidade" name="vcCity">
                    </div>
                  </div>
                  <div class="col ml-2">
                    <div class="form-group">
                      <label>Código Postal</label>
                      <input type="text" class="form-control" placeholder="Código Postal" name="vcPostalCode">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col ml-2">
                    <div class="form-group">
                      <label>Username</label>
                      <input id="username" type="text" placeholder=" Username" class="form-control" name="vcUsername" pattern="^[A-Za-z0-9_]{1,32}$">
                    </div>
                  </div>
                  <div class="col ml-2">
                    <div class="form-group">
                      <label>E-mail</label>
                      <input type="email" placeholder="Email" class="form-control" name="vcEmail">
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-danger">Atualizar</button>
                <div class="clearfix"></div>
              </form>
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

  <script src="./script/getProfile.js?v=2"></script>
</body>

</html>