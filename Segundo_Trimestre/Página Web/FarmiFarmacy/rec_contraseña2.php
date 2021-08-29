<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Recuperar Contraseña</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
</head>
<body>
	<div class="rec_pass">
		<a href="index.php"><img class="avatar" src="imagenes/FarmiFarmacy.png" alt="Logo"></a>
		<h2>Recuperar Contraseña</h2>
		<form method="post" action="renovar_pass.php">
			<center>
				<h3>Señor usuario, en caso de perdida de contraseña, hemos enviado un código a su número que debe Verificar, por favor ingrese el código para direccionarlo al cambio de contraseña</h3>
				<label class="letra">Ingresar Código</label><br>
				<input class="datos" type="number" name="rec_pass"><br>
				<input class="button" type="submit" name="rec_pass" value="Verificar"><br>
			</center>
		</form>
	</div>
</body>
</html>