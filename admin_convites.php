<?php
ob_start();
session_start();

include_once './model/model_convite.php';
include_once './controller/controller_convite.php';

// Session utilizado para trabalhar dentro do browser individuais
$_SESSION['convite'] = 0;
        
if (isset($_GET['edit'])) {
  echo '<META http-equiv="refresh" content="0;URL=?page=convites_editar&edit='.$_GET['edit'].'">';
}

function MakeLinkOptions($id) {
    return
            '<a href="?edit=' . $id . '"><span class="glyphicon glyphicon-pencil"></span> Editar </a>' .
            '<a href="?page=individuais&convite=' . $id . '"><span class="glyphicon glyphicon-tags"></span> Individuais </a>';
}
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Convites</h4>
        <a href="?page=convites_novo">Novo</a>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Familia</th>
                    <th>Operações</th>
                </tr>
            </thead>            
            <tbody>
                <?php
                $ListaConvites = RecuperaTodosConvites();
                foreach ($ListaConvites as &$convite) {

                    echo '<tr>'
                    . '<td class="col-md-2">' . $convite->numero . '</td>'
                    . '<td>' . $convite->familia . '</td>'
                    . '<td class="col-md-3">' . MakeLinkOptions($convite->id) . '</td>'
                    . '</tr>';
                }
                ?>
            </tbody>
        </table>

    </div>
</div>

<?php
$Conteudo = ob_get_contents();

ob_end_clean();

include("admin_master.php");
