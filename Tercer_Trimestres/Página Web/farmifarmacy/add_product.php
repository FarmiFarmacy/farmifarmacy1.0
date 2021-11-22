<?php
  $page_title = 'Agregar producto';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $all_categories = find_all('categoria');
  $all_photo = find_all('media');
?>
<?php
 if(isset($_POST['add_product'])){
   $req_fields = array('titulo-producto','categoria-producto','cantidad-producto','precio-compra', 'precio-venta' );
   validate_fields($req_fields);
   if(empty($errors)){
     $p_name  = remove_junk($db->escape($_POST['titulo-producto']));
     $p_cat   = remove_junk($db->escape($_POST['categoria-producto']));
     $p_qty   = remove_junk($db->escape($_POST['cantidad-producto']));
     $p_buy   = remove_junk($db->escape($_POST['precio-compra']));
     $p_sale  = remove_junk($db->escape($_POST['precio-venta']));
     if (is_null($_POST['foto-producto']) || $_POST['foto-producto'] === "") {
       $media_id = '0';
     } else {
       $media_id = remove_junk($db->escape($_POST['foto-producto']));
     }
     $date    = make_date();
     $query  = "INSERT INTO producto (";
     $query .=" nombre,cantidad,precio_compra,precio_venta,id_categoria,id_media,fecha";
     $query .=") VALUES (";
     $query .=" '{$p_name}', '{$p_qty}', '{$p_buy}', '{$p_sale}', '{$p_cat}', '{$media_id}', '{$date}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
     if($db->query($query)){
       $session->msg('s',"Producto agregado exitosamente. ");
       redirect('add_product.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('product.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_product.php',false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
  <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar producto</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_product.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="titulo-producto" placeholder="Descripción">
               </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="categoria-producto">
                      <option value="">Selecciona una categoría</option>
                    <?php  foreach ($all_categories as $cat): ?>
                      <option value="<?php echo (int)$cat['id'] ?>">
                        <?php echo $cat['nombre'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" name="foto-producto">
                      <option value="">Selecciona una imagen</option>
                    <?php  foreach ($all_photo as $photo): ?>
                      <option value="<?php echo (int)$photo['id'] ?>">
                        <?php echo $photo['nombre_archivo'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                      <i class="glyphicon glyphicon-shopping-cart"></i>
                     </span>
                     <input type="number" class="form-control" name="cantidad-producto" placeholder="Cantidad">
                  </div>
                 </div>
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                       <i class="glyphicon glyphicon-usd"></i>
                     </span>
                     <input type="number" class="form-control" name="precio-compra" placeholder="Precio de compra">
                     <span class="input-group-addon">.00</span>
                  </div>
                 </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-usd"></i>
                      </span>
                      <input type="number" class="form-control" name="precio-venta" placeholder="Precio de venta">
                      <span class="input-group-addon">.00</span>
                   </div>
                  </div>
               </div>
              </div>
              <button type="submit" name="add_product" class="btn btn-danger">Agregar producto</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
