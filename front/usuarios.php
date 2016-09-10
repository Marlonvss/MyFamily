<script src="../front/_usuarios/usuariosController.js"></script>
<script src="../front/_usuarios/usuariosService.js"></script>

<div class="row" ng-controller="usuariosController">
    <h3 ng-bind="title"></h3>
    <div class="panel">
        <div class="panel-menu admin-form theme-primary">
            <div class="row" data-animate="['500','fadeIn']">
                <div class="col-md-9">
                    <label class="append-icon">
                        <button href="#" class="btn btn-primary btn-alt fs13 active-animation" data-effect="mfp-flipInX" ng-click="exibirModal('novoContato.html')">
                            Novo &nbsp;
                            <i class="fa fa-plus right"></i>
                        </button>
                    </label>
                </div>
                <div>
                    <label class="append-icon">
                        <input type="text" class="gui-input" placeholder="Buscar..." ng-model="filtro" />
                        <label class="field-icon">
                            <i class="fa fa-search"></i>
                        </label>
                    </label>
                </div>
            </div>
        </div>
        <div class="panel-body pn">
            <div class="table-responsive">
                <table class="table admin-form theme-warning tc-checkbox-1 fs13">
                    <thead>
                        <tr class="bg-light">
                            <th class="col-md-3">Login</th>
                            <th class="col-md-1">Ações</th>
                        </tr>
                    </thead>
                    <tbody ng-repeat="item in listAll| filter : filtro">
                        <tr>
                            <td ng-bind="item.login"></td>
                            <td>
                                <button class="btn btn-primary" href="#" ng-click="msg('editando')"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                <button class="btn btn-danger" ng-click="msg('excluindo')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>