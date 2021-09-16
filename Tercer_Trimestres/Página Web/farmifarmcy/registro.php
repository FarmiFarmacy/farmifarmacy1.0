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
            <form action="validar_registro.php" method="POST">
                <h2>Registro</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Nombres</h5>
                        <input type="text" class="input" name="nombres" required="">
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Apellidos</h5>
                        <input type="text" class="input" name="apellidos" required="">
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div>
                        <h5>Tipo de documento</h5>
                        <select type="text" class="input" name="tipo_doc" required="">
                            <option value="CC">Cédula de Ciudadania</option>
                            <option value="TI">Tarjeta de Identidad</option>
                            <option value="CE">Cédula de Extranjeria</option>
                            <option value="NIT">Número de Identificación Tributaria</option>
                        </select>    
                    </div>
                </div>
                <div class="input-div tree">
                    <div class="i">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div>
                        <h5>Documento</h5>
                        <input type="text" class="input" name="documento" required="">
                    </div>
                </div>
                <div class="input-div four">
                    <div class="i">
                        <i class="fas fa-address-book"></i>
                    </div>
                    <div>
                        <h5>Rol</h5>
                        <select type="text" class="input" name="rol" required="">
                            <option value="0">Cliente</option>
                        </select>
                    </div>
                </div>
                <div class="input-div four">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5>Contraseña</h5>
                        <input type="password" class="input" name="contrasena" required="">
                    </div>
                </div>
                <input type="submit" class="btn" value="Registrarme">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>