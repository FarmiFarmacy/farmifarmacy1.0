<?php

	include 'conexion_be.php';

	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$tipo_doc = $_POST['tipo_doc'];
	$documento = $_POST['documento'];
	$rol = $_POST['rol'];
	$estado = $_POST['estado'];
    $contrasena = $_POST['contrasena'];

	// Encriptar la contraseña
	$contrasena = hash('sha512', $contrasena);

	$query = "INSERT INTO empleados(nombres, apellidos, tipo_doc, documento, rol, estado, contrasena)
			  VALUES('$nombres','$apellidos','$tipo_doc','$documento','$rol','$estado','$contrasena')";

	/* Verificar que el documento no se repita*/
	$verificar_documento = mysqli_query($conexion, "SELECT * FROM empleados WHERE documento='$documento'");

	if(mysqli_num_rows($verificar_documento) > 0){
		echo '
			<script>
				alert("Este documento ya está registrado, intenta con otro diferente");
				window.location = "agregar_empleado.php";
			</script>
		';
		exit();
	}

	$ejecutar = mysqli_query($conexion, $query);	

	if($ejecutar){
		echo '
		<script>
			alert("Empleado registrado exitosamente");
			window.location = "agregar_empleado.php";
		</script>	
		';
	}else{
		echo '
		<script>
			alert("Intentalo de nuevo, empleado no registrado");
			window.location = "agregar_empleado.php";
		</script>	
		';
	}

	mysqli_close($conexion);
?>