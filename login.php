<?php
// Verifica se existe uma mensagem na sessão
error_reporting(E_ALL);
session_start();

unset($_SESSION['userLogged']);
?>  

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>WebLick Sistemas - Login</title>
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
                <div class="title"><h3><i class="fa fa-cubes"></i>  WebLick Sistemas</h3></div>
                <div class="progress hidden" id="login-progress">
                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        Logando...
                    </div>
                </div>
                <div class="alert alert-success hidden" id="login-message" role="alert">
                    <i class="fa fa-check"></i> Login efetuado com sucesso!
                </div>
                <div class="alert alert-danger hidden" id="login-message-fail" role="alert">
                    <i class="fa fa-close"></i> Usuário ou senha não confere!
                </div>
                <div class="box">
                    <form id="login-form" autocomplete="off">
                        <div class="control">
                            <div class="label">Email</div>
                            <input type="text" id="login" class="form-control" placeholder="admin@gmail.com" />
                        </div>
                        <div class="control">
                            <div class="label">Senha</div>
                            <input type="password" id="password" class="form-control" placeholder="123456" />
                        </div>
                        <div class="login-button">
                            <input type="submit" class="btn btn-orange" value="Login">
                        </div>
                    </form>
                </div>
                <div class="info-box">
                    <span class="text-left"><a href="register.html">Criar uma conta</a></span>
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
                    setTimeout(function () {
                        $.ajax({
                            url: 'auth.php',
                            type: 'post',
                            dataType: 'json',
                            data: {
                                'metodo': 'login',
                                'login': $('#login').val(),
                                'senha': $('#password').val()
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
