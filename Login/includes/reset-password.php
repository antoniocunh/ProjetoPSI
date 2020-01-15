<!--
=========================================================
 Paper Kit 2 - v2.2.0
=========================================================

 Product Page: https://www.creative-tim.com/product/paper-kit-2
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/paper-kit-2/blob/master/LICENSE.md)

 Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<?php
require_once("../../assets/php/Proprieties/ConfigDB.php");
require_once 'obj.ResetPassword.php';
?>

<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="../../assets/img//apple-icon.png">
<link rel="icon" type="image/png" href="../../assets/img//favicon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Login</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
<!-- CSS Files -->
<link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="../../assets/css/paper-kit.css?v=2.2.0" rel="stylesheet" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<body class="register-page sidebar-collapse">

  <div id="nav-placeholder"></div>
  <div class="page-header" style="background-image: url('../../assets/img/home/Home (1).jpeg');">
    <div class="filter"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 ml-auto mr-auto">
          <div class="card card-register">
            <h3 class="title mx-auto">Mudar Palavra-passe</h3>
            <form name="novaPass" class="form-login" method="post" >
            <div class='alert alert-success'>
              <?php echo $Result['vcUsername'] ?> redefina a sua palavra-passe.
              </div>
              <?php
                if(isset($msg))
                  echo $msg; 
              ?>
              <div id="div-error"></div>
              <div class="form-group">
                <label>Nova Palavra-passe</label>
                <input type="password" class="form-control" placeholder="Palavra-passe" name="pass" id="pass1" required />
                <span id="check-e"></span>
              </div>
              <div class="form-group">
                <label>Repita a Palavra-passe</label>
                <input type="password" class="form-control" placeholder="Repita Palavra-passe" name="confirm-pass" id="pass2" required />
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-default btn-block btn-round" name="btn-reset-pass">
                  &nbsp; Confirmar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="footer register-footer text-center">
      <h6>©
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim</h6>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="../../assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  
  <!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
  <script src="../../assets/js/paper-kit.js?v=2.2.0" type="text/javascript"></script>

  <!-- Our -->
  <script src="reset-password.js"></script>

  <script>
    $(function() {
      $("#nav-placeholder").load("../../Common/navbar-login.html"); //Adicionar navbar no COMMON
      $("#footer-placeholder").load("../../Common/footer-custom.html");
    });
  </script>
</body>