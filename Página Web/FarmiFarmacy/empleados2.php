<?php
	session_start();

	if(!isset($_SESSION['empleado'])){
		echo '
			<script>
				alert("Por favor debes iniciar sesión");
				window.location = "empleados.php";
			</script>
		';
		session_destroy();
		die();
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administrador</title>
	<link rel="stylesheet" type="text/css" href="css/css.css">	
	<link rel="stylesheet" type="text/css" href="css/admins.css">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap" rel="stylesheet">
	<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>
	<input type="checkbox" id="check">
	<header>
		<a href="home.php" class="logo">
			<span>Farmi</span>Farmacy</a>
			<p class="eslogan">Cuidándote las <span>24</span> horas del día</p>
			<nav class="navbar">
				<li><a href="#">Categorias<i class="icon ion-md-arrow-dropdown"></i></a>
					<ul>
						<li><a href="sobre_nosotros.php">Sobre Nosotros</a></li>
						<li><a href="home.php">Productos</a></li>
					</ul>
				</li>
				<li><a href="#">Sesión<i class="icon ion-md-arrow-dropdown"></i></a>
					<ul>
						<li><a href="ver_sesion.php">Ver Sesión</a></li>
						<li><a href="cerrar_sesion3.php">Cerrar Sesión</a></li>
					</ul>
				</li>
			</nav>
			<div class="buscar">
				<input type="text" placeholder="Buscar" required>
			</div>
	</header>
	<label for="check">
		<i class="fas fa-bars" id="sidebar_btn"></i>
	</label>
	<div class="sidebar">
		<center class="profile-image">
			<img src="imagenes/empleado.png" alt="">
			<h4>Heelen Cano</h4>
			<h5>Empleado</h5>
		</center>
		<li class="item">
			<a href="mis_clientes.php" class="menu-btn">
				<i class="fas fa-user-cog"></i><span>Mis Clientes</span>
			</a>
		</li>
		<li class="item" id="profile">
			<a href="#profile" class="menu-btn">
				<i class="fas fa-users"></i><span>Cambiar Usuario<i class="fas fa-chevron-down drop-down"></i></span>
			</a>
			<div class="sub-menu">
				<a href="ver_sesion.php"><i class="fas fa-user-circle"></i><span>Cliente</span></a>
				<a href="administrador.php"><i class="fas fa-user-tie"></i><span>Administrador</span></a>
				<a href="empleados2.php"><i class="fas fa-user"></i><span>Empleado</span></a>
			</div>
		</li>
	</div>

    <div class="main-container empleado">
		
	</div>

	<script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>