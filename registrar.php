<?php
    include 'includes/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Registrar</title>
</head>
<body class="sign-up-panel-container">
    
    <div class="sign-up-panel">
        <p class="signup-header">Registrar usuario</p>
        <?php
            if(isset($_GET['error'])) {
                switch ($_GET['error']) {
                    case 'campovacio':
                        echo '<p class="singup-error">Llenar todos los campos</p>';
                    break;
                    case 'correousuarioinvalido':
                        echo '<p class="singup-error">El correo y el nombre de usuario son inválidos</p>';
                    break;
                    case 'correoinvalido':
                        echo '<p class="singup-error">Correo inválido</p>';
                    break;
                    case 'usuarioinvalido':
                        echo '<p class="singup-error">Usuario inválido</p>';
                    break;
                    case 'palabraclave':
                        echo '<p class="singup-error">Las contraseñas no coinciden</p>';
                    break;
                    case 'usuarioexiste':
                        echo '<p class="singup-error">Este nombre de usuario ya existe</p>';
                    break;
                }   
            }
            if(isset($_GET['registro']) && $_GET['registro'] == "exito") {
                echo '<p class="signup-success">Nuevo usuario registrado</p>';
            }
        ?>
        <form class="sign-up-form" action="includes/signup_user.php" method="POST">

                <label class="sign-up-panel-label">Nombre de usuario</label>
                    <input class="sign-up-panel-input" type="text" name="username">
                <label class="sign-up-panel-label">E-mail</label>
                    <input class="sign-up-panel-input" type="text" name="email">
                <label class="sign-up-panel-label">Contraseña</label>
                    <input class="sign-up-panel-input" type="password" name="password">
                <label class="sign-up-panel-label">Repetir contraseña</label>
                    <input class="sign-up-panel-input" type="password" name="password-repeat">
                <button class="sign-up-btn" type="submit" name="signup-submit">Registrar</button>
            
            </form>

        <a href="admin_panel.php">Regresar</a>
    </div>

</body>
</html>