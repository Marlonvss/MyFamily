<script>
    function loadDelete(id) {
        $("#del_id").val('Carregando...');
        $("#del_nome").val('Carregando...');
        $.ajax({
            url: 'front/familias_services.php',
            type: 'post',
            dataType: 'json',
            data: {
                'id': id,
                'metodo': 'load'
            }
        }).done(function (data) {
            $("#del_id").val(data.id);
            $("#del_nome").val(data.nome);
        });
    }

    function remove() {
        $.ajax({
            url: 'front/familias_services.php',
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
        <h4 class="modal-title" id="editarLabel">Confirma exclusão deste familias?</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="del_id" name="id" placeholder="ID" value="<?php echo $Obj->id ?>" readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Nome</label>
            <div class="col-sm-10">
                <input type="text" id="del_nome" class="form-control" name="nome" placeholder="Nome"  readonly="readonly">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" onclick="remove()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>

</form>
