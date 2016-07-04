<?php
error_reporting(E_ERROR);
session_start();

include './autoload.php';
include './../autoload.php';

include './back/consts/links.php';
include './../back/consts/links.php';

if (!isset($_SESSION['userLogged'])) {
    header('location:./login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>MyFamily Finance</title>

        <!-- Bootstrap Core CSS -->
        <link href="./front/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="./../front/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="./front/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
        <link href="./../front/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="./front/dist/css/timeline.css" rel="stylesheet">
        <link href="./../front/dist/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="./front/dist/css/sb-admin-2.css" rel="stylesheet">
        <link href="./../front/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="./front/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="./../front/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <!-- Botão com 3 barras do canto superior direita quando modo mobile -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./"><strong>MyFamily </strong> Finance</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo (unserialize($_SESSION['userLogged'])->login); ?> </a></li>
                            <li class="divider"></li>
                            <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="?pag=<?php echo $pag_dashboard ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-usd fa-fw"></i> Títulos<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="?pag=<?php echo $pag_titulospagar ?>"><i class="fa fa-usd fa-fw"></i> Títulos Pagar</a>
                                    </li>
                                    <li>
                                        <a href="?pag=<?php echo $pag_titulosreceber ?>"><i class="fa fa-usd fa-fw"></i> Títulos Receber</a>
                                    </li>
                                </ul>                                
                            </li>
                            <li>
                                <a href="?pag=<?php echo $pag_cartoes ?>"><i class="fa fa-credit-card fa-fw"></i> Cartões de Crédito</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-list-ol fa-fw"></i> Outros Cadastros<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="?pag=<?php echo $pag_usuarios ?>"><i class="fa fa-user fa-fw"></i> Usuários</a>
                                    </li>
                                    <li>
                                        <a href="?pag=<?php echo $pag_classificacoes ?>"><i class="fa fa-list-alt fa-fw"></i> Classificação Financeira</a>
                                    </li>
                                    <li>
                                        <a href="?pag=<?php echo $pag_centroscustos ?>"><i class="fa fa-list-alt fa-fw"></i> Centro de custo</a>
                                    </li>
                                </ul>                                
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <?php
                unset($_SESSION['pag']);
                if (isset($_GET['pag'])) {
                    $_SESSION['pag'] = $_GET['pag'];
                } else {
                    $_SESSION['pag'] = 'dashboard';
                }


                if (isset($_SESSION['pag'])) {
                    if (file_exists('./front/' . $_SESSION['pag'] . '.php')) {
                        include_once './front/' . $_SESSION['pag'] . '.php';
                    } else {
                        include_once './front/404.php';
                    }
                }
                ?>
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

    </body>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="./front/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="./../front/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./front/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./../front/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./front/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="./../front/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./front/dist/js/sb-admin-2.js"></script>
    <script src="./../front/dist/js/sb-admin-2.js"></script>

</html>
