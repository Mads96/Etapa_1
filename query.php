<?php 



function colegios(){
include("php/conexion.php");	

//colegios//
$sqlS = "Select * from colegios  order by colegio_id";
$res =$con->query($sqlS);
$texto=array();
while ( $fila=$res->fetch_assoc()) {
	$id=$fila["colegio_id"];
	$nombre=$fila["colegio_nombre"];
	$comuna= $fila["comuna_id"];
	$comuna=comunas($con,$comuna);
	$tipo=tipos($con,$fila["tipo_c_id"]);
	$logo=$fila["colegio_logo"];
	$texto[] = array('id'=>$id,'nombre'=>$nombre,'comuna'=>$comuna,'tipo'=>$tipo,'logo'=>$logo,); 	
	
}

	$texto= json_encode($texto);
	echo $texto;
		
//colegios//
$con->close();
}

function comunas($con,$comuna_id){
	

$consulta="SELECT * FROM comunas WHERE comuna_id=$comuna_id";
$resultado=$con->query($consulta);
while ($fila=$resultado->fetch_array()) {
$nombre= $fila['comuna_nombre'];
}	
	$prueba=$nombre;
return $prueba;
}

function tipos($con,$tipo_id){

$consulta="SELECT * FROM tipos_c WHERE tipo_c_id=$tipo_id";
$resultado=$con->query($consulta);
while ($fila=$resultado->fetch_array()) {
	$nombre=$fila['tipo_c_nombre'];
}
return $nombre;
}


colegios();


?>