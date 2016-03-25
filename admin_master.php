<?php
error_reporting(E_ERROR);
session_start();

if (isset($_GET['logout'])) {
    unset($_SESSION['adm']);
    echo("<meta http-equiv='refresh' content='0'>");
}

//if (isset($_SESSION['adm'])){
//    include_once './model/model_usuario.php';
//    include_once '../model/model_usuario.php';
//    $UserLogado = unserialize($_SESSION['adm']);
//    $Login = $UserLogado->login;
//}

?>
<!DOCTYPE html>
<html>

    <head>
        <title>Rafaelle e Marlon Vitor</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="./css/dashboard_css.css" type="text/css">
        <script src="./js/jquery.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

        <script>
//            // Função que limpa os parametros GET da URL..
//            $(document).ready(function () {
//                var url = location.href;
//                if (url.indexOf("?") != -1) {
//                    location.href = location.href.replace(/\?.*/gi, "");
//                }
//            });
        </script>

    </head>


    <body>
        <div class="container">
            <div class="well well-lg">
                <h2>Rafaelle e Marlon Vitor</h2>
                <ul class="nav nav-pills">
                    <li role="presentation" ><a href="?page=dashboard"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
                    <li role="presentation" ><a href="?page=convites"><span class="glyphicon glyphicon-tag"></span> Convites</a></li>
                    <li role="presentation" ><a href="?page=individuais&convite=0"><span class="glyphicon glyphicon-tags"></span> Individuais</a></li>
                    <li role="presentation" ><a href="?page=mensagens"><span class="glyphicon glyphicon-envelope"></span> Mensagens</a></li>
                    <li role="presentation" ><a href="?logout"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                </ul>
            </div>
            <div class="container-fluid" >
                <?php echo $Conteudo; ?>
            </div>
        </div>
    </body>
</html>
