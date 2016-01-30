<?php 
include("conexion.php");
$id = $_GET['id'];

switch ($id) {
	case '1':
		colegio_upload($con);
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
$destino="../img/logos/".$comuna.$nombre.".".$ext;
echo $nombre."    <br/>";
echo $comuna."    <br/>";
echo $tipo."    <br/>";
echo $img."    <br/>";
echo $ext." <br/>";
echo $ruta."    <br/>";
echo $destino."    <br/>";
//copio las imagenes en la carpeta de destino img
copy($ruta,$destino);

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
function usuarios_upload(){

}
//////////////////////////////funcion para guardar colegios ///////////////////////////

?>