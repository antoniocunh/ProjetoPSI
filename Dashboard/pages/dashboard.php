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
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Dashboard
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
        $("#dashboard").addClass("active");
      })
    })
  </script>
  <div id="sidebar"></div>

  <div class="main-panel">
    <div class="content mt-0">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-body ">
              <div class="row">
                <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-globe text-warning"></i>
                  </div>
                </div>
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <p class="card-category">Capacity</p>
                    <p class="card-title">150GB
                      <p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                <i class="fa fa-refresh"></i> Update Now
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-body ">
              <div class="row">
                <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-money-coins text-success"></i>
                  </div>
                </div>
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <p class="card-category">Revenue</p>
                    <p class="card-title">$ 1,345
                      <p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                <i class="fa fa-calendar-o"></i> Last day
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-body ">
              <div class="row">
                <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-vector text-danger"></i>
                  </div>
                </div>
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <p class="card-category">Errors</p>
                    <p class="card-title">23
                      <p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                <i class="fa fa-clock-o"></i> In the last hour
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-body ">
              <div class="row">
                <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                  </div>
                </div>
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <p class="card-category">Followers</p>
                    <p class="card-title">+45K
                      <p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                <i class="fa fa-refresh"></i> Update now
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card ">
            <div class="card-header ">
              <h5 class="card-title">Users Behavior</h5>
              <p class="card-category">24 Hours performance</p>
            </div>
            <div class="card-body ">
              <canvas id=chartHours width="400" height="100"></canvas>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                <i class="fa fa-history"></i> Updated 3 minutes ago
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card ">
            <div class="card-header ">
              <h5 class="card-title">Email Statistics</h5>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-body ">
              <canvas id="chartEmail"></canvas>
            </div>
            <div class="card-footer ">
              <div class="legend">
                <i class="fa fa-circle text-primary"></i> Opened
                <i class="fa fa-circle text-warning"></i> Read
                <i class="fa fa-circle text-danger"></i> Deleted
                <i class="fa fa-circle text-gray"></i> Unopened
              </div>
              <hr>
              <div class="stats">
                <i class="fa fa-calendar"></i> Number of emails sent
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card card-chart">
            <div class="card-header">
              <h5 class="card-title">NASDAQ: AAPL</h5>
              <p class="card-category">Line Chart with Points</p>
            </div>
            <div class="card-body">
              <canvas id="speedChart" width="400" height="100"></canvas>
            </div>
            <div class="card-footer">
              <div class="chart-legend">
                <i class="fa fa-circle text-info"></i> Tesla Model S
                <i class="fa fa-circle text-warning"></i> BMW 5 Series
              </div>
              <hr />
              <div class="card-stats">
                <i class="fa fa-check"></i> Data information certified
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
  <!-- Chart JS -->
  <script src="../../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
</body>

</html>