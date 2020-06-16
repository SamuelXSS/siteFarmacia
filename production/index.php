<?php 
require('../scripts/restrito.php');
if($_SESSION['UsuarioNivel'] != "1"){

    header("Location: ../index.html");
    exit();
} ?>
<!DOCTYPE html>

<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="#"/>

    <title>Receita Digital | </title>
    <!-- Datatables -->

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link href="./css/alertify.min.css" rel="stylesheet">
    <style type="text/css">
      .table-responsive{
        overflow: hidden !important;
      }
      .title_count{
      	padding: 0 45px 0 20px !important;
      }
      .title_status_count{
      	padding: 0 45px 0 20px !important;
      }
    </style>



  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><img src="images/icon.png" width="32px" height="32px"> <span>Receita Digital!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bem vindo(a),</span>
                <?php echo "<h2>" . $_SESSION["farmacia"] . "</h2>"; ?>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Geral</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Dashboard</a></li>
                    </ul>
                  </li>
                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <?php echo '<img src="images/img.jpg" alt="">' . $_SESSION["farmacia"] . "</a>"; ?> 
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="./login/sair.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
            <div class="x_title">
              <h2>Receitas</h2>
              <div class="clearfix"></div>
            </div>
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-4 col-sm-5  tile_stats_count">
              <span class="count_top"><i class="fa fa-calendar-check-o"></i> Disponíveis</span>
              <div class="count green" id="disponivel"></div>
            </div>
            <div class="col-md-4 col-sm-5  tile_stats_count">
              <span class="count_top"><i class="fa fa-check"></i> Vendidas</span>
              <div class="count red" id="vendidas"></div>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-calendar-o"></i> Totais</span>
              <div style="color:darkslategray;"class="count green" id="totais"></div>
            </div>
          </div>
        </div>
          <!-- /top tiles -->
          
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div>
                  <h2>Tempo Real <small>Receitas</small></h2>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                          <div class="card-box table-responsive">
                  <p class="text-muted font-13 m-b-30">
                    Receitas cadastradas em tempo real, faça uma busca pelo <strong>nome, CPF ou remédio</strong> do cliente.
                  </p>
                  <form method="post" action="config.php">

                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                  <div class="row" style="float: right;">
                  	<div class="col-sm-12" >
	                    <label>
	                      <input type="checkbox" id="vendida" class="js-switch" value="1" /> Vendidas
	                    </label>
	                </div>
                  </div>
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Status</th>
                        <th>Data</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                  </form>
                  <div id="alert_receita"></div>
                </div>
              </div>
            </div>
          </div> 
        </div> 
      </div>
       <br />
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <p class="modal-title" id="myModalLabel">Baixa Receita</p>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                  </div>
                  <div class="modal-body">
                      <form class="needs-validation" data-toggle="validator">
                          <div class="form-row">
                              <div class="col-md-4 mb-3 md-form">
                                  <label type="form-control">Cliente</label>
                                  <input type="text" class="form-control" id="cliente">         
                              </div>
                              <div class="col-md-4 mb-3 md-form">
                                  <label type="form-control">CPF</label>
                                  <input type="text" class="form-control" id="cpf">
                              </div>
                              <div class="col-md-4 md-form">
                                  <label type="form-control">Status</label>
                                  <input type="text" class="form-control" id="status">
                              </div>
                              <div class="col-md-12 md-form">
                                  <label type="form-control">Medicamento</label>
                                  <select class="form-control" id="medicamentos" multiple>
                                  </select><br>
                              </div>
                              <div class="col-md-12 md-form">
                                  <label type="form-control">Observações</label>
                                  <select class="form-control" id="obs" multiple>
                                  </select><br>
                              </div>
                              <div class="col-md-5 md-form">
                                  <label type="form-control">Data Receita</label>
                                  <input type="text" class="form-control" id="data">
                              </div>
                              <input type="text" id="idV" style="display: none;">
                          </div>
                      </form> 
                  </div>      
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-danger" id="btnUpdate" href="#">Finalizar Venda</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <p class="modal-title" id="myModalLabel">Baixa Receita</p>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                  </div>
                  <div class="modal-body">
                      <p>Confirma a venda do remédio?</p>
                  </div>      
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-danger" id="btnVenda" href="#">Confirmar</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  </div>
              </div>
          </div>
      </div>

        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright <a href="https://colorlib.com">Cloud.io Equip</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
</div>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>

    <!-- jQuery -->

    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- DataTables -->
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script> 
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <script src="./scripts/js/index.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script src="./js/alertify.min.js"></script>

	
  </body>
</html>
