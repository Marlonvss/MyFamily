<?php

$_PESSOA = ($_POST['pessoa']);
$_VALOR = ($_POST['valor']);
$_VENCIMENTO = ($_POST['vencimento']);
$_PARCELAATUAL = ($_POST['parcelaatual']);
$_PARCELAFINAL = ($_POST['parcelafinal']);
$_OBS = ($_POST['obs']);

if (($_VALOR <> "") && ($_VENCIMENTO <> "") && ($_PARCELAATUAL <> "") && ($_PARCELAFINAL <> "")) {

    $Obj = new titulo(0, $_PESSOA, $_VALOR, $_VENCIMENTO, $_PARCELAATUAL, $_PARCELAFINAL, 1, $_OBS, 0);

    $Controll = new CONTROLLERtitulo();
    $erro = $Controll->Save($Obj);
    if ($erro->erro) {
        echo $erro->mensagem;
    } else {
        echo '<META http-equiv="refresh" content="0;URL=?pag=' . $pag_titulosreceber . '">';
    }
}
?>

<script>
    function Cancelar() {
        window.location.href = location.href.replace(/\?.*/gi, "") + "?pag=<?php echo $pag_titulosreceber ?>";
    }
</script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Novo Títulos a Pagar</h1>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" method="post" autocomplete="off">
            <div class="form-group">
                <label class="col-sm-2 control-label">Pessoa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="pessoa" placeholder="Beneficiário">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Valor</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="valor" placeholder="Valor" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Vencimento</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="vencimento" placeholder="Vencimento" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Parcela Atual</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="parcelaatual" placeholder="Parcela Atual" required value="1">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Parcela Final</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="parcelafinal" placeholder="Parcela Final" required value="1">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Observação</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="obs" placeholder="Observação">
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
