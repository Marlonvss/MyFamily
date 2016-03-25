<?php
ob_start();
session_start();

include_once './model/model_individual.php';
include_once './controller/controller_individual.php';

$_NOME = ($_POST['nome']);
$_ORIGEM = ($_POST['origem']);
$_GENERO = ($_POST['genero']);

if (($_NOME <> "") && ($_ORIGEM <> "") && ($_GENERO <> "")) {


    $Obj = new individual(0, $_SESSION['convite'], $_NOME, $_ORIGEM, $_GENERO);
    $Resp = AddIndividual($Obj);
    if (($Obj->id <> null) && ($Obj->id >= 0)) {
        //echo '<META http-equiv="refresh" content="0;URL=?page=individuais">';
    } else {
        echo $Resp;
    }
}
?>
<script>
    function cancelar() {
        window.location.href = location.href.replace(/\?.*/gi, "") + "?page=individuais";
    }
</script>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Novo convite</h4>
    </div>
    <div class="panel-body">


        <form class="form-horizontal" method="post" autocomplete="off">

            <div class="form-group">
                <label class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Origem</label>
                <div class="col-sm-10">
                    <select class="form-control" name="origem">
                        <option value="R">Noiva</option>
                        <option value="M">Noivo</option>
                    </select>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Genero</label>
                <div class="col-sm-10">
                    <select class="form-control" name="genero">
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                        <option value="C">Criança</option>
                    </select>
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
