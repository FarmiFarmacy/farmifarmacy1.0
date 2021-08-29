<?php 

    session_start();

    include 'conexion_be.php';
    
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena);
    
    $validar_login = mysqli_query($conexion, "SELECT * FROM administrador WHERE correo='$correo' and contrasena='$contrasena'");

    if(mysqli_num_rows($validar_login) > 0) {
        $_SESSION['usuario'] = $correo;
        header("location: administrador2.php");
        exit;
    }else {
        echo '
            <script>
                alert("Usuario no válido, por favor verifica los datos");
                window.location = "administrador.php";
            </script>
        ';
        exit;
    }

?>