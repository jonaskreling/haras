(function($angular) {
	/**
	 * Raça Service
	 */ 
	$angular.module('app').service('racaService',['$http','utilService', function ($http,$utilService) {
	    
	    var service = {};
	    var error = {};
	    
	    service.listaraca = [];
	    service.raca = [];
	    
	    service.salvarRaca = function(dados, callback) {
			$http.post($utilService.urlAction()+'salvarRaca',dados).success(
			function (data){
				service.racas(function (){});
				callback(data);
			}).error(error.erro);
		};
		
		service.deletarRaca = function(dados, callback) {
			$http.post($utilService.urlAction()+'deletarRaca',dados).success(
			function (data){
				service.racas(function (){});
				callback(data);
			}).error(error.erro);
		};
		
		service.racas = function (callback){
		    $http.post($utilService.urlAction()+'racas').success(
	    	function (data){
	    		service.listaraca = $angular.fromJson(data);
	    		callback(data);
	    	}).error(error.erro);
		};
		service.racas(function (){});
		
		error.erro = function(data, status, headers, config) {
		    console.log(data);
			alert("Erro ao carregar os dados requisitados.");
		};
		
		return service;
	    
	}]);
})(window.angular);