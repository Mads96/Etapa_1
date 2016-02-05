var app = angular.module("colegios",['ngRoute'])

// Configuración de las rutas para las vistas
app.config(function($routeProvider) {

    $routeProvider
        .when('/', {
            templateUrl : 'pages/home.html',
            controller  : 'mainController'
        })
        .when('/acerca', {
            templateUrl : 'pages/acerca.html',
            controller  : 'aboutController'
        })
        .when('/contacto', {
            templateUrl : 'pages/contacto.html',
            controller  : 'contactController'
        })
        .otherwise({
            redirectTo: '/'
        });
});

app.controller('mainController', function($scope) {
    $scope.message = 'Hola, Mundo!';
});

app.controller('aboutController', function($scope) {
    $scope.message = 'Esta es la página "Acerca de"';
});

app.controller('contactController', function($scope) {
    $scope.message = 'Esta es la página de "Contacto", aquí podemos poner un formulario';
});

///////////////////////////////////////////////////////////////////////////////////////////
app.controller("listas",function($scope,$http)
	{
		$scope.colegios=[];
		$http.get("./php/query.php?id=1")
		.success(function(data){
				console.log(data);
				$scope.colegios=data;

			})
			.error(function(err){

			});//scope Colegios

		$scope.comunas=[];
		$http.get("./php/query.php?id=4")
		.success(function(data){
				console.log(data);
				$scope.comunas=data;

			})
			.error(function(err){

			}); //scope Comunas



//Scope porComuna
		$scope.porComuna= function($id){
			$ruta="./php/query.php?id=2&comuna_id="+$id;
			$scope.colegios=[];
			$http.get($ruta).
			success(function(data){
				console.log(data);
				$scope.colegios=data;

			})
			.error(function(err){

			});
		}
//fin scope porComuna

	});//fin controler listas
app.controller('main',function($scope){

});

