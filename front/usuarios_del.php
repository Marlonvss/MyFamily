<script>
    function loadDelete(id) {
        $("#del_id").prop('readonly', true).val('Carregando...');
        $("#del_login").prop('readonly', true).val('Carregando...');
        $("#del_senha").prop('readonly', true).val('Carregando...');
        $.ajax({
            url: 'front/usuarios_services.php',
            type: 'post',
            dataType: 'json',
            data: {
                'metodo': 'load',
                'id': id
            }
        }).done(function (data) {
            $("#del_id").val(data.id);
            $("#del_login").val(data.login);
            $("#del_senha").val(data.senha);
        });
    }

    function remove() {
        $.ajax({
            url: 'front/usuarios_services.php',
            type: 'post',
            dataType: 'html',
            data: {
                'metodo': 'remove',
                'id': $('#del_id').val()
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
                <input type="text" class="form-control" id="del_id" name="id" placeholder="ID" value="<?php echo $Obj->id ?>" readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Login</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="del_login" name="login" placeholder="Login" value="<?php echo $Obj->login ?>" readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Senha</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="del_senha" name="senha" placeholder="Senha" value="<?php echo $Obj->senha ?>" readonly="readonly">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="remove()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>

</form>

