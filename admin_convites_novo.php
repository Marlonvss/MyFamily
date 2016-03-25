<?php

ob_start();
session_start();

include_once './model/model_convite.php';
include_once './controller/controller_convite.php';

$_FAMILIA = ($_POST['familia']);
$_NUMERO = ($_POST['numero']);

if (($_FAMILIA <> "") && ($_NUMERO <> "")) {

    $Obj = new Convite(0, $_FAMILIA, $_NUMERO);
    echo AddConvite($Obj);
    if (($Obj->id <> null) && ($Obj->id >= 0)) {
        echo '<META http-equiv="refresh" content="0;URL=?page=convites">';
    } else {
        echo '<script type="text/javascript">alert("Ocorreu um erro ao gravar o convite! Tente novamente mais tarde.");"</script>';
    }
}
?>
<script>
    function cancelar() {
        window.location.href = location.href.replace(/\?.*/gi, "") + "?page=convites";
    }
</script>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Novo convite</h4>
    </div>
    <div class="panel-body">


        <form class="form-horizontal" method="post" autocomplete="off">

            <div class="form-group">
                <label class="col-sm-2 control-label">Número</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="numero" placeholder="Número" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Família</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="familia" placeholder="Família" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn  btn-success"><span class="glyphicon glyphicon-ok"></span> Gravar</button>
                    <button type="button" onclick="cancelar()" class="btn  btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                </div>
            </div>
        </form>

    </div>
</div>

<?php

$Conteudo = ob_get_contents();

ob_end_clean();

include("admin_master.php");
