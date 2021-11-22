<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<header>
<link rel="stylesheet" type="text/css" href="libs/css/login.css">
</header>
<center>    
<img class="avatar" src="libs/images/avatar.svg">
<h2>Bienvenido</h2>
<?php echo display_msg($msg); ?>
<form method="post" action="auth_v2.php" class="clearfix">
    <div class="input-div one">
        <div class="i">
            <i class="fas fa-user"></i>
        </div>
        <div>
        <h5>Usuario</h5>
        <input type="text" class="input" name="nombre_usuario">
        </div>
    </div>
    <div class="input-div two">
        <div class="i">
            <i class="fas fa-lock"></i>
        </div>
        <div>
            <h5>Contraseña</h5>
            <input type="password" class="input" name="contraseña">
        </div>
    </div>
    <a href="#">¿Olvidaste la contraseña?</a>
    <a href="registro.php">Registrate</a>
    <input type="submit" class="btn" value="Login">
</center>
</form>
<?php include_once('layouts/footer.php'); ?>