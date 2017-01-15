<script>
    function add() {
        $.ajax({
            url: 'front/cartoes_services.php',
            type: 'post',
            dataType: 'text',
            data: {
                'descricao': $('#add_descricao').val(),
                'numero': $('#add_numero').val(),
                'limite': $('#add_limite').val(),
                'dia_fechamento': $('#add_dia_fechamento').val(),
                'dia_vencimento': $('#add_dia_vencimento').val(),
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
            <label class="col-sm-2 control-label">Num. Cartão</label>
            <div class="col-sm-10">
                <input type="text" id="add_numero" class="form-control" name="numero" placeholder="Num. Cartão" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Limite</label>
            <div class="col-sm-10">
                <input type="text" id="add_limite" class="form-control" name="limite" placeholder="Limite" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Dia de fechamento</label>
            <div class="col-sm-10">
                <input type="text" id="add_dia_fechamento" class="form-control" name="dia_fechamento" placeholder="Dia de fechamento" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Dia de vencimento</label>
            <div class="col-sm-10">
                <input type="text" id="add_dia_vencimento" class="form-control" name="dia_vencimento" placeholder="Dia de vencimento" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" onclick="add()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>
</form>
