<?php
error_reporting(0);
session_start();


if (isset($_SESSION['msg'])) {
    $Mensagem = $_SESSION['msg'];
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title> Login </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <!-- CSS -->
        <!--<link href="./css/login_admin.css" rel="stylesheet" type="text/css"/>-->
        <script src="./js/bootstrap.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">        
    </head>


    <body>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 text-center">       
                <div>
                    <form method="POST" action="auth.php">

                        <div class="form-group">
                            <span>Login</span>
                            <input type="text" name="login" id="login" class="form-control" required />
                        </div>           

                        <div class="form-group">
                            <span>Senha</span>
                            <input type="password" name="senha" id="senha" class="form-control" required><br>
                        </div>           
                        <div class="form-group">
                            <input type="submit" value="Logar" id="logar" name="auth" class="btn btn-primary btn-group-justified">
                        </div>           
                    </form> 
                </div>
                <div class="alert"><?php echo $Mensagem ?></div>
            </div>
        </div>
    </body>
</html>