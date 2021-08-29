<?php

	include 'conexion_be.php';

	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$correo = $_POST['correo'];
	$tipo_doc = $_POST['tipo_doc'];
	$documento = $_POST['documento'];
	$direccion = $_POST['direccion'];
	$numero = $_POST['numero'];
	$pass = $_POST['pass'];
	$fecha = $_POST['fecha'];

	// Encriptar la contraseña
	$pass = hash('sha512', $pass);

	$query = "INSERT INTO clientes(nombres, apellidos, correo, tipo_doc, documento, direccion, numero, pass, fecha)
			  VALUES('$nombres','$apellidos','$correo','$tipo_doc','$documento','$direccion','$numero','$pass','$fecha')";

	/* Verificar que el correo no se repita*/
	$verificar_documento = mysqli_query($conexion, "SELECT * FROM clientes WHERE documento='$documento'");

	if(mysqli_num_rows($verificar_documento) > 0){
		echo '
			<script>
				alert("Este documento ya está registrado, intenta con otro diferente");
				window.location = "crear_cuenta.php";
			</script>
		';
		exit();
	}

	$ejecutar = mysqli_query($conexion, $query);	

	if($ejecutar){
		echo '
		<script>
			alert("Usuario almacenado exitosamente");
			window.location = "index.php";
		</script>	
		';
	}else{
		echo '
		<script>
			alert("Intentalo de nuevo, usuario no almacenado");
			window.location = "crear_cuenta.php";
		</script>	
		';
	}

	mysqli_close($conexion);
?>