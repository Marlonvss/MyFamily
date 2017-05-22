<script>
    function add() {
        $.ajax({
            url: 'front/centroscustos_services.php',
            type: 'post',
            dataType: 'text',
            data: {
                'descricao': $('#add_descricao').val(),
                'controladespesa': $('#add_controladespesa').val(),
                'metodo': 'add'
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
            <label class="col-sm-2 control-label">Descrição</label>
            <div class="col-sm-10">
                <input type="text" id="add_descricao" class="form-control" name="descricao" placeholder="Descrição" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Controla despesa?</label>
            <div class="col-sm-10">
                <select name="controladespesa" class="fonte-fa form-control" id="add_controladespesa">
                    <option value="0">Não</option>;
                    <option value="1">Sim</option>;
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" onclick="add()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>
</form>
