<?php
$_LOGIN = ($_POST['login']);
$_SENHA = ($_POST['senha']);


if (($_LOGIN <> "") && ($_SENHA <> "")) {

    var_dump($_LOGIN . 'meu segundo ex');
    $Obj = new usuario(0, $_LOGIN, $_SENHA);

    $Controll = new CONTROLLERusuarios();
    $erro = $Controll->Save($Obj);

    if ($erro->erro) {
        echo $erro->mensagem;
    } else {
        echo '<META http-equiv="refresh" content="0;URL=?pag=' . $pag_usuarios . '">';
    }
}
?>
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
      '<button type="button" class="btn btn-sm btn-link" id="botao" value="'. $id .'" data-toggle="modal" data-target="#editar">Editar</button>';
//            '<a href="?pag=' . $_SESSION['pag'] . '_edit&edit=' . $id . '"><span class="glyphicon glyphicon-pencil"></span> Editar </a>' .
//            '<a href="?pag=' . $_SESSION['pag'] . '&remove=' . $id . '"><span class="glyphicon glyphicon-remove"></span> Excluir </a>';
}
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Usuários</h1>
    </div>
</div>

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
                        . '<td class="col-md-2">' . MakeLinkOptions($obj->id) . '</td>'
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
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
                <h4 class="modal-title" id="novoLabel">Novo</h4>
            </div>
            <div class="modal-body">
                <?php include 'usuarios_add.php'; ?>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="save()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="editarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
                <h4 class="modal-title" id="editarLabel">Editar</h4>
            </div>
            <div class="modal-body">
                <?php include 'usuarios_edit.php'; ?>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="save()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>