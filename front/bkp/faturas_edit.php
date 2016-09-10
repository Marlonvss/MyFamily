<?php
$_IDEDITAR = ($_GET['edit']);
$_IDCARTAO = ($_GET['card']);

$_VENCIMENTO = ($_POST['vencimento']);

$Controll = new CONTROLLERfatura();
$Controll_titulo = new CONTROLLERtitulo();

if ($_VENCIMENTO <> "") {

    $Obj = new fatura($_IDEDITAR);
    $erro = $Controll->RecuperaByID($Obj);
    if ($erro->erro) {
        echo $erro->mensagem;
    } else {
        $Obj->vencimento = $_VENCIMENTO;
        $erro = $Controll->Save($Obj);
        if ($erro->erro) {
            echo $erro->mensagem;
        } else {
            $Obj_titulo = new titulo($Obj->id_titulo);
            $erro = $Controll_titulo->RecuperaByID($Obj_titulo);
            if ($erro->erro) {
                echo $erro->mensagem;
            } else {
                $Obj_titulo->vencimento = $_VENCIMENTO;
                $erro = $Controll_titulo->Save($Obj_titulo);
                if ($erro->erro) {
                    echo $erro->mensagem;
                } else {
                    echo '<META http-equiv="refresh" content="0;URL=?pag=' . $pag_faturas . '&card=' . $_IDCARTAO . '">';
                }
            }
        }
    }
}

$Obj = new fatura($_IDEDITAR);
$erro = $Controll->RecuperaByID($Obj);
if ($erro->erro) {
    echo $erro->mensagem;
}
?>
<script>
    function Cancelar() {
        window.location.href = location.href.replace(/\?.*/gi, "") + "?pag=<?php echo $pag_faturas ?>&card=<?php echo $_GET['card'] ?>";
    }
</script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Editar Faturas</h1>
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
                <label class="col-sm-2 control-label">Vencimento</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="vencimento" placeholder="Vencimento" value="<?php echo $Obj->vencimento ?>" required>
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