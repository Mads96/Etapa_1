<?php 
include("conexion.php");

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


?>