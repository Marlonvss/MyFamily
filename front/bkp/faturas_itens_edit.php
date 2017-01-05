<?php
$_IDEDITAR = ($_GET['edit']);

$_DESCRICAO = ($_POST['descricao']);
$_VALOR = ($_POST['valor']);
$_PARCELAATUAL = ($_POST['parcelaatual']);
$_PARCELAFINAL = ($_POST['parcelafinal']);

$_IDFATURA = ($_GET['fat']);

$Controll = new CONTROLLERfaturas_itens();
$Controll_titulo = new CONTROLLERtitulos();

if (($_DESCRICAO <> "") && ($_VALOR <> "")) {

    $Obj = new fatura_item($_IDEDITAR);
    $erro = $Controll->RecuperaByID($Obj);
    if ($erro->erro) {
        echo $erro->mensagem;
    } else {
        $Obj->descricao = $_DESCRICAO;
        $Obj->valor = $_VALOR;
        $Obj->parcelaatual = $_PARCELAATUAL;
        $Obj->parcelafinal = $_PARCELAFINAL;
        $erro = $Controll->Save($Obj);
        if ($erro->erro) {
            echo $erro->mensagem;
        } else {
            $Obj_titulo = new titulo();
            $erro = $Controll_titulo->AtualizaTituloDeFatura($_IDFATURA);
            if ($erro->erro) {
                echo $erro->mensagem;
            } else {
                echo '<META http-equiv="refresh" content="0;URL=?pag=' . $pag_faturas_itens . '&fat=' . $_IDFATURA . '">';
            }
        }
    }
}

$Obj = new fatura_item($_IDEDITAR);
$erro = $Controll->RecuperaByID($Obj);
if ($erro->erro) {
    echo $erro->mensagem;
}
?>
<script>
    function Cancelar() {
        window.location.href = location.href.replace(/\?.*/gi, "") + "?pag=<?php echo $pag_faturas_itens ?>&fat=<?php echo $_GET['fat'] ?>";
    }
</script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Editar Itens de Fatura</h1>
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
                <label class="col-sm-2 control-label">Descrição</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="descricao" placeholder="Descricao" value="<?php echo $Obj->descricao ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Valor</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="valor" placeholder="Valor" value="<?php echo $Obj->valor ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Parcela atual</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="parcelaatual" placeholder="Parcela inicial" value="<?php echo $Obj->parcelaatual ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Parcela final</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="parcelafinal" placeholder="Parcela final" value="<?php echo $Obj->parcelafinal ?>">
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