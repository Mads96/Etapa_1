angular.module("ajax",[])
.controller("ajaxController",function($scope,$http)
	{

		//inicio funcion de prueba
		$scope.prueba= function(){
			console.log("funciona");
		}
		//fin funcion de prueba
		$scope.lista= function(){
			$scope.texto=[];
			$http.get("./php/query.php?id=2").
			success(function(data){
				console.log(data);
				$scope.texto=data;

			})
			.error(function(err){

			});
		}


		$scope.texto=[];
		$http.get("./php/query.php?id=1")
		.success(function(data){
				console.log(data);
				$scope.texto=data;

			})
			.error(function(err){

			});

	});
