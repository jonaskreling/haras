var isIndex = function(){
    var urlI = window.location.protocol+'//'+window.location.host;
    var url = document.URL.replace(urlI,'');
    if(url == '/' || url == '/index.php' || url == '' || url == '/index.php/' || url == '/index.php/deslogarUsuario' || url == 'index.php/deslogarUsuario'){
        return true;
    }
    return false;
};

var app = undefined;
if(isIndex()){
    app = angular.module('app', ['angular-flexslider']);
}else{
    app = angular.module('app', ['ui.utils','ui.mask','ui.utils.masks','angularCharts','angular-flexslider','ngImgur']);
}

app.directive('myYoutube', function($sce) {
  return {
    restrict: 'EA',
    scope: { code:'=' },
    replace: true,
    template: '<div style="height:400px;"><iframe style="overflow:hidden;height:100%;width:100%" width="100%" height="100%" src="{{url}}" frameborder="0" allowfullscreen></iframe></div>',
    link: function (scope) {
        console.log('here');
        scope.$watch('code', function (newVal) {
           if (newVal) {
               scope.url = $sce.trustAsResourceUrl("https://www.youtube.com/embed/" + newVal);
           }
        });
    }
  };
});