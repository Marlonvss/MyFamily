<?php
// Verifica se existe uma mensagem na sessão
error_reporting(E_ALL);
session_start();
if (isset($_SESSION['alert'])) {

    echo $_SESSION['alert'];
    unset($_SESSION['alert']);
}

unset($_SESSION['userLogged']);
?>  

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>MyFamily Login</title>

        <!-- Bootstrap Core CSS -->
        <link href="./front/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="./front/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="./front/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="./front/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Angular -->
        <script type="text/javascript" src="./front/js/angular.js"></script>

    </head>

    <body ng-app="myFamilly">

        <div class="container" ng-controller="myFamillyController">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Autenticação - MyFamily</h3>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="auth.php" autocomplete="off">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Digite o usuário" name="usuario" type="text" autofocus autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Digite a senha" name="senha" type="password" autocomplete="off">
                                    </div>
                                    <input type="submit" value="Entrar" id="logar" name="auth" class="btn btn-lg btn-success btn-block">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="./front/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="./front/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="./front/bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="./front/dist/js/sb-admin-2.js"></script>

    </body>

</html>