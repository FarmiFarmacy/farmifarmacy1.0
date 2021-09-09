<?php

	session_start();	

	include 'conexion_be.php';

	$documento = $_POST['documento'];
	$tipo_doc = $_POST['tipo_doc'];
	$pass = $_POST['pass'];
	$pass = hash('sha512', $pass);

	$validar_login = mysqli_query($conexion, "SELECT * FROM clientes WHERE documento='$documento' and tipo_doc='$tipo_doc' and pass='$pass'");

	if(mysqli_num_rows($validar_login) > 0){
		$_SESSION['cliente'] = $documento;	
		header("location: home.php");
		exit;
	}else{
		echo '
		<script>
			alert("Usuario no existente, por favor verifique los datos");
			window.location = "index.php";
		</script>
		';
		exit;
	}
?>