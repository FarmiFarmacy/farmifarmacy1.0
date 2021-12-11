<?php
  $page_title = 'Edit sale';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
$sale = find_by_id('venta',(int)$_GET['id']);
if(!$sale){
  $session->msg("d","Missing product id.");
  redirect('sales.php');
}
?>
<?php $product = find_by_id('producto',$sale['id_producto']); ?>
<?php

  if(isset($_POST['actualizar_venta'])){
    $req_fields = array('titulo','cantidad','precio','total', 'fecha' );
    validate_fields($req_fields);
        if(empty($errors)){
          $p_id      = $db->escape((int)$product['id']);
          $s_qty     = $db->escape((int)$_POST['cantidad']);
          $s_total   = $db->escape($_POST['total']);
          $date      = $db->escape($_POST['fecha']);
          $s_date    = date("Y-m-d", strtotime($date));

          $sql  = "UPDATE venta SET";
          $sql .= " id_ptoducto= '{$p_id}',cantidad={$s_qty},precio='{$s_total}',fecha='{$s_date}'";
          $sql .= " WHERE id ='{$sale['id']}'";
          $result = $db->query($sql);
          if( $result && $db->affected_rows() === 1){
                    update_product_qty($s_qty,$p_id);
                    $session->msg('s',"Sale updated.");
                    redirect('edit_sale.php?id='.$sale['id'], false);
                  } else {
                    $session->msg('d',' Sorry failed to updated!');
                    redirect('sales.php', false);
                  }
        } else {
           $session->msg("d", $errors);
           redirect('edit_sale.php?id='.(int)$sale['id'],false);
        }
  }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>
<div class="row">

  <div class="col-md-12">
  <div class="panel">
    <div class="panel-heading clearfix">
      <strong>
        <span class="glyphicon glyphicon-th"></span>
        <span>All Sales</span>
     </strong>
     <div class="pull-right">
       <a href="sales.php" class="btn btn-primary">Show all sales</a>
     </div>
    </div>
    <div class="panel-body">
       <table class="table table-bordered">
         <thead>
          <th> Product title </th>
          <th> Qty </th>
          <th> Price </th>
          <th> Total </th>
          <th> Date</th>
          <th> Action</th>
         </thead>
           <tbody  id="product_info">
              <tr>
              <form method="post" action="edit_sale.php?id=<?php echo (int)$sale['id']; ?>">
                <td id="s_nombre">
                  <input type="text" class="form-control" id="sug_input" name="titulo" value="<?php echo remove_junk($product['nombre']); ?>">
                  <div id="result" class="list-group"></div>
                </td>
                <td id="s_cantidad">
                  <input type="text" class="form-control" name="cantidad" value="<?php echo (int)$sale['cantidad']; ?>">
                </td>
                <td id="s_precio">
                  <input type="text" class="form-control" name="precio" value="<?php echo remove_junk($product['precio_venta']); ?>" >
                </td>
                <td>
                  <input type="text" class="form-control" name="total" value="<?php echo remove_junk($sale['precio']); ?>">
                </td>
                <td id="s_fecha">
                  <input type="date" class="form-control datepicker" name="fecha" data-date-format="" value="<?php echo remove_junk($sale['fecha']); ?>">
                </td>
                <td>
                  <button type="submit" name="actualizar_venta" class="btn btn-primary">Update sale</button>
                </td>
              </form>
              </tr>
           </tbody>
       </table>

    </div>
  </div>
  </div>

</div>

<?php include_once('layouts/footer.php'); ?>
