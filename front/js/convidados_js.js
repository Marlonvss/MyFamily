function Convidado_loadConvidados() {
    Convidado_SetLoading(true);
    $.ajax({
        url: 'convidados_ajax.php',
        type: 'post',
        dataType: 'json',
        data: {
            'metodo': 'RecuperaConvidados',
            'id': $('#convidados #convite').val()
        }
    }).done(function (data) {
        Convidado_drawTable(data);
    });
}

function Convidado_drawTable(data) {

    $("#convidados #tableConvidados td").parent().remove();
    for (var i = 0; i < data.length; i++) {
        Convidado_drawRow(data[i]);
    }
    $("#convidados #part_one").slideUp();
    $("#convidados #part_two").slideDown();
    Convidado_SetLoading(false);
}

function Convidado_drawRow(rowData) {
    var row = $("<tr />")
    $("#tableConvidados").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
    row.append($("<td>" + rowData.nome + "</td>"));

    if (rowData.confirmado == true) {
        row.append($("<td>Sim</td>"));
        var data = new Date(rowData.dataconfirmacao.toString() + ' 00:00');
        row.append($("<td>" + data.getDate() + '/' + (data.getMonth() + 1) + '/' + data.getFullYear() + "</td>"));
    } else {
        row.append($("<td>Não</td>"));
        row.append($("<td>Não confirmado</td>"));
    }
    row.append($("<td><a href='javascript:#' onclick='Convidado_confirmaConvidado(" + rowData.id + ")'><span class='glyphicon glyphicon-ok-circle'></span> Confirmar</a><br><a href='javascript:#' onclick='Convidado_desconfirmaConvidado(" + rowData.id + ")'><span class='glyphicon glyphicon-remove-circle'></span> Cancelar</a></td>"));
}

function Convidado_backConvidados() {
    $("#convidados #part_two").slideUp();
    $("#convidados #part_one").slideDown();
}

function Convidado_confirmaConvidado(id) {
    Convidado_SetLoading(true);
    $.ajax({
        url: 'convidados_ajax.php',
        type: 'post',
        dataType: 'text',
        data: {
            'metodo': 'ConfirmarUsuario',
            'id': id
        }
    }).done(function (data) {
        Convidado_loadConvidados();
        $('#msg').html(data);
    });
}

function Convidado_desconfirmaConvidado(id) {
    Convidado_SetLoading(true);
    $.ajax({
        url: 'convidados_ajax.php',
        type: 'post',
        dataType: 'text',
        data: {
            'metodo': 'DesconfirmarUsuario',
            'id': id
        }
    }).done(function (data) {
        Convidado_loadConvidados();
        $('#msg').html(data);
    });
}

function Convidado_SetLoading(loading) {
    if (loading === true) {
        $('#convidados #loading').show();
        $('#convidados #loaded').hide();
    } else {
        $('#convidados #loading').hide();
        $('#convidados #loaded').show();
    }
}