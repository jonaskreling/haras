(function($angular) {
    /**
     * Controller Exposição
     */ 
    $angular.module('app').controller('ExposicaoController',['$scope','exposicaoService','utilService', function($scope,$exposicaoService,$utilService) {
        
        $scope.exposicao = undefined;
        $scope.slides = [];
        
        $scope.findExposicao = function (){
            $exposicaoService.findExposicao({'id':id},
            function() {
    		    $scope.exposicao = $exposicaoService.exposicao;
    		    $scope.tratarExposicao();
    		});
        };
        
        $scope.tratarExposicao = function (){
            $scope.localizacao = [];
            if(!$utilService.isNullOrBlanck($scope.exposicao.local)){
                $scope.localizacao.push($scope.exposicao.local);
            }
            if(!$utilService.isNullOrBlanck($scope.exposicao.cidade)){
                $scope.localizacao.push("  "+$scope.exposicao.cidade);
            }
            if(!$utilService.isNullOrBlanck($scope.exposicao.estado)){
                $scope.localizacao.push("  "+$scope.exposicao.estado);
            }
            if(!$utilService.isNullOrBlanck($scope.exposicao.pais)){
                $scope.localizacao.push("  "+$scope.exposicao.pais);
            }
            $scope.exposicao.local = $scope.localizacao.join();
            $scope.exposicao.data = new Date($scope.exposicao.data);
            $angular.forEach($scope.exposicao.imagens,function(value,key){
                $scope.slides[key] = value.url;
            });
        };
        
        $scope.iniciar = function(){
            $scope.findExposicao();
        };
        $scope.iniciar();
        
    }]);
})(window.angular);