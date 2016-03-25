<?php

error_reporting(E_ERROR);

session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Rafaelle e Marlon Vitor</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

        <!-- Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

        <!-- Plugin CSS -->
        <link rel="stylesheet" href="css/animate.min.css" type="text/css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/creative.css" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body id="header">

        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#header">Início</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li> <a class="page-scroll" href="#convidados">Confirmação de Presença</a> </li>
                        <!--<li> <a class="page-scroll" href="#padrinhos">Padrinhos</a> </li>-->
                        <li> <a class="page-scroll" href="#listadepresente">Lista de Presentes</a> </li>
                        <li> <a class="page-scroll" href="#mapa">Mapa</a> </li>
                        <li> <a class="page-scroll" href="#fotos">Fotos</a> </li>
                        <li> <a class="page-scroll" href="#mensagem">Mensagem</a> </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <header> <?php include_once 'header.php'; ?> </header>

        <section class="bg-primary" id="convidados"> <?php include_once 'convidados.php'; ?> </section>
<!--        <section id="padrinhos"> <?php include_once 'padrinhos.php'; ?> </section>-->
        <section id="listadepresente"> <?php include_once 'listadepresente.php'; ?> </section>
        <section class="no-padding" id="mapa"> <?php include_once 'mapa.php'; ?> </section>
        <section class="no-padding" id="fotos"> <?php include_once 'fotos.php'; ?> </section>
        <section id="mensagem"> <?php include_once 'mensagem.php'; ?> </section>

        <!--        <aside class="bg-dark"> 
                    <div class="container text-center"> 
                        <div class="call-to-action"> 
                            <h2>Free Download at Start Bootstrap!</h2>
                            <a href="#" class="btn btn-default btn-xl wow tada">Download Now!</a>
                        </div>
                    </div>
                </aside>-->


        <div id="msg" class="col-lg-8 col-lg-offset-2 text-center"></div>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Moment JavaScript -->
        <script src="js/moment.js"></script>

        <!-- Plugin JavaScript -->
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/jquery.fittext.js"></script>
        <script src="js/wow.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/creative.js"></script>

    </body>

</html>