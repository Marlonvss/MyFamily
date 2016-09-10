<?php
$_IDEDITAR = ($_GET['edit']);

$_LOGIN = ($_POST['login']);
$_SENHA = ($_POST['senha']);

$Controll = new CONTROLLERusuario();

if (($_LOGIN <> "") && ($_SENHA <> "")) {

    $Obj = new usuario($_IDEDITAR, $_LOGIN, $_SENHA);

    $erro = $Controll->Save($Obj);
    if ($erro->erro) {
        echo $erro->mensagem;
    } else {
        echo '<META http-equiv="refresh" content="0;URL=?pag=' . $pag_usuarios . '">';
    }
}

$Obj = new usuario($_IDEDITAR);
$erro = $Controll->RecuperaByID($Obj);
if ($erro->erro) {
    echo $erro->mensagem;
}
?>
<script>
    function Cancelar() {
        window.location.href = location.href.replace(/\?.*/gi, "") + "?pag=<?php echo $pag_usuarios ?>";
    }
</script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Editar usuário</h1>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" method="post" autocomplete="off">
            <div class="form-group">
                <label class="col-sm-2 control-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id" placeholder="ID" value="<?php echo $Obj->id ?>" readonly="readonly">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Login</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="login" placeholder="Login" value="<?php echo $Obj->login ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Senha</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="senha" placeholder="Senha" value="<?php echo $Obj->senha ?>" required>
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
