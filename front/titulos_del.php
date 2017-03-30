<script>
    function loadDelete(id) {
        $("#del_ID").val('Carregando...');
        $("#del_Descricao").val('Carregando...');
        $("#del_Vencimento").val('Carregando...');
        $("#del_Valor").val('Carregando...');
        $("#del_ValorPago").val('Carregando...');
        $("#del_Quitado").val('Carregando...');
        $("#del_Observacao").val('Carregando...');
        $("#del_ID_ClassificacaoFinanceira").val('Carregando...');
        $("#del_ID_CentroCusto").val('Carregando...');
        $("#del_ID_Familia").val('Carregando...');
        $.ajax({
            url: 'front/titulos_services.php',
            type: 'post',
            dataType: 'json',
            data: {
                'id': id,
                'metodo': 'load'
            }
        }).done(function (data) {
            $("#del_ID").val(data.ID);
            $("#del_Descricao").val(data.Descricao);
            $("#del_Vencimento").val(data.Vencimento);
            $("#del_Valor").val(data.Valor);
            $("#del_ValorPago").val(data.ValorPago);
            $("#del_Quitado").val(data.Quitado);
            $("#del_Observacao").val(data.Observacao);
            $("#del_ID_ClassificacaoFinanceira").val(data.ID_ClassificacaoFinanceira);
            $("#del_ID_CentroCusto").val(data.ID_CentroCusto);
            $("#del_ID_Familia").val(data.ID_Familia);
        });
    }

    function remove() {
        $.ajax({
            url: 'front/titulos_services.php',
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
        <h4 class="modal-title" id="editarLabel">Confirma exclusão deste titulos?</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="del_id" name="id" placeholder="ID" value="<?php echo $Obj->id ?>" readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Descrição</label>
            <div class="col-sm-10">
                <input type="text" id="del_Descricao" class="form-control" name="Descricao" placeholder="Descrição"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Vencimento</label>
            <div class="col-sm-10">
                <input type="text" id="del_Vencimento" class="form-control" name="Vencimento" placeholder="Vencimento"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Valor</label>
            <div class="col-sm-10">
                <input type="text" id="del_Valor" class="form-control" name="Valor" placeholder="Valor"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Valor pago</label>
            <div class="col-sm-10">
                <input type="text" id="del_ValorPago" class="form-control" name="ValorPago" placeholder="Valor pago"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Quitado?</label>
            <div class="col-sm-10">
                <input type="text" id="del_Quitado" class="form-control" name="Quitado" placeholder="Quitado?"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Obs</label>
            <div class="col-sm-10">
                <input type="text" id="del_Observacao" class="form-control" name="Observacao" placeholder="Obs"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Cl. Financeira</label>
            <div class="col-sm-10">
                <input type="text" id="del_ID_ClassificacaoFinanceira" class="form-control" name="ID_ClassificacaoFinanceira" placeholder="Cl. Financeira"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">C. Custo</label>
            <div class="col-sm-10">
                <input type="text" id="del_ID_CentroCusto" class="form-control" name="ID_CentroCusto" placeholder="C. Custo"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Familia</label>
            <div class="col-sm-10">
                <input type="text" id="del_ID_Familia" class="form-control" name="ID_Familia" placeholder="Familia"  readonly="readonly">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" onclick="remove()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>

</form>
