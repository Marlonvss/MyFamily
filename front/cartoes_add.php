<?php
$_DESCRICAO = ($_POST['descricao']);
$_SENHA = ($_POST['senha']);

$Controll = new CONTROLLERcartao();

if ($_DESCRICAO <> "") {

    $Obj = new cartao(0, $_DESCRICAO);

    $erro = $Controll->Save($Obj);

    if ($erro->erro) {
        echo $erro->mensagem;
    } else {
        echo '<META http-equiv="refresh" content="0;URL=?pag=' . $pag_cartoes . '">';
    }
}
?>

<script>
    function Cancelar() {
        window.location.href = location.href.replace(/\?.*/gi, "") + "?pag=<?php echo $pag_cartoes ?>";
    }
</script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Novo Cartão</h1>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">

        <form class="form-horizontal" method="post" autocomplete="off">

            <div class="form-group">
                <label class="col-sm-2 control-label">Descrição</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="descricao" placeholder="Descrição" required>
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
