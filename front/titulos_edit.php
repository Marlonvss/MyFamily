<script>
    function loadEdit(id) {
        $("#edt_ID").prop('readonly', true).val('Carregando...');
        $("#edt_Descricao").prop('readonly', true).val('Carregando...');
        $("#edt_Vencimento").prop('readonly', true).val('Carregando...');
        $("#edt_Valor").prop('readonly', true).val('Carregando...');
        $("#edt_ValorPago").prop('readonly', true).val('Carregando...');
        $("#edt_Quitado").prop('readonly', true).val('Carregando...');
        $("#edt_Observacao").prop('readonly', true).val('Carregando...');
        $("#edt_ID_ClassificacaoFinanceira").prop('readonly', true).val('Carregando...');
        $("#edt_ID_CentroCusto").prop('readonly', true).val('Carregando...');
        $("#edt_ID_Familia").prop('readonly', true).val('Carregando...');
        $.ajax({
            url: 'front/titulos_services.php',
            type: 'post',
            dataType: 'json',
            data: {
                'id': id,
                'metodo': 'load'
            }
        }).done(function (data) {
            $("#edt_id").val(data.id);
            $("#edt_Descricao").prop('readonly', false).val(data.Descricao);
            $("#edt_Vencimento").prop('readonly', false).val(data.Vencimento);
            $("#edt_Valor").prop('readonly', false).val(data.Valor);
            $("#edt_ValorPago").prop('readonly', false).val(data.ValorPago);
            $("#edt_Quitado").prop('readonly', false).val(data.Quitado);
            $("#edt_Observacao").prop('readonly', false).val(data.Observacao);
            $("#edt_ID_ClassificacaoFinanceira").prop('readonly', false).val(data.ID_ClassificacaoFinanceira);
            $("#edt_ID_CentroCusto").prop('readonly', false).val(data.ID_CentroCusto);
            $("#edt_ID_Familia").prop('readonly', false).val(data.ID_Familia);
        });
    }
    
    function edit() {
        $.ajax({
            url: 'front/titulos_services.php',
            type: 'post',
            dataType: 'html',
            data: {
                'id': $('#edt_id').val(),
                'Descricao': $('#edt_Descricao').val(),
                'Vencimento': $('#edt_Vencimento').val(),
                'Valor': $('#edt_Valor').val(),
                'ValorPago': $('#edt_ValorPago').val(),
                'Quitado': $('#edt_Quitado').val(),
                'Observacao': $('#edt_Observacao').val(),
                'ID_ClassificacaoFinanceira': $('#edt_ID_ClassificacaoFinanceira').val(),
                'ID_CentroCusto': $('#edt_ID_CentroCusto').val(),
                'ID_Familia': $('#edt_ID_Familia').val(),
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
            <label class="col-sm-2 control-label">Descrição</label>
            <div class="col-sm-10">
                <input type="text" id="edt_Descricao" class="form-control" name="Descricao" placeholder="Descrição"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Vencimento</label>
            <div class="col-sm-10">
                <input type="text" id="edt_Vencimento" class="form-control" name="Vencimento" placeholder="Vencimento"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Valor</label>
            <div class="col-sm-10">
                <input type="text" id="edt_Valor" class="form-control" name="Valor" placeholder="Valor"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Valor pago</label>
            <div class="col-sm-10">
                <input type="text" id="edt_ValorPago" class="form-control" name="ValorPago" placeholder="Valor pago"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Quitado?</label>
            <div class="col-sm-10">
                <input type="text" id="edt_Quitado" class="form-control" name="Quitado" placeholder="Quitado?"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Obs</label>
            <div class="col-sm-10">
                <input type="text" id="edt_Observacao" class="form-control" name="Observacao" placeholder="Obs"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Cl. Financeira</label>
            <div class="col-sm-10">
                <input type="text" id="edt_ID_ClassificacaoFinanceira" class="form-control" name="ID_ClassificacaoFinanceira" placeholder="Cl. Financeira"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">C. Custo</label>
            <div class="col-sm-10">
                <input type="text" id="edt_ID_CentroCusto" class="form-control" name="ID_CentroCusto" placeholder="C. Custo"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Familia</label>
            <div class="col-sm-10">
                <input type="text" id="edt_ID_Familia" class="form-control" name="ID_Familia" placeholder="Familia"  readonly="readonly">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" onclick="edit()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>
</form>
