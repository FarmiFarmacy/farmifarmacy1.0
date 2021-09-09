<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Crear Cuenta</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
</head>
<body>	
	<div class="registro">
		<h2>Crear Cuenta</h2>
		<a href="index.php"><img class="avatar" src="imagenes/FarmiFarmacy.png" alt="Logo"></a>
		<form action="registrar_usuario.php" method="POST">	
			<center>
				<input class="datos" type="text" name="nombres" placeholder="Nombres" required="">
				<input class="datos" type="text" name="apellidos" placeholder="Apellidos" required="">
				<input class="datos" type="email" name="correo" placeholder="Correo Electrónico" required="">
				<select class="datos" name="tipo_doc" required="">
					<option value="CC">Cédula de Ciudadania</option>
					<option value="CE">Cédula de Extranjería</option>
					<option value="TI">Tarjeta de Identidad</option>
					<option value="NIT">Número de Identificación Tributaria</option>
				</select>
				<input class="datos" type="text" name="documento" placeholder="Número de Documento" required="">
				<input class="datos" type="text" name="direccion" placeholder="Dirección" required="">
				<input class="datos" type="number" name="numero" placeholder="Número de Celular" required="">
				<input class="datos" type="password" name="pass" placeholder="Contraseña" required="">
				<input class="datos" type="password" name="conf_pass" placeholder="Confirme la Contraseña" required=""><br>
				<input class="datos" type="date" name="fecha" placeholder="Fecha de Nacimiento" required=""><br>
				<input class="button" type="submit" name="listo" value="Listo">		
				
			</center>
		</form>
	</div>
</body>
</html>
