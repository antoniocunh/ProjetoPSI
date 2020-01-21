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
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/ValidationDates/obj.DtEvaluation.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyAdminRole.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.OutOfPermitionRedirect.php");
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Preços</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <script src="../../assets/js/core/jquery.min.js"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
  <link rel="stylesheet" type="text/css" href="./css/tableLayout.css"/>
  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
</head>

<body style="background-color : #f4f3ef">
  <script>
       $(document).ready(function() {
      $("#sidebar").load("../../Common/sidebar-dashboard.html");
      $(document).on('DOMNodeInserted', function(e) {
        $("#prices").addClass("active");
      })
    })
  </script>

  
  <div id="sidebar"></div>

  <div class="main-panel">
    <div class="content mt-0">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header" style="background-color:#2c2c2c !important;">
                <h4 class="card-title">Preços</h4>
                <button name="adicionar" id="adicionar" class="btn btn-warning adicionar">Adicionar <i class="fa fa-plus-circle"></i></button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="tb_price" class="table table-striped table-bordered dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal Edit Price-->
      <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalLabel"><i class="fa fa-pencil" aria-hidden="true" style="margin-right:10px;"></i>Editar Preço</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="ModalEditPrice">
                <div class="form-group">
                  <label>ID</label>
                  <input type="text" class="form-control" id="iIdPrice" name="iIdPrice" disabled>
                </div>
                <div class="form-group">
                  <label>Preço</label>
                  <input type="text" class="form-control" id="dPrice" name="dPrice" pattern="[0-9]+([\.,][0-9]+)?" required />
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Descrição</label>
                  <textarea class="form-control" id="vcDescription"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button id="editPrice" form="ModalEditPrice" type="submit" class="btn btn-warning">Confirmar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal Add Price-->
      <div class="modal fade" id="ModalAddPrice" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalLabel"><i class="fa fa-plus" aria-hidden="true" style="margin-right:10px;"></i>Adicionar Preço</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="PriceModal">
                <div class="form-group">
                  <label>Preço</label>
                  <input type="text" class="form-control" id="add_dPrice" name="add_dPrice" pattern="[0-9]+([\.,][0-9]+)?" required/>
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Descrição</label>
                  <textarea class="form-control" id="add_vcDescription"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button id="insertPrice" form="PriceModal" type="submit" class="btn btn-warning">Confirmar</button>
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
      <!--   Core JS Files   -->
      <script src="../../assets/js/core/popper.min.js"></script>
      <script src="../../assets/js/core/bootstrap.min.js"></script>
      <script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>


      <!--  Notifications Plugin    -->
      <script src="../../assets/js/plugins/bootstrap-notify.js"></script>
      <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
      <script src="../../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
      
      <script src="./script/scr.Prices.js?v=2"></script>
</body>

</html>