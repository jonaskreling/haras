(function($angular) {
    $angular.module('app').controller('SlideInicialController',['$scope','utilService', function($scope,$utilService) {
          $scope.enviar = function (){
          	$('#formBuscaInicial').submit();
          };
          $scope.limpar = function (link){
          	window.location.href = link;
          };
          
          $scope.slides = [
          	$utilService.urlAssets() + '/images/banner/banner_central_1.jpg',
          	$utilService.urlAssets() + '/images/banner/banner_central_2.jpg',
          	$utilService.urlAssets() + '/images/banner/banner_central_3.jpg',
          	$utilService.urlAssets() + '/images/banner/banner_central_4.jpg',
          	$utilService.urlAssets() + '/images/banner/banner_central_5.jpg',
          	$utilService.urlAssets() + '/images/banner/banner_central_6.jpg',
          	$utilService.urlAssets() + '/images/banner/banner_central_7.jpg'
    	];
    	
    	$scope.iniciar = function (){
    	     
    	};
    	$scope.iniciar();
    }]);
})(window.angular);