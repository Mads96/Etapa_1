angular.module("ajax",[])
.controller("ajaxController",function($scope,$http)
	{

		//inicio funcion de prueba
		$scope.prueba= function($valor){
			console.log($valor);
		}
		//fin funcion de prueba


//Scope lista
		$scope.lista= function($id){
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
//fin scope lista
		

		$scope.colegios=[];
		$http.get("./php/query.php?id=1")
		.success(function(data){
				console.log(data);
				$scope.colegios=data;

			})
			.error(function(err){

			});

		$scope.comunas=[];
		$http.get("./php/query.php?id=4")
		.success(function(data){
				console.log(data);
				$scope.comunas=data;

			})
			.error(function(err){

			});

	});
