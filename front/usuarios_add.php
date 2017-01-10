<script>
    function add() {
        $.ajax({
            url: 'front/usuarios_services.php',
            type: 'post',
            dataType: 'text',
            data: {
                'metodo': 'add',
                'login': $('#add_login').val(),
                'senha': $('#add_senha').val()
            }
        }).done(function(){
            location.reload();
        });
    }
</script>


<form class="form-horizontal " autocomplete="off">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
        <h4 class="modal-title" id="novoLabel">Novo</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">Login</label>
            <div class="col-sm-10">
                <input type="text" id="add_login" class="form-control" name="login" placeholder="Login" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Senha</label>
            <div class="col-sm-10">
                <input type="senha" id="add_senha" class="form-control" name="senha" placeholder="Senha" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="add()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>
</form>
