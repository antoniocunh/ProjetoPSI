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
    Detalhes da Conferência
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  
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
      $("#sidebar").load("../../Common/sidebar-dashboard.html", function(){
            $("#evento").addClass("active");
      });
    })
  </script>
    <div id="sidebar"></div>

    <div class="main-panel">
      <!-- End Navbar -->
      <div class="content mt-0">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Detalhes da conferância</h4>
                </div>
                <div class="card-body">
                  <form name="evento" method="POST" action="../assets">
                    <div class="row">
                      <div class="col mx-2 ">
                        <div class="form-group">
                          <label>Titulo</label>
                          <input type="text" class="form-control" placeholder="titulo" name="vcTitle">
                        </div>
                      </div>
                      <div class="col mx-2 ">
                        <div class="form-group">
                          <label>Local</label>
                          <input type="text" class="form-control" placeholder="Local" name="vcLocal">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mx-2 ">
                        <div class="form-group">
                          <label>Data de Inicio</label>
                          <input type="date" class="form-control" placeholder="Data de Inicio" name="dtIniEvent">
                        </div>
                      </div>
                      <div class="col mx-2 ">
                        <div class="form-group">
                          <label>Data de Encerramento</label>
                          <input type="date" class="form-control" placeholder="Data de Encerramento" name="dtEndEvent">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col mx-2 ">
                        <div class="form-group">
                          <label>Data de Inicio de Subscrição</label>
                          <input type="date" class="form-control" placeholder="Inicio de subscrição" name="dtIniSubscription">
                        </div>
                      </div>
                      <div class="col mx-2 ">
                        <div class="form-group">
                          <label>Data de Encerramento de Subscrição</label>
                          <input type="date" class="form-control" placeholder="Data de Encerramento de subscrição" name="dtEndSubscription">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col mx-2 ">
                        <div class="form-group">
                          <label>Inicio das Submissões</label>
                          <input type="date" class="form-control" placeholder="Inicio das submissões" name="dtIniSubmition">
                        </div>
                      </div>
                      <div class="col mx-2 ">
                        <div class="form-group">
                          <label>Encerramento das Submissões</label>
                          <input type="date" class="form-control" placeholder="Encerramento das submissões" name="dtEndSubmition">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col mx-2 ">
                        <div class="form-group">
                          <label>Inicio das Avaliações</label>
                          <input type="date" class="form-control" placeholder="Inicio das Avaliações"  name="dtIniEvaluation">
                        </div>
                      </div>
                      <div class="col mx-2 ">
                        <div class="form-group">
                          <label>Encerramento das Avaliações</label>
                          <input type="date" class="form-control" placeholder="Encerramento das Avaliações" name="dtEndEvaluation">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col mx-2 ">
                        <div class="form-group">
                          <label>Inicio das Submissões Finais</label>
                          <input type="date" class="form-control" placeholder="Inicio das submissões finais" name="dtIniFinalSubmission">
                        </div>
                      </div>
                      <div class="col mx-2 ">
                        <div class="form-grou                                                                                                                                                                                                                                                                                                                                                                                        p">
                          <label>Encerramento das Submissões Finais</label>
                          <input type="date" class="form-control" placeholder="Encerramento das submissões finais" name="dtEndFinalSubmission">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col mx-2 ">
                        <div class="form-group">
                          <label>Lançamento de Resultados</label>
                          <input type="date" class="form-control" placeholder="lançamento de resultados" name="dtResults">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mx-2">
                        <div class="form-group">
                          <label>Descrição</label>
                          <textarea rows="4" cols="80" class="form-control" placeholder="Descrição" name="vcDescription"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mx-2">
                        <div class="form-group">
                          <label>Sobre Nós</label>
                          <textarea rows="4" cols="80" class="form-control" placeholder="Sobre" name="vcAbout"></textarea>
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
  <script src="../../assets/js/core/jquery.min.js"></script>
  <script src="../../assets/js/core/popper.min.js"></script>
  <script src="../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
  <!-- Chart JS -->
  <script src="../../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <script src="script/evento.js?v=2.0.0"></script>
</body>

</html>