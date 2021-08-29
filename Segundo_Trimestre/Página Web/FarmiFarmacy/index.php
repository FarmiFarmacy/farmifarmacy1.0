<?php
	session_start();

	if(isset($_SESSION['cliente'])){
		header("location: home.php");
	}
?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Iniciar Sesión</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">
</head>
<body>
	<div class="login-box">
		<form action="login_usuario.php" method="POST">
			<center>
				<h1>FarmiFarmacy cuidándote las 24 horas del día</h1>
				<!-- Número de Documento -->
				<label class="letra" for="documento">Número de Documento</label>
				<input class="datos" type="text" name="documento">
				<!-- Tipo de Documento -->
				<label class="letra" for="datos">Tipo de Documento</label>
				<select class="datos" name="tipo_doc">
					<option value="CC">Cédula de Ciudadania</option>
					<option value="CE">Cédula de Extranjería</option>
					<option value="TI">Tarjeta de Identidad</option>
					<option value="NIT">Número de Identificación Tributaria</option>
				</select><br><br>
				<!-- Contraseña -->
				<label class="letra" for="password">Contraseña</label>
				<input class="datos" type="password" name="pass">

				<input class="button" type="submit" value="Iniciar Sesión">
				<center>
					<a href="crear_cuenta.php">Crear Cuenta</a><br>
					<a href="rec_contraseña.php">¿Olvidaste la Contraseña?</a>
				</center>
			</center>	 
		</form>
	</div>
	
</body>
</html>