<?php
if (isset($_POST['metodo'])) {
    $metodo = $_POST['metodo'];
}

if ($metodo == "add") {
    $_LOGIN = ($_POST['login']);
    $_SENHA = ($_POST['password']);

    $Obj = new usuarios(0, $_LOGIN, $_SENHA);
    $Controll = new CONTROLLERusuarios();
    $erro = $Controll->Save($Obj);

    if ($erro->erro) {
        echo $erro->mensagem;
    }
}
?>

<script>
    function add() {
        $.ajax({
            type: 'post',
            dataType: 'html',
            data: {
                'metodo': 'add',
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
        <h4 class="modal-title" id="novoLabel">Novo</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">Login</label>
            <div class="col-sm-10">
                <input type="text" id="login" class="form-control" name="login" placeholder="Login" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Senha</label>
            <div class="col-sm-10">
                <input type="password" id="password" class="form-control" name="senha" placeholder="Senha" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" onclick="add()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>
</form>
