(function($angular) {
      $angular.module('app').controller('SlidePadraoController',['$scope','$interval','$q', function($scope,$interval,$q) {
            $scope.enviar = function (){
            	$('#formBuscaInicial').submit();
            };
            $scope.limpar = function (link){
            	window.location.href = link;
            };
            
      }]);
})(window.angular);