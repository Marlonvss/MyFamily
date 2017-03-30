<script>
    function loadDelete(id) {
        $("#del_id").val('Carregando...');
        $("#del_descricao").val('Carregando...');
        $("#del_controladespesa").val('Carregando...');
        $.ajax({
            url: 'front/centroscustos_services.php',
            type: 'post',
            dataType: 'json',
            data: {
                'id': id,
                'metodo': 'load'
            }
        }).done(function (data) {
            $("#del_id").val(data.id);
            $("#del_descricao").val(data.descricao);
            $("#del_controladespesa").val(data.controladespesa);
        });
    }

    function remove() {
        $.ajax({
            url: 'front/centroscustos_services.php',
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
        <h4 class="modal-title" id="editarLabel">Confirma exclusão deste centroscustos?</h4>
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
                <input type="text" id="del_descricao" class="form-control" name="descricao" placeholder="Descrição"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Controla despesa?</label>
            <div class="col-sm-10">
                <input type="text" id="del_controladespesa" class="form-control" name="controladespesa" placeholder="Controla despesa?"  readonly="readonly">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" onclick="remove()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>

</form>
