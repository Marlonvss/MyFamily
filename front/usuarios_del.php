<?php
if (isset($_POST['metodo'])) {
    $metodo = $_POST['metodo'];
}

if ($metodo == "remove") {
    $_ID = ($_POST['id']);

    $Controll = new CONTROLLERusuarios();
    $erro = $Controll->Remove($_ID);

    if ($erro->erro) {
        echo $erro->mensagem;
    }
}
?>

<script>
    function remove() {
        $.ajax({
            type: 'post',
            dataType: 'html',
            data: {
                'metodo': 'remove',
                'id': $('#id').val()
            }
        }).done(function () {
            location.reload();
        });
    }
</script>

<form class="form-horizontal" method="post" autocomplete="off">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
        <h4 class="modal-title" id="editarLabel">Confirma exclusão deste usuário?</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="id" placeholder="ID" value="<?php echo $Obj->id ?>" readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Login</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="login" placeholder="Login" value="<?php echo $Obj->login ?>" readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Senha</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="senha" placeholder="Senha" value="<?php echo $Obj->senha ?>" readonly="readonly">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="remove()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>

</form>

