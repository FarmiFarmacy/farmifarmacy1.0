<?php
  $page_title = 'Editar Usuario';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $e_user = find_by_id('usuario',(int)$_GET['id']);
  $groups  = find_all('grupo_usuario');
  if(!$e_user){
    $session->msg("d","Missing user id.");
    redirect('users.php');
  }
?>

<?php
//Update User basic info
  if(isset($_POST['actualizar'])) {
    $req_fields = array('nombre','nombre_usuario','nivel');
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$e_user['id'];
           $name = remove_junk($db->escape($_POST['nombre']));
       $username = remove_junk($db->escape($_POST['nombre_usuario']));
          $level = (int)$db->escape($_POST['nivel']);
       $status   = remove_junk($db->escape($_POST['estado']));
            $sql = "UPDATE usuario SET nombre ='{$name}', nombre_usuario ='{$username}',nivel_usuario='{$level}',estado='{$status}' WHERE id='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Acount Updated ");
            redirect('edit_user.php?id='.(int)$e_user['id'], false);
          } else {
            $session->msg('d',' Lo siento no se actualizó los datos.');
            redirect('edit_user.php?id='.(int)$e_user['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_user.php?id='.(int)$e_user['id'],false);
    }
  }
?>
<?php
// Update user password
if(isset($_POST['actualizar-contraseña'])) {
  $req_fields = array('contraseña');
  validate_fields($req_fields);
  if(empty($errors)){
           $id = (int)$e_user['id'];
     $password = remove_junk($db->escape($_POST['contraseña']));
     $h_pass   = sha1($password);
          $sql = "UPDATE usuario SET password='{$h_pass}' WHERE id='{$db->escape($id)}'";
       $result = $db->query($sql);
        if($result && $db->affected_rows() === 1){
          $session->msg('s',"Se ha actualizado la contraseña del usuario. ");
          redirect('edit_user.php?id='.(int)$e_user['id'], false);
        } else {
          $session->msg('d','No se pudo actualizar la contraseña de usuario..');
          redirect('edit_user.php?id='.(int)$e_user['id'], false);
        }
  } else {
    $session->msg("d", $errors);
    redirect('edit_user.php?id='.(int)$e_user['id'],false);
  }
}

?>
<?php include_once('layouts/header.php'); ?>
 <div class="row">
   <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-6">
     <div class="panel panel-default">
       <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          Actualiza cuenta <?php echo remove_junk(ucwords($e_user['nombre'])); ?>
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="edit_user.php?id=<?php echo (int)$e_user['id'];?>" class="clearfix">
            <div class="form-group">
                  <label for="nombre" class="control-label">Nombres</label>
                  <input type="name" class="form-control" name="nombre" value="<?php echo remove_junk(ucwords($e_user['nombre'])); ?>">
            </div>
            <div class="form-group">
                  <label for="nombre_usuario" class="control-label">Usuario</label>
                  <input type="text" class="form-control" name="nombre_usuario" value="<?php echo remove_junk(ucwords($e_user['nombre_usuario'])); ?>">
            </div>
            <div class="form-group">
              <label for="nivel">Rol de usuario</label>
                <select class="form-control" name="nivel">
                  <?php foreach ($groups as $group ):?>
                   <option <?php if($group['nivel_grupo'] === $e_user['nivel_usuario']) echo 'selected="selected"';?> value="<?php echo $group['nivel_grupo'];?>"><?php echo ucwords($group['nombre_grupo']);?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
              <label for="estado">Estado</label>
                <select class="form-control" name="estado">
                  <option <?php if($e_user['estado'] === '1') echo 'selected="selected"';?>value="1">Activo</option>
                  <option <?php if($e_user['estado'] === '0') echo 'selected="selected"';?> value="0">Inactivo</option>
                </select>
            </div>
            <div class="form-group clearfix">
                    <button type="submit" name="actualizar" class="btn btn-info">Actualizar</button>
            </div>
        </form>
       </div>
     </div>
  </div>
  <!-- Change password form -->
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          Cambiar <?php echo remove_junk(ucwords($e_user['nombre'])); ?> contraseña
        </strong>
      </div>
      <div class="panel-body">
        <form action="edit_user.php?id=<?php echo (int)$e_user['id'];?>" method="post" class="clearfix">
          <div class="form-group">
                <label for="contraseña" class="control-label">Contraseña</label>
                <input type="password" class="form-control" name="contraseña" placeholder="Ingresa la nueva contraseña" required>
          </div>
          <div class="form-group clearfix">
                  <button type="submit" name="actualizar-contraseña" class="btn btn-danger pull-right">Cambiar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

 </div>
<?php include_once('layouts/footer.php'); ?>
