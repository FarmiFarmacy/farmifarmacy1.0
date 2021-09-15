<?php 

    session_start();

    include 'conexion_be.php';
    
    $documento = $_POST['documento'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena);
    
    $validar_login = mysqli_query($conexion, "SELECT * FROM empleados WHERE documento='$documento' and contrasena='$contrasena'");

    if(mysqli_num_rows($validar_login) > 0) {
        $_SESSION['empleado'] = $documento;
        header("location: empleados2.php");
        exit;
    }else {
        echo '
            <script>
                alert("Usuario no válido, por favor verifica los datos");
                window.location = "empleados.php";
            </script>
        ';
        exit;
    }

?>