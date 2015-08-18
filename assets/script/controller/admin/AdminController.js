(function($angular) {
	$angular.module('app').controller('AdminController',['$scope','$timeout', function($scope,$timeout) {
		
		$scope.idPaginaAtual = 'teste';
		
		$scope.trocarPagina = function (novaPagina){
			$scope.idPaginaAtual = novaPagina;
			$timeout(function(){
				$scope.idPaginaAtual = '';
			},200);
		};
	  
		$scope.iniciar = function(){
			
		};
		$scope.iniciar();
		
	}]);
})(window.angular);