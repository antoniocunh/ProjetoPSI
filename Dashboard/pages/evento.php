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



<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
  Detalhes da conferância
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
   <div class="sidebar" data-color="black" data-active-color="warning">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a  class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
        </a>
        <a  class="simple-text logo-normal">
          Conferencia
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active">
            <a href="./evento.php">
               <i class="fa fa-compass" aria-hidden="true"></i>
              <p>Evento</p>
            </a>
          </li>
            <li>
            <a href="./avaliar.php">
              <i class="fa fa-briefcase" aria-hidden="true"></i>
              <p>Avaliar</p>
            </a>
          </li>
          <li>
            <a href="./resultados.php">
              <i class="fa fa-university" aria-hidden="true"></i>
              <p>Resultados</p>
            </a>
          </li>
          <li>
            <a href="./participar.php">
              <i class="fa fa-check-square" aria-hidden="true"></i>
              <p>Participar</p>
            </a>
          </li>
            <li>
            <a href="./mandaremail.php">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <p>E-mail</p>
            </a>
          </li>
          <li>
            <a href="./gerirutilizadores.php">
              <i class="fa fa-users" aria-hidden="true"></i>
              <p>Gerir Utilizadores</p>
            </a>
          </li>
          <li>
            <a href="./criaruser.php">
              <i class="fa fa-user-plus" aria-hidden="true"></i>
              <p>Criar Utilizador</p>
            </a>
          </li>
            <li>
            <a href="./perfil.php">
              <i class="fa fa-user-o" aria-hidden="true"></i>
              <p>Perfil</p>
            </a>
          </li>
          <li>
            <a href="./dashboard.php">
              <i class="fa fa-area-chart" aria-hidden="true"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="">
              <i class="fa fa-sign-out" aria-hidden="true"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-cog" aria-hidden="true"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
              <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Detalhes da conferância</h4>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Titulo</label>
                                                    <input type="text" class="form-control" placeholder="titulo">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Local</label>
                                                    <input type="text" class="form-control" placeholder="Local">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Organizador</label>
                                                    <input type="text" class="form-control" placeholder="Organizador">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                           <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Data de Inicio</label>
                                                    <input type="date" class="form-control" placeholder="Data de Inicio">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Data de Encerramento</label>
                                                    <input type="date" class="form-control" placeholder="Data de Encerramento">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                           <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Data de Inicio de Subscrição</label>
                                                    <input type="date" class="form-control" placeholder="Inicio de subscrição">
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label>Data de Encerramento de Subscrição</label>
                                                    <input type="date" class="form-control" placeholder="Data de Encerramento de subscrição">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                           <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Inicio das Submissões</label>
                                                    <input type="date" class="form-control" placeholder="Inicio das submissões">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Encerramento das Submissões</label>
                                                    <input type="date" class="form-control" placeholder="Encerramento das submissões">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                           <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Inicio das Avaliações</label>
                                                    <input type="date" class="form-control" placeholder="Inicio das Avaliações">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Encerramento das Avaliações</label>
                                                    <input type="date" class="form-control" placeholder="Encerramento das Avaliações">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                           <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Inicio das Submissões Finais</label>
                                                    <input type="date" class="form-control" placeholder="Inicio das submissões finais">
                                                </div>
                                            </div>
                                            <div class="col-md-5 px-1">
                                                <div class="form-group">
                                                    <label>Encerramento das Submissões Finais</label>
                                                    <input type="date" class="form-control" placeholder="Encerramento das submissões finais">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                           <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Lançamento de Resultados</label>
                                                    <input type="date" class="form-control" placeholder="lançamento de resultados">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Descrição</label>
                                                    <textarea rows="4" cols="80" class="form-control" placeholder="Descrição"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-warning">Atualizar</button>
                                        <div class="clearfix"></div>
                                    </form>
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
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>
