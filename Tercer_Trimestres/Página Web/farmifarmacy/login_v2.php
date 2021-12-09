<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>

<div class="login-page">
    <div class="text-center">
       <h1>Welcome</h1>
       <p>Sign in to start your session</p>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="auth_v2.php" class="clearfix">
        <div class="form-group">
              <label for="nombre_usuario" class="control-label">Nombre Usuario</label>
              <input type="name" class="form-control" name="nombre_usuario" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="contraseña" class="control-label">Contraseña</label>
            <input type="password" name= "constraseña" class="form-control" placeholder="password">
        </div>
        <div class="form-group">
                <button type="submit" class="btn btn-info  pull-right">Login</button>
        </div>
    </form>
</div>
<?php include_once('layouts/header.php'); ?>
