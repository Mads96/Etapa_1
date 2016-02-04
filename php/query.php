<?php 
include("conexion.php");
$id = $_GET['id'];

/////////////////////////MENU///////////////////
switch ($id) {
	case '1':
		colegios($con);
		break;
	case '2':
		$comuna_id= $_GET['comuna_id'];
		colegios_comuna($con, $comuna_id);
		break;
	case '3':
		# code...
		break;
	case '4':
		comunas_old($con);
		break;
	default:
		# code...
		break;
}

/////////////////////////MENU FIN///////////////////////////////////////

/////////////////////////colegios////////////////////////////////////////

function colegios($con){
	
$sqlS = " SELECT * FROM colegios ";
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
function colegios_comuna($con, $comuna_id){
	
if (!restringir($con)) {
	echo "no se ve";
} else {
	

$sqlS = "Select * from colegios WHERE comuna_id = $comuna_id order by colegio_id";
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
	$con->close();}
}///////////////////////////////colegiost FIN/////////////////////////////////////

//////////////////////////////////////comunas/////////////////////////////////
function comunas($con,$comuna_id){
	

$consulta="SELECT * FROM comunas WHERE comuna_id=$comuna_id order by comuna_id";
$resultado=$con->query($consulta);
while ($fila=$resultado->fetch_array()) {
$nombre= $fila['comuna_nombre'];
}	
	$prueba=$nombre;
return $prueba;
}
//////////////////////////////////////comunas FIN/////////////////////////////////

function comunas_old($con){
	

$consulta="SELECT * FROM comunas order by comuna_id";
$resultado=$con->query($consulta);
$texto=array();
while ($fila=$resultado->fetch_array()) {
$nombre= $fila['comuna_nombre'];
$id= $fila['comuna_id'];
$texto[]= array('id'=> $id, 'nombre'=>$nombre);
}	
	$texto= json_encode($texto);
	echo $texto;
	$con->close();
}


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
function restringir($con){
session_start();
if(isset($_SESSION['username'])){
echo "Si me puedes ver <a href='logout.php'>cerrar</a> ".$_SESSION['username'];
return true;
}else{
	//header('location: index.html');
	return true;
}
}




?>