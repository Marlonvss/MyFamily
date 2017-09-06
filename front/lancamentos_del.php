<script>
    function loadDelete(id) {
        $("#del_lancamento_id").val('Carregando...');
        $("#del_lancamento_descricao").val('Carregando...');
        $("#del_lancamento_data").val('Carregando...');
        $("#del_lancamento_valor").val('Carregando...');
        $("#del_lancamento_sinal").val('Carregando...');
        $("#del_lancamento_id_classificacaofinanceira").val('Carregando...');
        $("#del_lancamento_id_centrocusto").val('Carregando...');
        $("#del_lancamento_id_familia").val('Carregando...');
        $("#del_lancamento_id_titulo").val('Carregando...');
        $.ajax({
            url: 'front/lancamentos_services.php',
            type: 'post',
            dataType: 'json',
            data: {
                'id': id,
                'metodo': 'load'
            }
        }).done(function (data) {
            $("#del_lancamento_id").val(data.id);
            $("#del_lancamento_descricao").val(data.descricao);
            $("#del_lancamento_data").val(data.data);
            $("#del_lancamento_valor").val(data.valor);
            $("#del_lancamento_sinal").val(data.sinal);
            $("#del_lancamento_id_classificacaofinanceira").val(data.id_classificacaofinanceira);
            $("#del_lancamento_id_centrocusto").val(data.id_centrocusto);
            $("#del_lancamento_id_familia").val(data.id_familia);
            $("#del_lancamento_id_titulo").val(data.id_titulo);
        });
    }

    function remove() {
        $.ajax({
            url: 'front/lancamentos_services.php',
            type: 'post',
            dataType: 'html',
            data: {
                'metodo': 'remove',
                'id': $('#del_lancamento_id').val()
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
        <h4 class="modal-title" id="editarLabel">Confirma exclusão deste lancamentos?</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="del_lancamento_id" name="id" placeholder="ID" value="<?php echo $Obj->id ?>" readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Descrição</label>
            <div class="col-sm-10">
                <input type="text" id="del_lancamento_descricao" class="form-control" name="descricao" placeholder="Descrição"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Data</label>
            <div class="col-sm-10">
                <input type="text" id="del_lancamento_data" class="form-control" name="data" placeholder="Data"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Valor</label>
            <div class="col-sm-10">
                <input type="text" id="del_lancamento_valor" class="form-control" name="valor" placeholder="Valor"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Sinal</label>
            <div class="col-sm-10">
                <input type="text" id="del_lancamento_sinal" class="form-control" name="sinal" placeholder="Sinal"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Class. Financeira</label>
            <div class="col-sm-10">
                <input type="text" id="del_lancamento_id_classificacaofinanceira" class="form-control" name="id_classificacaofinanceira" placeholder="Class. Financeira"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">C. Custo</label>
            <div class="col-sm-10">
                <input type="text" id="del_lancamento_id_centrocusto" class="form-control" name="id_centrocusto" placeholder="C. Custo"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
                <input type="text" id="del_lancamento_id_familia" class="form-control" name="id_familia" placeholder=""  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Título</label>
            <div class="col-sm-10">
                <input type="text" id="del_lancamento_id_titulo" class="form-control" name="id_titulo" placeholder="Título"  readonly="readonly">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" onclick="remove()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>

</form>
