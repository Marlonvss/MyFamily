<?php
$_VENCIMENTO = ($_POST['vencimento']);
$_IDCARTAO = ($_GET['card']);

$Controll = new CONTROLLERfatura();
$Controll_titulo = new CONTROLLERtitulo();

if ($_VENCIMENTO <> "") {

    $Obj_titulo = new titulo(0, 0, 0.00, $_VENCIMENTO, 1, 1, 0, 'Título de fatura', 0);
    $erro = $Controll_titulo->Save($Obj_titulo);
    if ($erro->erro) {
        echo $erro->mensagem;
    } else {
        $Obj = new fatura(0, $_IDCARTAO, $_VENCIMENTO, $Obj_titulo->id);
               
        $erro = $Controll->Save($Obj);

        if ($erro->erro) {
            echo $erro->mensagem;
        } else {
            echo '<META http-equiv="refresh" content="0;URL=?pag=' . $pag_faturas . '&card='. $_IDCARTAO .'">';
        }
    }
}
?>

<script>
    function Cancelar() {
        window.location.href = location.href.replace(/\?.*/gi, "") + "?pag=<?php echo $pag_faturas ?> '&card=<?php echo $ID_CARTAO ?>";
    }
</script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Nova Fatura</h1>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">

        <form class="form-horizontal" method="post" autocomplete="off">

            <div class="form-group">
                <label class="col-sm-2 control-label">Vencimento</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="vencimento" placeholder="Vencimento" required >
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
