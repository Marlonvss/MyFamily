<script>
    function loadDelete(id) {
        $("#del_id").val('Carregando...');
        $("#del_descricao").val('Carregando...');
        $("#del_data").val('Carregando...');
        $("#del_valor").val('Carregando...');
        $("#del_sinal").val('Carregando...');
        $("#del_observacao").val('Carregando...');
        $("#del_id_classificacaofinanceira").val('Carregando...');
        $("#del_id_centrocusto").val('Carregando...');
        $("#del_id_familia").val('Carregando...');
        $("#del_id_titulo").val('Carregando...');
        $.ajax({
            url: 'front/lancamentos_services.php',
            type: 'post',
            dataType: 'json',
            data: {
                'id': id,
                'metodo': 'load'
            }
        }).done(function (data) {
            $("#del_id").val(data.id);
            $("#del_descricao").val(data.descricao);
            $("#del_data").val(data.data);
            $("#del_valor").val(data.valor);
            $("#del_sinal").val(data.sinal);
            $("#del_observacao").val(data.observacao);
            $("#del_id_classificacaofinanceira").val(data.id_classificacaofinanceira);
            $("#del_id_centrocusto").val(data.id_centrocusto);
            $("#del_id_familia").val(data.id_familia);
            $("#del_id_titulo").val(data.id_titulo);
        });
    }

    function remove() {
        $.ajax({
            url: 'front/lancamentos_services.php',
            type: 'post',
            dataType: 'html',
            data: {
                'metodo': 'remove',
                'id': $('#del_id').val()
            }
        }).done(function (e) {
            location.reload();
        });
    }
</script>

<form class="form-horizontal" method="post" autocomplete="off">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
        <h4 class="modal-title" id="editarLabel">Confirma exclusão deste lancamentos?</h4>
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
                <input type="text" id="del_descricao" class="form-control" name="Descricao" placeholder="Descrição"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Vencimento</label>
            <div class="col-sm-10">
                <input type="text" id="del_data" class="form-control" name="Vencimento" placeholder="Vencimento"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Valor</label>
            <div class="col-sm-10">
                <input type="text" id="del_valor" class="form-control" name="Valor" placeholder="Valor"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Valor pago</label>
            <div class="col-sm-10">
                <input type="text" id="del_id_titulo" class="form-control" name="id_titulo" placeholder="Valor pago"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">sinal?</label>
            <div class="col-sm-10">
                <input type="text" id="del_sinal" class="form-control" name="sinal" placeholder="sinal?"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Cl. Financeira</label>
            <div class="col-sm-10">
                <input type="text" id="del_id_classificacaofinanceira" class="form-control" name="ID_ClassificacaoFinanceira" placeholder="Cl. Financeira"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">C. Custo</label>
            <div class="col-sm-10">
                <input type="text" id="del_id_centrocusto" class="form-control" name="ID_CentroCusto" placeholder="C. Custo"  readonly="readonly">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" onclick="remove()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>

</form>
