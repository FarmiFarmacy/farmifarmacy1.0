<?php include_once('includes/load.php'); ?>
<?php
$req_fields = array('nombre_usuario','contraseña' );
validate_fields($req_fields);
$nombre_usuario = remove_junk($_POST['nombre_usuario']);
$contraseña = remove_junk($_POST['contraseña']);

if(empty($errors)){
  $id_usuario = authenticate($nombre_usuario, $contraseña);
  if($id_usuario){
    //create session with id
     $session->login($id_usuario);
    //Update Sign in time
     updateLastLogIn($id_usuario);
     $session->msg("s", "Bienvenido a FARMIFARMACY.");
     redirect('home.php',false);

  } else {
    $session->msg("d", "Nombre de usuario y/o contraseña incorrecto.");
    redirect('index.php',false);
  }

} else {
   $session->msg("d", $errors);
   redirect('index.php',false);
}

?>
