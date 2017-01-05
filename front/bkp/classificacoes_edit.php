<?php
$_IDEDITAR = ($_GET['edit']);

$_DESCRICAO = ($_POST['descricao']);

$Controll = new CONTROLLERclassificacoesfinanceiras();

if ($_DESCRICAO <> "") {

    $Obj = new classificacaofinanceira($_IDEDITAR, $_DESCRICAO);

    $erro = $Controll->Save($Obj);
    if ($erro->erro) {
        echo $erro->mensagem;
    } else {
        echo '<META http-equiv="refresh" content="0;URL=?pag=' . $pag_classificacoes . '">';
    }
}

$Obj = new classificacaofinanceira($_IDEDITAR);
$erro = $Controll->RecuperaByID($Obj);
if ($erro->erro) {
    echo $erro->mensagem;
}
?>
<script>
    function Cancelar() {
        window.location.href = location.href.replace(/\?.*/gi, "") + "?pag=<?php echo $pag_classificacoes ?>";
    }
</script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Editar Classificacação Financeira</h1>
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
                    <input type="text" class="form-control" name="descricao" placeholder="Descrição" value="<?php echo $Obj->descricao ?>" required>
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