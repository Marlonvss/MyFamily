<script>
    function loadEdit(id) {
        $.ajax({
            url: 'front/usuarios_services.php',
            type: 'post',
            dataType: 'json',
            data: {
                'metodo': 'load',
                'id': id
            }
        }).done(function (data) {
            $("#edt_id").val(data.id);
            $("#edt_login").prop('readonly', false).val(data.login);
            $("#edt_senha").prop('readonly', false).val(data.senha);
        });
    }
    
    function edit() {
        $.ajax({
            url: 'front/usuarios_services.php',
            type: 'post',
            dataType: 'html',
            data: {
                'metodo': 'edit',
                'id': $('#edt_id').val(),
                'login': $('#edt_login').val(),
                'senha': $('#edt_senha').val()
            }
        }).done(function(){
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
                <input type="text" class="form-control" id="edt_id" name="id" placeholder="ID" value="Carregando..." readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Login</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="edt_login" name="login" placeholder="Login" value="Carregando..." required readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Senha</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="edt_senha" name="senha" placeholder="Senha" value="Carregando..." required readonly="readonly">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="edit()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>
</form>

