<?php
ob_start();
session_start();

include_once './model/model_individual.php';
include_once './controller/controller_individual.php';

$_IDEDITAR = ($_GET['edit']);
$_NOME = ($_POST['nome']);
$_ORIGEM = ($_POST['origem']);
$_GENERO = ($_POST['genero']);
$_CONVITE = ($_POST['convite']);

if (($_NOME <> "") && ($_ORIGEM <> "") && ($_GENERO <> "")&& ($_CONVITE <> "")) {


    $Obj = new individual($_IDEDITAR, $_CONVITE, $_NOME, $_ORIGEM, $_GENERO);
    $Resp = AlterIndividual($Obj);
    if ($Resp == '') {
        echo '<META http-equiv="refresh" content="0;URL=?page=individuais">';
    } else {
        echo $Resp;
    }
}

$Obj = GetIndividual($_IDEDITAR);
?>
<script>
    function cancelar() {
        window.location.href = location.href.replace(/\?.*/gi, "") + "?page=individuais";
    }
</script>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Edição do individual</h4>
    </div>
    <div class="panel-body">


        <form class="form-horizontal" method="post" autocomplete="off">
            <div class="form-group">
                <label class="col-sm-2 control-label">Convite</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="convite" placeholder="Convite" value="<?php echo $Obj->id_convite?>" readonly="readonly">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo $Obj->nome ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Origem</label>
                <div class="col-sm-10">
                    <select class="form-control" name="origem">
                        <?php
                        if ($Obj->origem == 'R') {
                            echo '<option value="R" selected >Noiva</option>';
                        } else {
                            echo '<option value="R">Noiva</option>';
                        }
                        if ($Obj->origem == 'M') {
                            echo '<option value="M" selected >Noivo</option>';
                        } else {
                            echo '<option value="M">Noivo</option>';
                        }
                        ?>
                    </select>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Genero</label>
                <div class="col-sm-10">
                    <select class="form-control" name="genero">
                        <?php
                        if ($Obj->genero == 'M') {
                            echo '<option value="M" selected >Masculino</option>';
                        } else {
                            echo '<option value="M">Masculino</option>';
                        }
                        if ($Obj->genero == 'F') {
                            echo '<option value="F" selected >Feminino</option>';
                        } else {
                            echo '<option value="F">Feminino</option>';
                        }
                        if ($Obj->genero == 'C') {
                            echo '<option value="C" selected >Criança</option>';
                        } else {
                            echo '<option value="C">Criança</option>';
                        }
                        ?>
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
