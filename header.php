        <div class="access-header">
            <?php
            if(isset($_SESSION['user_id'])) {
                echo '<a href="admin_panel.php">Panel de Control</a>
                        <form action="includes/logout_user.php" method="POST">
                            <button class="logout-btn" type="submit" name="logout-submit">
                        <div class="logout-btn"> <img src="img/icons/logout-icon.svg"> Desconectar </div>
                        </form>';
            } else {
                echo '<form class="login-access" action="includes/login_user.php" method="POST">
                        <input class="login-header-input" type="text" name="mailuid" placeholder="Correo/Usuario">
                        <input class="login-header-input" type="password" name="password" placeholder="Contraseña">
                            <button class="login-btn" type="submit" name="login-submit">Ingresar</button>
                    </form>';
            }
            ?>
    </div>