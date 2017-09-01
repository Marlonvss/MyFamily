<?php
error_reporting(E_ALL);
session_start();

// Destroi todas as sessoes :)
session_destroy();
?>  

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>WebLick Sistemas - Login</title>
        <?php
            header('Content-Type: text/html; charset=UTF-8');
        ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <link rel="stylesheet" type="text/css" href="css/theme.css">

        <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </head>

    <body>

        <div class="container">
            <div class="login-box">
                <div class="title"><h3><i class="fa fa-cubes"></i> WebLick Sistemas</h3></div>
                <div class="progress hidden" id="login-progress">
                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        Logando...
                    </div>
                </div>
                <div class="alert alert-success hidden" id="login-message" role="alert">
                    <i class="fa fa-check-square-o"></i> Login efetuado com sucesso...
                </div>
                <div class="alert alert-danger hidden" id="login-message-fail" role="alert">
                    <i class="fa fa-warning"></i> Usuário ou senha não confere.
                </div>
                <div class="alert alert-danger <?php if (!isset($_GET["ativ"])) {
            echo 'hidden';
        }; ?>" id="login-message-ativ" role="alert">
                    <i class="fa fa-warning"></i> Usuário desconectado por falta de atividade.
                </div>
                <div class="box">
                    <form id="login-form">
                        <div class="control">
                            <div class="label">Email</div>
                            <input type="text" id="email" class="form-control" placeholder="fulano@weblick.com.br" />
                        </div>
                        <div class="control" autocomplete="off">
                            <div class="label">Senha</div>
                            <input type="password" id="senha" class="form-control" placeholder="123456" />
                        </div>
                        <div class="login-button">
                            <input type="submit" class="btn btn-orange" value="Login">
                        </div>
                    </form>
                </div>
                <div class="info-box">
                    <span class="text-left"><a href="#">Criar uma conta</a></span>
                    <span class="text-right"><a href="#">Esqueceu sua senha?</a></span>
                    <div class="clear-both"></div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $("#login-form").submit(function () {
                    $("#login-progress").removeClass("hidden");
                    $("#login-message").addClass("hidden");
                    $("#login-message-fail").addClass("hidden");
                    $("#login-message-ativ").addClass("hidden");
                    setTimeout(function () {
                        $.ajax({
                            url: 'auth.php',
                            type: 'post',
                            dataType: 'json',
                            data: {
                                'metodo': 'logar',
                                'email': $('#email').val(),
                                'senha': $('#senha').val()
                            }
                        }).done(function (data) {
                            $("#login-progress").addClass("hidden");
                            if (data == true) {
                                $("#login-message").removeClass("hidden");
                                setTimeout(function () {
                                    window.location.assign("index.php");
                                }, 1000);
                            } else {
                                $("#login-message-fail").removeClass("hidden");
                            }
                        });
                    }, 1000);
                    return false;
                });
            });
        </script>
    </body>

</html>
