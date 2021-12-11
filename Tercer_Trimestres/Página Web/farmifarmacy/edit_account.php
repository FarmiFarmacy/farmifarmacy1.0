<?php
  $page_title = 'Editar Cuenta';
  require_once('includes/load.php');
   page_require_level(3);
?>
<?php
//update user image
  if(isset($_POST['enviar'])) {
  $photo = new Media();
  $user_id = (int)$_POST['id_usuario'];
  $photo->upload($_FILES['actualizar_archivo']);
  if($photo->process_user($user_id)){
    $session->msg('s','La foto fue subida al servidor.');
    redirect('edit_account.php');
    } else{
      $session->msg('d',join($photo->errors));
      redirect('edit_account.php');
    }
  }
?>
<?php
 //update user other info
  if(isset($_POST['actualizar'])){
    $req_fields = array('nombre','nombre_usuario' );
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$_SESSION['id_usuario'];
           $name = remove_junk($db->escape($_POST['nombre']));
       $username = remove_junk($db->escape($_POST['nombre:usuario']));
            $sql = "UPDATE usuario SET name ='{$name}', nombre_usuario ='{$username}' WHERE id='{$id}'";
    $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Cuenta actualizada. ");
            redirect('edit_account.php', false);
          } else {
            $session->msg('d',' Lo siento, actualización falló.');
            redirect('edit_account.php', false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_account.php',false);
    }
  }
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
  <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-heading clearfix">
            <span class="glyphicon glyphicon-camera"></span>
            <span>Cambiar mi foto</span>
          </div>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-4">
                <img class="img-circle img-size-2" src="uploads/users/<?php echo $user['imagen'];?>" alt="">
            </div>
            <div class="col-md-8">
              <form class="form" action="edit_account.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <input type="file" name="actualizar_archivo" multiple="multiple" class="btn btn-default btn-file"/>
              </div>
              <div class="form-group">
                <input type="hidden" name="id_usuario" value="<?php echo $user['id'];?>">
                 <button type="submit" name="submit" class="btn btn-warning">Cambiar</button>
              </div>
             </form>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <span class="glyphicon glyphicon-edit"></span>
        <span>Editar mi cuenta</span>
      </div>
      <div class="panel-body">
          <form method="post" action="edit_account.php?id=<?php echo (int)$user['id'];?>" class="clearfix">
            <div class="form-group">
                  <label for="nombre" class="control-label">Nombres</label>
                  <input type="name" class="form-control" name="nombre" value="<?php echo remove_junk(ucwords($user['nombre'])); ?>">
            </div>
            <div class="form-group">
                  <label for="nombre_usuario" class="control-label">Usuario</label>
                  <input type="text" class="form-control" name="nombre_usuario" value="<?php echo remove_junk(ucwords($user['nombre_usuario'])); ?>">
            </div>
            <div class="form-group clearfix">
                    <a href="change_password.php" title="change password" class="btn btn-danger pull-right">Cambiar contraseña</a>
                    <button type="submit" name="actualizar" class="btn btn-info">Actualizar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php include_once('layouts/footer.php'); ?>
