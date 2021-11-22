<?php
  ob_start();
  require_once('includes/load.php');
?>
<?php include_once('layouts/header.php'); ?>
<center>
<h2>Registro</h2>
<?php echo display_msg($msg); ?>
<form action="validar_registro.php" method="POST">
<div class="input-div one">
    <div class="i">
        <i class="fas fa-user"></i>
    </div>
    <div>
        <h5>Nombre</h5>
        <input type="text" class="input" name="nombre" required="">
    </div>
</div>
<div class="input-div one">
    <div class="i">
        <i class="fas fa-user"></i>
    </div>
    <div>
        <h5>Nombre Usuario</h5>
        <input type="text" class="input" name="nombre_usuario" required="">
    </div>
</div>
<div class="input-div two">
    <div class="i">
        <i class="far fa-address-card"></i>
    </div>
    <div>
        <h5>Contraseña</h5>
        <input type="password" class="input" name="contraseña" required="">   
    </div>
</div>
<input type="submit" class="btn" value="Registrarme">
</form>
</center>
<?php include_once('layouts/footer.php'); ?>