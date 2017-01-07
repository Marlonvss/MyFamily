<?php
//$_IDEDITAR = ($_GET['edit']);
//$Controll = new CONTROLLERusuarios();
//
//if (isset($_POST['metodo'])) {
//    $metodo = $_POST['metodo'];
//}
//
//if ($metodo == "edit") {
//
//    $_LOGIN = ($_POST['login']);
//    $_SENHA = ($_POST['senha']);
//
//    $Obj = new usuario($_IDEDITAR, $_LOGIN, $_SENHA);
//
//    $erro = $Controll->Save($Obj);
//    if ($erro->erro) {
//        echo $erro->mensagem;
//    }
//}
//
//$Obj = new usuario($_IDEDITAR);
//$erro = $Controll->RecuperaByID($Obj);
//if ($erro->erro) {
//    echo $erro->mensagem;
//}
?>

<script>
    function edit() {
        $.ajax({
            type: 'post',
            dataType: 'html',
            data: {
                'metodo': 'edit',
                'login': $('#login').val(),
                'password': $('#password').val()
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
        <h4 class="modal-title" id="editarLabel">Editar</h4>
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
                <input type="text" class="form-control" name="login" placeholder="Login" value="<?php echo $Obj->login ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Senha</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="senha" placeholder="Senha" value="<?php echo $Obj->senha ?>" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" onclick="edit()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>
</form>

