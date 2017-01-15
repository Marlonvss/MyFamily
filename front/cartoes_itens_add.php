<script>
    function add(id_Cartao) {
        $.ajax({
            url: 'front/cartoes_itens_services.php',
            type: 'post',
            dataType: 'text',
            data: {
                'datacompra': $('#add_datacompra').val(),
                'descricao': $('#add_descricao').val(),
                'valor': $('#add_valor').val(),
                'parcelas': $('#add_parcelas').val(),
                'id_cartao': id_Cartao,
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
            <label class="col-sm-2 control-label">Data da compra</label>
            <div class="col-sm-10">
                <input type="date" id="add_datacompra" class="form-control" name="datacompra" placeholder="Data da compra" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Descrição</label>
            <div class="col-sm-10">
                <input type="text" id="add_descricao" class="form-control" name="descricao" placeholder="Descrição" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Valor da parcela</label>
            <div class="col-sm-10">
                <input type="number" id="add_valor" class="form-control" name="valor" placeholder="Valor da parcela" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Parcela</label>
            <div class="col-sm-10">
                <input type="number" id="add_parcelas" class="form-control" name="parcelas" placeholder="Parcela" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" onclick="add(<?php echo $_GET['id'] ?>)" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>
</form>
