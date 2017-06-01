<script>
    function loadQuitar(id) {
        $("#quitar_id").prop('readonly', true).val('Carregando...');
        $("#quitar_descricao").prop('readonly', true).val('Carregando...');
        $("#quitar_vencimento").prop('readonly', true).val('Carregando...');
        $("#quitar_valor").prop('readonly', true).val('Carregando...');
        $("#quitar_valorpago").prop('readonly', true).val('Carregando...');
        $("#quitar_quitado").prop('readonly', true).val('Carregando...');
        $("#quitar_observacao").prop('readonly', true).val('Carregando...');
        $("#quitar_id_classificacaofinanceira").prop('readonly', true).val('Carregando...');
        $("#quitar_id_centrocusto").prop('readonly', true).val('Carregando...');
        $("#quitar_id_familia").prop('readonly', true).val('Carregando...');
        $.ajax({
            url: 'front/titulos_services.php',
            type: 'post',
            dataType: 'json',
            data: {
                'id': id,
                'metodo': 'load'
            }
        }).done(function (data) {
            $("#quitar_id").val(data.id);
            $("#quitar_descricao").prop('readonly', true).val(data.descricao);
            $("#quitar_vencimento").prop('readonly', true).val(data.vencimento);
            $("#quitar_valor").prop('readonly', true).val(data.valor);
            $("#quitar_valorpago").prop('readonly', false).val(data.valorpago);
            $("#quitar_quitado").prop('readonly', true).val(data.quitado);
            $("#quitar_observacao").prop('readonly', false).val(data.observacao);
            $("#quitar_id_classificacaofinanceira").prop('readonly', false).val(data.id_classificacaofinanceira);
            $("#quitar_id_centrocusto").prop('readonly', false).val(data.id_centrocusto);
            $("#quitar_id_familia").prop('readonly', false).val(data.id_familia);
        });
    }
    
    function edit() {
        $.ajax({
            url: 'front/titulos_services.php',
            type: 'post',
            dataType: 'html',
            data: {
                'id': $('#quitar_id').val(),
                'descricao': $('#quitar_descricao').val(),
                'vencimento': $('#quitar_vencimento').val(),
                'valor': $('#quitar_valor').val(),
                'valorpago': $('#quitar_valorpago').val(),
                'quitado': $('#quitar_quitado').val(),
                'observacao': $('#quitar_observacao').val(),
                'id_classificacaofinanceira': $('#quitar_id_classificacaofinanceira').val(),
                'id_centrocusto': $('#quitar_id_centrocusto').val(),
                'metodo': 'edit'
            }
        }).done(function(e){
            location.reload();
        });
    }
</script>

<form class="form-horizontal" method="post" autocomplete="off">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
        <h4 class="modal-title" id="editarLabel">Quitar</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="quitar_id" name="id" placeholder="ID" value="Carregando..." readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Descrição</label>
            <div class="col-sm-10">
                <input type="text" id="quitar_descricao" class="form-control" name="Descricao" placeholder="Descrição"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Vencimento</label>
            <div class="col-sm-10">
                <input type="text" id="quitar_vencimento" class="form-control datepicker" name="Vencimento" placeholder="Vencimento"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Valor</label>
            <div class="col-sm-10">
                <input type="text" id="quitar_valor" class="form-control" name="Valor" placeholder="Valor"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Valor a pagar</label>
            <div class="col-sm-10">
                <input type="text" id="quitar_valorpago" class="form-control" name="ValorPago" placeholder="Valor pago"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Cl. Financeira</label>
            <div class="col-sm-10">
                <input type="text" id="quitar_id_classificacaofinanceira" class="form-control" name="ID_ClassificacaoFinanceira" placeholder="Cl. Financeira"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">C. Custo</label>
            <div class="col-sm-10">
                <input type="text" id="quitar_id_centrocusto" class="form-control" name="ID_CentroCusto" placeholder="C. Custo"  readonly="readonly">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" onclick="edit()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>
</form>
