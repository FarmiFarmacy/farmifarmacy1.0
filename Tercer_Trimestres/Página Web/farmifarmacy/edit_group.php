<?php
  $page_title = 'Editar Grupo';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $e_group = find_by_id('grupo_usuario',(int)$_GET['id']);
  if(!$e_group){
    $session->msg("d","Missing Group id.");
    redirect('group.php');
  }
?>
<?php
  if(isset($_POST['actualizar'])){

   $req_fields = array('nombre-grupo','nivel-grupo');
   validate_fields($req_fields);
   if(empty($errors)){
           $name = remove_junk($db->escape($_POST['nombre-grupo']));
          $level = remove_junk($db->escape($_POST['nivel-grupo']));
         $status = remove_junk($db->escape($_POST['estado']));

        $query  = "UPDATE grupo_usuario SET ";
        $query .= "nombre_grupo='{$name}',nivel_grupo='{$level}',estado_grupo='{$status}'";
        $query .= "WHERE ID='{$db->escape($e_group['id'])}'";
        $result = $db->query($query);
         if($result && $db->affected_rows() === 1){
          //sucess
          $session->msg('s',"Grupo se ha actualizado! ");
          redirect('edit_group.php?id='.(int)$e_group['id'], false);
        } else {
          //failed
          $session->msg('d','Lamentablemente no se ha actualizado el grupo!');
          redirect('edit_group.php?id='.(int)$e_group['id'], false);
        }
   } else {
     $session->msg("d", $errors);
    redirect('edit_group.php?id='.(int)$e_group['id'], false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
<div class="login-page">
    <div class="text-center">
       <h3>Editar Grupo</h3>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="edit_group.php?id=<?php echo (int)$e_group['id'];?>" class="clearfix">
        <div class="form-group">
              <label for="nombre" class="control-label">Nombre del grupo</label>
              <input type="name" class="form-control" name="nombre-grupo" value="<?php echo remove_junk(ucwords($e_group['nombre_grupo'])); ?>">
        </div>
        <div class="form-group">
              <label for="nivel" class="control-label">Nivel del grupo</label>
              <input type="number" class="form-control" name="nivel-grupo" value="<?php echo (int)$e_group['nivel_grupo']; ?>">
        </div>
        <div class="form-group">
          <label for="estado">Estado</label>
              <select class="form-control" name="estado">
                <option <?php if($e_group['estado_grupo'] === '1') echo 'selected="selected"';?> value="1"> Activo </option>
                <option <?php if($e_group['estado_grupo'] === '0') echo 'selected="selected"';?> value="0">Inactivo</option>
                <option <?php if($e_group['estado_grupo'] === '0') echo 'selected="selected"';?> value="0">Inactivo</option>
              </select>
        </div>
        <div class="form-group clearfix">
                <button type="submit" name="actualizar" class="btn btn-info">Actualizar</button>
        </div>
    </form>
</div>

<?php include_once('layouts/footer.php'); ?>
