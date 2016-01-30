<?php 

$id = $_GET['id'];

/////////////////////////MENU///////////////////
switch ($id) {
	case '1':
		colegios();
		break;
	case '2':
		colegiost();
		break;
	case '3':
		# code...
		break;
	default:
		# code...
		break;
}

/////////////////////////MENU FIN///////////////////////////////////////

/////////////////////////colegios////////////////////////////////////////

function colegios(){
include("conexion.php");	
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
	$con->close();
}
/////////////////////////colegios FIN/////////////////////////////////////

/////////////////////////colegiost /////////////////////////////////////
function colegiost(){
include("conexion.php");	
$sqlS = "Select * from colegios WHERE colegio_id = 1 order by colegio_id";
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
	$con->close();
}///////////////////////////////colegiost FIN/////////////////////////////////////

//////////////////////////////////////comunas/////////////////////////////////
function comunas($con,$comuna_id){
	

$consulta="SELECT * FROM comunas WHERE comuna_id=$comuna_id";
$resultado=$con->query($consulta);
while ($fila=$resultado->fetch_array()) {
$nombre= $fila['comuna_nombre'];
}	
	$prueba=$nombre;
return $prueba;
}
//////////////////////////////////////comunas FIN/////////////////////////////////

//////////////////////////////////////tipos/////////////////////////////////
function tipos($con,$tipo_id){

$consulta="SELECT * FROM tipos_c WHERE tipo_c_id=$tipo_id";
$resultado=$con->query($consulta);
while ($fila=$resultado->fetch_array()) {
	$nombre=$fila['tipo_c_nombre'];
}
return $nombre;
}

function tipo($con){

$consulta="SELECT * FROM tipos_c order by tipo_c_id";
$resultado=$con->query($consulta);
while ($fila=$resultado->fetch_array()) {
	$nombre=$fila['tipo_c_nombre'];
}
return $nombre;
}
//////////////////////////////////////tipos FIN/////////////////////////////////





?>