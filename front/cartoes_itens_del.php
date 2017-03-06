<script>
    function loadDelete(id) {
        $("#del_id").val('Carregando...');
        $("#del_datacompra").val('Carregando...');
        $("#del_descricao").val('Carregando...');
        $("#del_valor").val('Carregando...');
        $("#del_parcelas").val('Carregando...');
        $("#del_id_centrocusto").val('Carregando...');
        $("#del_id_classificacaofinanceira").val('Carregando...');
        $.ajax({
            url: 'front/cartoes_itens_services.php',
            type: 'post',
            dataType: 'json',
            data: {
                'id': id,
                'metodo': 'load'
            }
        }).done(function (data) {
            $("#del_id").val(data.id);
            $("#del_datacompra").val(data.datacompra);
            $("#del_descricao").val(data.descricao);
            $("#del_valor").val(data.valor);
            $("#del_parcelas").val(data.parcelas);
            $("#del_id_centrocusto").val(data.id_centrocusto);
            $("#del_id_classificacaofinanceira").val(data.id_classificacaofinanceira);
        });
    }

    function remove() {
        $.ajax({
            url: 'front/cartoes_itens_services.php',
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
        <h4 class="modal-title" id="editarLabel">Confirma exclusão deste cartoes_itens?</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="del_id" name="id" placeholder="ID" value="<?php echo $Obj->id ?>" readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Data da compra</label>
            <div class="col-sm-10">
                <input type="text" id="del_datacompra" class="form-control" name="datacompra" placeholder="Data da compra"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Descrição</label>
            <div class="col-sm-10">
                <input type="text" id="del_descricao" class="form-control" name="descricao" placeholder="Descrição"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Valor da parcela</label>
            <div class="col-sm-10">
                <input type="text" id="del_valor" class="form-control" name="valor" placeholder="Valor da parcela"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Parcela</label>
            <div class="col-sm-10">
                <input type="text" id="del_parcelas" class="form-control" name="parcelas" placeholder="Parcela"  readonly="readonly">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" onclick="remove()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>

</form>
