(function($angular) {
	$angular.module('app').controller('ContatoController',['$scope','animalService', function($scope,$animalService) {
    
      $scope.limpar = function (link){
        window.location.href = link;
      };
      
      $scope.contatoNome = "Contato/Localização";
      
      $scope.enviarEmail = function (){
        $scope.email.telefone = 'sem telefone';
        $animalService.enviarEmail($scope.email,function (){
          
        });  
      };
      
      $scope.iniciar = function(){
      };
      $scope.iniciar();
  }]);
})(window.angular);