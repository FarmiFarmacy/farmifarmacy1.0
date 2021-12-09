<?php
    include_once('includes/config.php');

    $nombre = $_POST['nombre'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $contraseña = $_POST['contraseña'];

	// Encriptar la contraseña
	$contraseña = hash('sha1', $contraseña);
	
    $query = "INSERT INTO usuario (nombre, nombre_usuario, contraseña)
              VALUES ('$nombre','$nombre_usuario','$contraseña')";

    //Verificar que el usuario no se repita
    $verificar_nombre = mysqli_query($conexion, "SELECT * FROM usuario WHERE nombre='$nombre'");

    if(mysqli_num_rows($verificar_nombre) > 0){
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