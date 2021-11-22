<?php include_once('includes/load.php'); ?>
<?php
$req_fields = array('nombre_usuario','contraseña' );
validate_fields($req_fields);
$username = remove_junk($_POST['nombre_usuario']);
$password = remove_junk($_POST['contraseña']);

  if(empty($errors)){

    $user = authenticate_v2($username, $password);

        if($user):
           //create session with id
           $session->login($user['id']);
           //Update Sign in time
           updateLastLogIn($user['id']);
           // redirect user to group home page by user level
           if($user['nivel_usuario'] === '1'):
             $session->msg("s", "Hello ".$user['nombre_usuario'].", Welcome to OSWA-INV.");
             redirect('admin.php',false);
           elseif ($user['nivel_usuario'] === '2'):
              $session->msg("s", "Hello ".$user['nombre_usuario'].", Welcome to OSWA-INV.");
             redirect('special.php',false);
           else:
              $session->msg("s", "Hello ".$user['nombre_usuario'].", Welcome to OSWA-INV.");
             redirect('farmifarmacy.php',false);
           endif;

        else:
          $session->msg("d", "Sorry Username/Password incorrect.");
          redirect('index.php',false);
        endif;

  } else {

     $session->msg("d", $errors);
     redirect('login_v2.php',false);
  }

?>
