(function($angular) {
    /**
     * Exposição Grupo Controller
     */ 
    $angular.module('app').controller('ExposicaoGrupoController',['$scope','exposicaoService','utilService', function($scope,$exposicaoService,$utilService) {
        
        $scope.linkar = function (link){
          window.location.href = link;
        };
        
        $scope.openExposicao = function (id){
        	$scope.linkar($utilService.urlAction()+'exposicao/'+id);
        };
        
        $scope.exposicaoNome = "Exposições";
        $scope.listaexposicoes = undefined;
        
        $scope.carregarExposicoes = function (){
            $exposicaoService.exposicaoCarregar({},
            function() {
    		    $scope.listaexposicoes = $exposicaoService.listaexposicao;
    		    $scope.tratarListaExposicoes();
    		});
        };
        
        $scope.tratarListaExposicoes = function (){
        	$scope.listaexposicoesdivididas = [];	
    		while ($scope.listaexposicoes.length) {
        		$scope.listaexposicoesdivididas.push($scope.listaexposicoes.splice(0, 3));
    		}
        };
        
        $scope.iniciar = function(){
            $scope.carregarExposicoes();
        };
        $scope.iniciar();
        
    }]);
})(window.angular);