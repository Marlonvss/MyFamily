<?php
$_DESCRICAO = ($_POST['descricao']);
$_VALOR = ($_POST['valor']);

$_IDFATURA = ($_GET['fat']);

$Controll = new CONTROLLERfatura_item();
$Controll_titulo = new CONTROLLERtitulo();

if (($_DESCRICAO <> "") && ($_VALOR <> "")) {

    $Obj = new fatura_item(0, $_IDFATURA, $_DESCRICAO, $_VALOR);
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
?>

<script>
    function Cancelar() {
        window.location.href = location.href.replace(/\?.*/gi, "") + "?pag=<?php echo $pag_faturas_itens ?>'&fat=<?php echo $_IDFATURA ?>";
    }
</script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Novo Item da Fatura</h1>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">

        <form class="form-horizontal" method="post" autocomplete="off">

            <div class="form-group">
                <label class="col-sm-2 control-label">Descrição</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="descricao" placeholder="Descrição" required >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Valor</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="valor" placeholder="Valor" required >
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
