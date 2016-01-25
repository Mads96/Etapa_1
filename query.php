<?php 
include("php/conexion.php");
$nombre='prueba';
$sqlS = "Select * from colegios  order by colegio_id";
$res =$con->query($sqlS);
$texto=array();
while ( $fila=$res->fetch_assoc()) {
	$texto[] = array('id'=>$fila["colegio_id"],'nombre'=>$fila["colegio_nombre"],'comuna'=>$fila["comuna_id"],'tipo'=>$fila["tipo_c_id"],'logo'=>$fila["colegio_logo"],); 

}
	$texto= json_encode($texto);
	echo $texto;
$con->close();
?>