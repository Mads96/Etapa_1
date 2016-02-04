<?php 
include("conexion.php");
$id = $_GET['id'];

switch ($id) {
	case '1':
		colegio_upload($con);
		break;
	case '2':
		usuario_upload($con);
		break;
	case '3':
		relaciones($con);
		break;
	default:
		echo "error";
		break;
}

//////////////////////////////funcion para guardar colegios ///////////////////////////
function colegio_upload($con){
//codi para subir las imagenes de los colegios 

//recivo los datos y los proceso para tener una sintaxis mas limpia
$nombre = $_POST['nombre'];
$comuna = $_POST['comuna'];
$tipo = $_POST['tipo'];
$img=$_FILES['img']['name'];
$ruta=$_FILES['img']['tmp_name'];
$ext = pathinfo($img, PATHINFO_EXTENSION);//esto lee la extencion del archivo
$destino="img/logos/".$comuna.$nombre.".".$ext;
echo $nombre."    <br/>";
echo $comuna."    <br/>";
echo $tipo."    <br/>";
echo $img."    <br/>";
echo $ext." <br/>";
echo $ruta."    <br/>";
echo $destino."    <br/>";
//copio las imagenes en la carpeta de destino img
copy($ruta,"../".$destino);

//mysqli_query($con,"INSERT INTO colegios VALUES ('','$nombre','$comuna','$tipo','$destino')");
$consulta= "INSERT INTO colegios VALUES ('','$nombre','$comuna','$tipo','$destino')";
$resultado= $con-> query($consulta);
if($resultado){
echo $nombre."    <br/>";
echo $comuna."    <br/>";
echo $tipo."    <br/>";
echo $img."    <br/>";
echo $ext." <br/>";
echo $ruta."    <br/>";
echo $destino."    <br/>";
}
else {echo "fracaso";}
}

//////////////////////////////funcion para guardar colegios ///////////////////////////

//////////////////////////////funcion para guardar usuarios ///////////////////////////
function usuario_upload($con){
	$nombre=$_POST['nombre'];
	$ap_p=$_POST['ap_p'];
	$ap_m=$_POST['ap_m'];
	$correo=$_POST['correo'];
	$clave=$_POST['clave'];
	$consulta= "INSERT INTO usuarios VALUES ('','$nombre','$ap_p','$ap_m','$correo','$clave','')";
	$resultado= $con-> query($consulta);
	if ($resultado) {
		echo $nombre;
		echo $ap_p;
		echo $ap_m;
		echo $correo;
		echo $clave;

	} else {
		echo "error";
	}
}
//////////////////////////////funcion para guardar colegios ///////////////////////////
function relaciones($con){
session_start();
if(isset($_SESSION['username'])){
echo "Si me puedes ver <a href='logout.php'>cerrar</a> ".$_SESSION['username'];
}else{echo "No me puedes ver";}
}
?>