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
  <title>Certificados</title></title>
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
  
  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
</head>

<body style="background-color : #f4f3ef">

  <script>
    $(document).ready(function() 
    {
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
              <div class="card">
                <div class="card-header ">
                  <h5 class="card-title">Certificados</h5>
                </div>
                <div class="card-body">
                  <form name="InsertWork" method="post" action="../../assets/php/Object/obj.Certificates.php" enctype="multipart/form-data">

                 
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Titulo</label>
                          <input name="vcTitle" id="vcTitle" type="text" class="form-control" placeholder="Titulo">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                        <label>X (Size in mm)</label>
                          <input name="vcTitle" id="vcTitle" type="text" class="form-control" placeholder="X-Position">
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                        <label>Y (Size in mm)</label>
                          <input name="vcTitle" id="vcTitle" type="text" class="form-control" placeholder="Y-Position">
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
                </div>
                <div id="spanContent">
                </div>
                <div class="card-footer ">
                  <hr>
                  <button type="submit" class="btn btn-danger" id="submit">Enviar novo certificado</button>
                </div>
                </form>

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
  


</body>

</html>