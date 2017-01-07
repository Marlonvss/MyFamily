<?php
$Controll = new CONTROLLERusuarios();

if (isset($_GET['remove'])) {
    $erro = $Controll->Remove($_GET['remove']);
    if ($erro->erro) {
        echo $erro->mensagem;
    }
}

function MakeLinkOptions($id) {
    return
            '<button type="button" class="btn btn-link btn-xs" id="botao" value="' . $id . '" data-toggle="modal" data-target="#editar"><i class="fa fa-folder-open-o" aria-hidden="true"></i></button>' .
            '<div class="btn-group">' .
            '  <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">' .
            '    <i class="fa fa-angle-down" aria-hidden="true"></i>' .
            '  </button>' .
            '  <ul class="dropdown-menu" role="menu">' .
            '    <button type="button" class="btn btn-link btn-md" id="botao" value="' . $id . '" data-toggle="modal" data-target="#deletar"><i class="fa fa-trash-o" aria-hidden="true"></i> - Deletar</button>' .
            '  </ul>' .
            '</div>';
}
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#novo">Novo</button>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Login</td>
                    <td>Senha</td>
                    <td>Opções</td>
                </tr>
            </thead>
            <tbody>

                <?php
                $erro = $Controll->RecuperaLista($List);
                if ($erro->erro) {
                    echo $erro->mensagem;
                } else {

                    foreach ($List as &$obj) {
                        echo '<tr>'
                        . '<td class="col-md-1">' . $obj->id . '</td>'
                        . '<td class="col-md-5">' . $obj->login . '</td>'
                        . '<td>' . $obj->senha . '</td>'
                        . '<td class="col-md-1">' . MakeLinkOptions($obj->id) . '</td>'
                        . '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>   
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="novo" tabindex="-1" role="dialog" aria-labelledby="novoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'usuarios_add.php'; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="editarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'usuarios_edit.php'; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="deletar" tabindex="-1" role="dialog" aria-labelledby="deletarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'usuarios_del.php'; ?>
        </div>
    </div>
</div>