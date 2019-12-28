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
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
  Gerir Utilizador
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <script src="../assets/js/core/jquery.min.js"></script>

</head>

<body style="background-color : #f4f3ef">
<script>
    $(document).ready(function() {
      $("#sidebar").load("../../Common/sidebar-dashboard.html", function(){
            $("#gerirUtilizadores").addClass("active");
      });
    })
  </script>
    <div id="sidebar"></div>

    <div class="main-panel">
       <div class="content mt-0">
        <div class="row">
          <div class="col-md-12">
          
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Utilizadores</h4>
                <button type="button" class="btn btn-default fa fa-user-plus" style="padding:10px;"> Novo utilizador</button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="tb_Users">
                    <thead class=" text-primary">
                      <th>
                        Nome de Utilizador
                      </th>
                      <th>
                       Nome
                      </th>
                      <th>
                        Apelido
                      </th>
                      <th>
                        Morada
                      </th>
                        <th>
                        Pais
                      </th>
                        <th>
                        Cidade
                      </th>
                        <th>
                        Código Postal
                      </th>
                        <th>
                        E-mail
                      </th>
                        <th>
                        Telemovel
                      </th>
                      <th>
                        Organização
                      </th>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- Modal -->
<div class="modal fade bd-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gestão de Utilizadores</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" id="vcName" placeholder="Nome">
          </div>
            <div class="form-group">
            <label>Apelido</label>
            <input type="text" class="form-control" id="vcLastName" placeholder="Apelido">
          </div>
            <div class="form-group">
            <label>Morada</label>
            <input type="text" class="form-control" id="vcAddress" placeholder="Morada">
          </div>
            <div class="form-group">
            <label>Pais</label>
            <input type="text" class="form-control" id="vcCountry" placeholder="Pais">
          </div>
            <div class="form-group">
            <label>Cidade</label>
            <input type="text" class="form-control" id="vcCity" placeholder="Cidade">
          </div>
            <div class="form-group">
            <label>Código-Postal</label>
            <input type="text" class="form-control" id="vcPostalCode" placeholder="Código-Postal">
          </div>
            <div class="form-group">
            <label>E-mail</label>
            <input type="text" class="form-control" id="vcEmail" placeholder="E-mail">
          </div>
            <div class="form-group">
            <label>Telemovel</label>
            <input type="text" class="form-control" id="vcPhoneNumber" placeholder="Telemovel">
          </div>
            <div class="form-group">
            <label>Organização</label>
            <input type="text" class="form-control" id="vcAfiliation" placeholder="Organização">
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>-->
        <button type="button" class="btn btn-danger">Apagar</button>
        <button type="button" class="btn btn-warning">Update</button>
      </div>
    </div>
  </div>
</div>
        <!-- fim Modal -->
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li>
                  <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>
                </li>
                <li>
                  <a href="http://blog.creative-tim.com/" target="_blank">Blog</a>
                </li>
                <li>
                  <a href="https://www.creative-tim.com/license" target="_blank">Licenses</a>
                </li>
              </ul>
            </nav>
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

  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->

  <script src="./script/getUsers.js"></script>
</body>

</html>
