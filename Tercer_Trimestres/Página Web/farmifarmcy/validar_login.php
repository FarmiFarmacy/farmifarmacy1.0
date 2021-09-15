<?php
    $nombres=$_POST['nombres'];
    $contrasena=$_POST['contrasena'];
    session_start();
    $_SESSION['usuario']=$nombres;

    $conexion=mysqli_connect("localhost","root","","farmifarmcy");

    $consulta="SELECT*FROM usuario where nombres='$nombres' and contrasena='$contrasena'";
    $resultado=mysqli_query($conexion,$consulta);

    $filas=mysqli_fetch_array($resultado);

    if($filas['rol']==1){ //administrador
        header("location:administrador.php");
    }else
    if($filas['rol']==0){ //cliente
    header("location:cliente.php");
    }else
    if($filas['rol']==2){//Empleado
    header("location:empleado.php");
    }
    
    else{
        ?>
        <?php
        include("index.html");
        ?>
        <h1 class="bad">ERROR EN LA AUTENTICACIÓN</h1>
        <?php
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);