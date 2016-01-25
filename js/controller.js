angular.module("ajax",[])
.controller("ajaxController",function($scope,$http)
	{
		//inicio funcion de prueba
		$scope.prueba= function(){
			console.log("funciona");
		}//fin funcion de prueba
		$scope.texto=[];
		$http.get("./query.php")
		.success(function(data){
				console.log(data);
				$scope.texto=data;

			})
			.error(function(err){

			});

	});
