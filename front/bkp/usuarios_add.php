<?php
$_LOGIN = ($_POST['login']);
$_SENHA = ($_POST['senha']);

if (($_LOGIN <> "") && ($_SENHA <> "")) {

    $Obj = new usuario(0, $_LOGIN, $_SENHA);

    $Controll = new CONTROLLERusuario();
    $erro = $Controll->Save($Obj);

    if ($erro->erro) {
        echo $erro->mensagem;
    } else {
        echo '<META http-equiv="refresh" content="0;URL=?pag=' . $pag_usuarios . '">';
    }
}
?>

<script>
    function Cancelar() {
        window.location.href = location.href.replace(/\?.*/gi, "") + "?pag=<?php echo $pag_usuarios ?>";
    }
</script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Novo usuário</h1>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">

        <form class="form-horizontal" method="post" autocomplete="off">

            <div class="form-group">
                <label class="col-sm-2 control-label">Login</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="login" placeholder="Login" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Senha</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn  btn-success"><span class="glyphicon glyphicon-ok"></span> Gravar</button>
                    <button type="button" onclick="Cancelar()" class="btn  btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                </div>
            </div>
        </form>

    </div>
</div>
