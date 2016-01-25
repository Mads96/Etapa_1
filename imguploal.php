<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="guardar.php" method="POST" enctype="multipart/form-data">
		<input type="text" placeholder="nombre" name="nombre">
		<input type="text" placeholder="comuna" name="comuna">
		<input type="text" placeholder="tipo" name="tipo">
		<input type="file" name="img"/>
		<input type="submit" value="aceptar">

	</form>
</body>
</html>