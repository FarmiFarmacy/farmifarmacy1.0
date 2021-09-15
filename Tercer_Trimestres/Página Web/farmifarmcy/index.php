<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="login-container">
            <form action="validar_login.php" method="POST">
                <img class="avatar" src="img/avatar.svg">
                <h2>Bienvenido</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Usuario</h5>
                        <input type="text" class="input" name="nombres">
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5>Contraseña</h5>
                        <input type="password" class="input" name="contrasena">
                    </div>
                </div>
                <a href="#">¿Olvidaste la contraseña?</a>
                <a href="registro.php">Registrate</a>
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>