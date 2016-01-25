<?php
$host = "localhost";
$user = "root";
$pw = "";
$db = "colegios";
$con= new mysqli($host,$user,$pw,$db);
if ($con->connect_errno) {
	echo "sin conexion";
}else{
	//echo "con conexion";
}
/*$sql="insert into tipo_c (tipo_c_nombre) values ('prueba')
";
if ($con->query($sql)) {
echo "dato incertado";
}else{echo "dato no incertado";}
*/

?>