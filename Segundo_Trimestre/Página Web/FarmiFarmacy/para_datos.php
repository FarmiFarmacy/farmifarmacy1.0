<?php
	session_start();

    include_once 'conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT * FROM clientes";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $clientes=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="main-container">
    <div class="row">
        <div class="col-lg-12">
            <table id="tablaDatos" class="table-striped table-bordered" style="width:100%">
                <thead class="text-center">
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Tipo de Documento</th>
                    <th>Documento</th>
                    <th>Dirección</th>
                    <th>Número de Telefono</th>
                    <th>Fecha de Nacimiento</th>
                </thead>
                <tbody>
                    <?php 
                        foreach($clientes as $cliente){
                    ?>
                        <tr>
                            <td><?php echo $cliente['nombres']?></td>
                            <td><?php echo $cliente['apellidos']?></td>
                            <td><?php echo $cliente['correo']?></td>
                            <td><?php echo $cliente['tipo_doc']?></td>
                            <td><?php echo $cliente['documento']?></td>
                            <td><?php echo $cliente['direccion']?></td>
                            <td><?php echo $cliente['numero']?></td>
                            <td><?php echo $cliente['fecha']?></td>
                        </tr>
                    <?php 
                        }
                    ?>
                </tbody>
            </table>      
        </div> 
    </div>
</div>