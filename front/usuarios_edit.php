<script>
    function loadEdit(id) {
        $("#edt_id").prop('readonly', true).val('Carregando...');
        $("#edt_email").prop('readonly', true).val('Carregando...');
        $("#edt_senha").prop('readonly', true).val('Carregando...');
        $("#edt_nome").prop('readonly', true).val('Carregando...');
        $.ajax({
            url: 'front/usuarios_services.php',
            type: 'post',
            dataType: 'json',
            data: {
                'id': id,
                'metodo': 'load'
            }
        }).done(function (data) {
            $("#edt_id").val(data.id);
            $("#edt_email").prop('readonly', false).val(data.email);
            $("#edt_senha").prop('readonly', false).val(data.senha);
            $("#edt_nome").prop('readonly', false).val(data.nome);
        });
    }
    
    function edit() {
        $.ajax({
            url: 'front/usuarios_services.php',
            type: 'post',
            dataType: 'html',
            data: {
                'id': $('#edt_id').val(),
                'email': $('#edt_email').val(),
                'senha': $('#edt_senha').val(),
                'nome': $('#edt_nome').val(),
                'metodo': 'edit'
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
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="text" id="edt_email" class="form-control" name="email" placeholder="Email"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Senha</label>
            <div class="col-sm-10">
                <input type="password" id="edt_senha" class="form-control" name="senha" placeholder="Senha"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Nome</label>
            <div class="col-sm-10">
                <input type="text" id="edt_nome" class="form-control" name="nome" placeholder="Nome"  readonly="readonly">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" onclick="edit()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>
</form>
