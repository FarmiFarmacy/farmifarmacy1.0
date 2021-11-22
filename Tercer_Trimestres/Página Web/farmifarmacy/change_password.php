<?php
  $page_title = 'Cambiar contraseña';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
?>
<?php $user = current_user(); ?>
<?php
  if(isset($_POST['actualizar'])){

    $req_fields = array('nueva-contraseña','vieja-contraseña','id' );
    validate_fields($req_fields);

    if(empty($errors)){

             if(sha1($_POST['vieja-contraseña']) !== current_user()['contraseña'] ){
               $session->msg('d', "Tu antigua contraseña no coincide");
               redirect('change_password.php',false);
             }

            $id = (int)$_POST['id'];
            $new = remove_junk($db->escape(sha1($_POST['nueva-contraseña'])));
            $sql = "UPDATE usuario SET password ='{$new}' WHERE id='{$db->escape($id)}'";
            $result = $db->query($sql);
                if($result && $db->affected_rows() === 1):
                  $session->logout();
                  $session->msg('s',"Inicia sesión con tu nueva contraseña.");
                  redirect('index.php', false);
                else:
                  $session->msg('d',' Lo siento, actualización falló.');
                  redirect('change_password.php', false);
                endif;
    } else {
      $session->msg("d", $errors);
      redirect('change_password.php',false);
    }
  }
?>
<?php include_once('layouts/header.php'); ?>
<div class="login-page">
    <div class="text-center">
       <h3>Cambiar contraseña</h3>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="change_password.php" class="clearfix">
        <div class="form-group">
              <label for="nuevaContraseña" class="control-label">Nueva contraseña</label>
              <input type="password" class="form-control" name="nueva-contraseña" placeholder="Nueva contraseña">
        </div>
        <div class="form-group">
              <label for="viejaContraseña" class="control-label">Antigua contraseña</label>
              <input type="password" class="form-control" name="vieja-contraseña" placeholder="Antigua contraseña">
        </div>
        <div class="form-group clearfix">
               <input type="hidden" name="id" value="<?php echo (int)$user['id'];?>">
                <button type="submit" name="update" class="btn btn-info">Cambiar</button>
        </div>
    </form>
</div>
<?php include_once('layouts/footer.php'); ?>
