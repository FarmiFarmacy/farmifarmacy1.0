<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Renovar Contraseña</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
</head>
<body>
	<div class="renovar_pass">
		<a href="index.php"><img class="avatar" src="imagenes/FarmiFarmacy.png" alt="Logo"></a>
		<h2>Cambiar Contraseña</h2>
		<form method="post" action="index.php">
			<center>
				<h3>Recuerda poner una contraseña segura</h3>
				<label class="letra">Ingrese una contraseña nueva</label><br>
				<input class="datos" type="password" name="pass"><br>
				<label class="letra">Confirme la Contraseña</label><br>
				<input class="datos" type="password" name="password"><br>
				<input class="button" type="submit" name="cambiar" value="Cambiar"><br>
			</center>
		</form>
	</div>
</body>
</html>