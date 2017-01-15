<script>
    function loadEdit(id) {
        $("#edt_id").prop('readonly', true).val('Carregando...');
        $("#edt_datacompra").prop('readonly', true).val('Carregando...');
        $("#edt_descricao").prop('readonly', true).val('Carregando...');
        $("#edt_valor").prop('readonly', true).val('Carregando...');
        $("#edt_parcelas").prop('readonly', true).val('Carregando...');
        $.ajax({
            url: 'front/cartoes_itens_services.php',
            type: 'post',
            dataType: 'json',
            data: {
                'id': id,
                'metodo': 'load'
            }
        }).done(function (data) {
            $("#edt_id").val(data.id);
            $("#edt_datacompra").prop('readonly', false).val(data.datacompra);
            $("#edt_descricao").prop('readonly', false).val(data.descricao);
            $("#edt_valor").prop('readonly', false).val(data.valor);
            $("#edt_parcelas").prop('readonly', false).val(data.parcelas);
        });
    }
    
    function edit() {
        $.ajax({
            url: 'front/cartoes_itens_services.php',
            type: 'post',
            dataType: 'html',
            data: {
                'id': $('#edt_id').val(),
                'datacompra': $('#edt_datacompra').val(),
                'descricao': $('#edt_descricao').val(),
                'valor': $('#edt_valor').val(),
                'parcelas': $('#edt_parcelas').val(),
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
            <label class="col-sm-2 control-label">Data da compra</label>
            <div class="col-sm-10">
                <input type="text" id="edt_datacompra" class="form-control" name="datacompra" placeholder="Data da compra"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Descrição</label>
            <div class="col-sm-10">
                <input type="text" id="edt_descricao" class="form-control" name="descricao" placeholder="Descrição"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Valor da parcela</label>
            <div class="col-sm-10">
                <input type="text" id="edt_valor" class="form-control" name="valor" placeholder="Valor da parcela"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Parcela</label>
            <div class="col-sm-10">
                <input type="text" id="edt_parcelas" class="form-control" name="parcelas" placeholder="Parcela"  readonly="readonly">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" onclick="edit()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>
</form>
