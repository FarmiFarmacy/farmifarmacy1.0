<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Carro de Compras</title>
	<link rel="stylesheet" type="text/css" href="libs/css/cliente.css">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">
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
						<li><a href="farmifarmacy.php">Productos</a></li>
					</ul>
				</li>
				<li><a href="#">Sesión<i class="icon ion-md-arrow-dropdown"></i></a>
					<ul>
						<li><a href="logout.php">Cerrar Sesión</a></li>
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
			</div>
	</header>
		<div class="container">
			<div class="row">
					<h1 class="title">MI CARRO</h1>

				<div class="col-lg-10">	
					<table class="table">
						<thead class="text-center">
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nombre</th>
								<th scope="col">Precio</th>
								<th scope="col">Cantidad</th>
								<th scope="col">Total</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody class="text-center">
							<?php 
								if(isset($_SESSION['cart']))
								{
									foreach($_SESSION['cart'] as $key => $value)
									{
										$sr=$key+1;
										echo"
											<tr>
												<td>$sr</td>
												<td>$value[Item_Name]</td>
												<td>$$value[Price].000<input type='hidden' class='iprice' value='$value[Price]'></td>
												<td><input class='text-center iquantity' onchange='subTotal()' type='number' value='$value[Quantity]' min='1' max='10'></td>
												<td class='itotal'></td>
												<td>
													<form action='manage_cart.php' method='POST'>
														<button name='Remove_Item' class='btn btn-outline-danger btn-lg'>ELIMINAR</button>
														<input type='hidden' name='Item_Name' value='$value[Item_Name]'>
													</form>
												</td>
											</tr>
										";
									}
								}	
							?>
						</tbody>
					</table>
				</div>
				
				<div class="col-lg-3">
					<div class="border bg-light rounded p-4">
						<h4>Total:</h4>
						<h5 class="text-center" id="gtotal"></h5>
						<form method="POST" action="realizar_pago.php"> 
							<div class="form-check">
							<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
							<label class="form-check-label" for="flexRadioDefault2">
								Contra Entrega
							</label>
							</div>
							<br>
							<button class="btn btn-primary bnt-block btn-lg">Realizar Pago</button>
						</form>
					</div>
				</div>

			</div>
		</div> 

	<script>

		var gt=0;
		var iprice=document.getElementsByClassName('iprice');
		var iquantity=document.getElementsByClassName('iquantity');
		var itotal=document.getElementsByClassName('itotal');
		var gtotal=document.getElementById('gtotal');

		function subTotal()
		{
			gt=0;
			for(i=0;i<iprice.length;i++)
			{
				itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);

				gt=gt+(iprice[i].value)*(iquantity[i].value);
				
			}
			gtotal.innerText=gt;
		}


		subTotal();

	</script>	

	<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>