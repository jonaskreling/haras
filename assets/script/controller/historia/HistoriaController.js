(function($angular) {
  $angular.module('app').controller('HistoriaController',['$scope','$interval','$q','$http', function($scope,$interval,$q,$http) {
      
      $scope.limpar = function (link){
        window.location.href = link;
      };
      
      $scope.historiaNome = "História";
      
      $scope.iniciar = function(){
      };
      $scope.iniciar();
  }]);
})(window.angular);