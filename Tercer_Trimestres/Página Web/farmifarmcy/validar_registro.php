<?php

	include 'conexion_bd.php';

	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$tipo_doc = $_POST['tipo_doc'];
	$documento = $_POST['documento'];
    $rol = $_POST['rol'];
    $contrasena = $_POST['contrasena'];

	// Encriptar la contraseña
	$contrasena = hash('sha512', $contrasena);

	$query = "INSERT INTO usuario(nombres, apellidos, tipo_doc, documento, rol, contrasena)
			  VALUES('$nombres','$apellidos','$tipo_doc','$documento','$rol','$contrasena')";

	/* Verificar que el correo no se repita*/
	$verificar_nombres = mysqli_query($conexion, "SELECT * FROM usuario WHERE nombres='$nombres'");

	if(mysqli_num_rows($verificar_nombres) > 0){
		echo '
			<script>
				alert("Usted ya está registrado");
				window.location = "registro.php";
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
			alert("Usuario no almacenado, inténtelo nuevamente");
			window.location = "registro.php";
		</script>	
		';
	}

	mysqli_close($conexion);
?>