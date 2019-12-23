<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img//apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img//favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Conferência UA
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-kit.css?v=2.2.0" rel="stylesheet"/>

</head>

<body>

<?php require("../Login/login2.php");?>

  <div id="nav-placeholder"></div>

  <div class="page-header" data-parallax="true" style="background-image: url('../assets/img/Sample-Image (0).jpg');">
    <div class="filter"></div>
    <div class="container">
      <div class="motto text-center">
        <h1>Bem Vindo Zé Manel</h1>
        <h3>The Biggest International IT Professional Conference</h3>
        <h5>19 - 21 February, 2018. New York, USA</h5>
        <br />
        <button onclick="location.href='../Participar_Evento/index.html';" type="button" class="btn btn-outline-neutral btn-round">Participar</button>
        <button onclick="location.href='../Participar_Evento/formAutor.html';" type="button" class="btn btn-outline-neutral btn-round">Submeter Trabalho</button>
      </div>
    </div>
  </div>
  <div id="footer-placeholder"></div>
  <!---------------------------------------------------------------------------------------------------------------->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="../assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
  <!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-kit.js?v=2.2.0" type="text/javascript"></script>
  <!-- Scrool Animation -->
  <script src="../assets/js/plugins/scrool-animation.js"></script>

    <script> 
            $(function(){
            $("#nav-placeholder").load("../Common/navbar-user.html"); 
            $("#footer-placeholder").load("../Common/footer-custom.html"); 
          });
    </script>
  <!---------------------------------------------------------------------------------------------------------------->
 </script>
</body>
</html>