<?php
	session_start();

	if(!isset($_SESSION['usuario'])){
		echo '
		<script>
			alert("Por favor debes iniciar sesión");
			window.location = "index.php";
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
	<title>FarmiFarmacy</title>
	<link rel="stylesheet" type="text/css" href="css/cliente.css">	
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap" rel="stylesheet">
	<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">	
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
	<header>
		<a href="home.php" class="logo">
			<span>Farmi</span>Farmacy</a>
			<p class="eslogan">Cuidándote las <span>24</span> horas del día</p>
			<nav class="navbar">
				<li><a href="#">Categorias<i class="icon ion-md-arrow-dropdown"></i></a>
					<ul>
						<li><a href="sobre_nosotros.php">Sobre Nosotros</a></li>
						<li><a href="cliente.php">Productos</a></li>
					</ul>
				</li>
				<li><a href="#">Sesión<i class="icon ion-md-arrow-dropdown"></i></a>
					<ul>
						<li><a href="ver_sesion.php">Ver Sesión</a></li>
						<li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
					</ul>
				</li>
				<li>
					<?php
						$count=0;
						if(isset($_SESSION['cart']))
						{
							$count=count($_SESSION['cart']);
						}
					?>
					<a href="carro.php">Carro (<?php echo $count; ?>)</a>
				</li>
			</nav>
			<div class="buscar">
				<input type="text" placeholder="Buscar" required>
			</div>
	</header>
	<h1 class="title">Productos</h1>
	<div class="container mt-5">
		<form action="manage_cart.php" method="POST">
		<div class="card">
			<img src="imagenes/aceite de bacalao.jpg" class="card-img-top">
			<div class="card-body text-center">
				<h4 class="card-title">Aceite de Bacalao</h4>
				<p class="card-text">$ <span>76.000</span></p>
				<button type="submit" name="Add_To_Cart" class="btn btn-info btn-lg">Agregar al Carro</button>
				<input type="hidden" name="Item_Name" value="Aceite de Bacalao">
				<input type="hidden" name="Price" value="76">
			</div>
		</div>
		</form>
		<form action="manage_cart.php" method="POST">
		<div class="card">
			<img src="imagenes/acetaminofén en gotas.jpg" class="card-img-top">
			<div class="card-body text-center">
				<h4>Acetaminofén en gotas</h4>
				<p>$ <span>7.000</span></p>
				<button type="submit" name="Add_To_Cart" class="btn btn-info btn-lg">Agregar al Carro</button>
				<input type="hidden" name="Item_Name" value="Acetaminofén en Gotas">
				<input type="hidden" name="Price" value="7">
			</div>
		</div>
		</form>
		<form action="manage_cart.php" method="POST">
		<div class="card">
			<img src="imagenes/acetato de aluminio caja.jpg" class="card-img-top">
			<div class="card-body text-center">
				<h4>Acetato de aluminio en caja</h4>
				<p>$ <span>23.000</span></p>
				<button type="submit" name="Add_To_Cart" class="btn btn-info btn-lg">Agregar al Carro</button>
				<input type="hidden" name="Item_Name" value="Acetato de Aluminio en Caja">
				<input type="hidden" name="Price" value="23">
			</div>
		</div>
		</form>
		<form action="manage_cart.php" method="POST">
		<div class="card">
			<img src="imagenes/acetilcisteína en polvo.jpg" class="card-img-top">
			<div class="card-body text-center">
				<h4>Acetilcisteína en polvo</h4>
				<p>$ <span>30.000</span></p>
				<button type="submit" name="Add_To_Cart" class="btn btn-info btn-lg">Agregar al Carro</button>
				<input type="hidden" name="Item_Name" value="Acetilcisteína en Polvo">
				<input type="hidden" name="Price" value="30">
			</div>
		</div>
		</form>
		<form action="manage_cart.php" method="POST">
		<div class="card">
			<img src="imagenes/caja de acetaminofén.jpg" class="card-img-top">
			<div class="card-body text-center">
				<h4>Caja de acetaminofén</h4>
				<p>$ <span>8.000</span></p>
				<button type="submit" name="Add_To_Cart" class="btn btn-info btn-lg">Agregar al Carro</button>
				<input type="hidden" name="Item_Name" value="Caja de Acetaminofén">
				<input type="hidden" name="Price" value="8">
			</div>
		</div>
		</form>
		<form action="manage_cart.php" method="POST">
		<div class="card">
			<img src="imagenes/jarabe abrilar.jpg" class="card-img-top">
			<div class="card-body text-center">
				<h4>Jarabe Abrilar</h4>
				<p>$ <span>43.000</span></p>
				<button type="submit" name="Add_To_Cart" class="btn btn-info btn-lg">Agregar al Carro</button>
				<input type="hidden" name="Item_Name" value="Jarabe Abrilar">
				<input type="hidden" name="Price" value="43">
			</div>
		</div>
		</form>
		<form action="manage_cart.php" method="POST">
		<div class="card">
			<img src="imagenes/jarabe acetaminofén.jpg" class="card-img-top">
			<div class="card-body text-center">
				<h4>Jarabe Acetaminofén</h4>
				<p>$ <span>6.000</span></p>
				<button type="submit" name="Add_To_Cart" class="btn btn-info btn-lg">Agregar al Carro</button>
				<input type="hidden" name="Item_Name" value="Jarabe Acetaminofén">
				<input type="hidden" name="Price" value="6">
			</div>
		</div>
		</form>
	</div>
  	<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
	<script src="js/main.js"></script>
		<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>