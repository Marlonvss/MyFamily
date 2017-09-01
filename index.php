<?php
error_reporting(0);
session_start();

include_once './autoload.php';
include_once './../autoload.php';

include_once './back/consts/links.php';
include_once './../back/consts/links.php';
include_once './back/consts/parameters.php';
include_once './../back/consts/parameters.php';



if (!isset($_COOKIE["myfamily"])) {
    header('location:./login.php');
}
if (!isset($_SESSION['userLogged'])) {
    header('location:./login.php');
}

?>
<!DOCTYPE html>
<html>

    <head>
        <title>WebLick Sistemas - Finance</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="WebLick">
        <meta name="author" content="Marlon Vitor - WebLick">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta http-equiv="refresh" content = "3600; url='./login.php?ativ">

        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
        <link rel="stylesheet" type="text/css" href="css/awesome-bootstrap-checkbox.css">
        <link rel="stylesheet" type="text/css" href="css/select2.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/theme.css">
        <link rel="stylesheet" type="text/css" href="css/mystyle.css">


        <?php
        header('Content-Type: text/html; charset=UTF-8');

        if ($GLOBALS['IsLocal']) {
            echo '<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>';
            echo '<script type="text/javascript" src="js/bootstrap.min.js"></script>';
        } else {
            // JQuery
            echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>';

            //Bootstrap Core JavaScript
            echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
        }
        ?>

        <script type="text/javascript" src="js/Chart.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script> <!--Responsável pelo menu-->
        <script type="text/javascript" src="js/index.js"></script>

        <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.css">
        <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="js/bootstrap-datepicker.pt-BR.js"></script>
        <script>
            $(document).ready(function () {
                $('.datepicker').datepicker({
                    language: 'pt-BR',
                    format: 'dd/mm/yyyy'
                });
            });
        </script>        
    </head>

    <body class="flat-blue sidebar-collapse">
        <div class="sidebar">
            <div class="menu-control toggle-sidebar">
                <a class="navbar-brand"><i class="fa fa-cubes"></i> Finance</a>   
                <i class="fa fa-bars navicon"></i>
            </div>
            <ul class="menu">
                <li class="submenu">
                    <a href="?pag=<?php echo $pag_dashboard ?>">
                        <div>
                            <i class="menu-icon fa fa-th-large"></i>
                            <span class="menu-title">Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="submenu">
                    <a href="?pag=<?php echo $pag_dashboard_cartoes ?>">
                        <div>
                            <i class="menu-icon fa fa-credit-card fa-fw"></i>
                            <span class="menu-title">Faturas dos cartões</span>
                        </div>
                    </a>
                </li>
                <li class="submenu">
                    <a href="?pag=<?php echo $pag_lancamentos ?>">
                        <div>
                            <i class="menu-icon fa fa-calculator fa-fw"></i>
                            <span class="menu-title">Lançamentos</span>
                        </div>
                    </a>
                </li>
                <li class="submenu dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <div>
                            <i class="menu-icon fa fa-print"></i>
                            <span class="menu-title">Relatórios</span>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="?pag=<?php echo $pag_relat_demostrativo ?>">
                                <div>
                                    <i class="menu-icon fa fa-file-text-o "></i>
                                    <span class="menu-sub-title">Demonstrativos de despesas</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="?pag=<?php echo $pag_relat_fluxo ?>">
                                <div>
                                    <i class="menu-icon fa fa-file-text-o "></i>
                                    <span class="menu-sub-title">Fluxo de movimentos</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="submenu dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div>
                            <i class="menu-icon fa fa-list-ol"></i>
                            <span class="menu-title">Cadastros</span>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="?pag=<?php echo $pag_usuarios ?>">
                                <div>
                                    <i class="menu-icon fa fa-user"></i>
                                    <span class="menu-sub-title">Usuários</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="?pag=<?php echo $pag_cartoes ?>">
                                <div>
                                    <i class="menu-icon fa fa-credit-card fa-fw"></i>
                                    <span class="menu-sub-title">Cartões de crédito</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="?pag=<?php echo $pag_classificacoes ?>">
                                <div>
                                    <i class="menu-icon fa fa-list-alt"></i>
                                    <span class="menu-sub-title">Classificações Financeiras</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="?pag=<?php echo $pag_centroscustos ?>">
                                <div>
                                    <i class="menu-icon fa fa-list-alt"></i>
                                    <span class="menu-sub-title">Centro de Custo</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="content-container wrap">
            <nav class="navbar navbar-default">
                <div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="./"><i class="fa fa-cubes"></i> Finance</a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo (unserialize($_SESSION['userLogged'])->nome); ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu user-info">
                                    <li class="dropdown-title-bar">
                                        <img src="images/profile.jpg" class="profile-img">
                                    </li>
                                    <li>
                                        <div class="navbar-login">
                                            <h4 class="user-name"><?php echo (unserialize($_SESSION['userLogged'])->nome); ?></h4>
                                            <p><?php echo (unserialize($_SESSION['userLogged'])->email); ?></p>
                                            <p><button type="button" class="my_btn btn btn-link btn-md" onclick="loadEdit(' . <?php echo (unserialize($_SESSION['userLogged'])->id_familia); ?> . ')" data-toggle="modal" data-target="#familia"><?php echo (unserialize($_SESSION['userLogged'])->id_familia); ?></button></p>
                                            <div class="btn-group margin-bottom-2x" role="group">
                                                <a href="login.php"><button type="button" class="btn btn-default"><i class="fa fa-sign-out"></i> Sair</button></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
            <div class="container-fluid">
                <?php
                unset($_SESSION['pag']);
                if (isset($_GET['pag'])) {
                    $_SESSION['pag'] = $_GET['pag'];
                } else {
                    $_SESSION['pag'] = $pag_dashboard;
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
        </div>

        <footer class="footer">
            <span><i class="fa fa-copyright"></i> WebLick Sistemas, 2017</span>
        </footer>

    </body>

<div class="modal fade" data-backdrop="static" id="familia" tabindex="-1" role="dialog" aria-labelledby="editarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'familia_edit.php'; ?>
        </div>
    </div>
</div>

</html>
