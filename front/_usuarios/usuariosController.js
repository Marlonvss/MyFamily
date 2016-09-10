angular.module("myFamilyApp").controller("usuariosController", function ($scope, $http) {
    $scope.title = "Usuários";

    var getList = function () {
        $http.get("front/usuariosService.php").then(function (result) {
            $scope.listAll = result.data;
        });
    };
    getList();

});

