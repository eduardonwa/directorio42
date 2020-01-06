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
    <title>Panel de control Área Sonora Sur #42</title>
</head>
<body>
        <div class="admin-panel-header">
        
        <div class="header-icons">                    
            <form action="includes/logout_user.php" method="POST">
                <button class="logout-btn" type="submit" name="logout-submit">
                <span> <img src="img/icons/logout-icon.svg">  </span> Desconectar </button>
            </form>
        </div>

            <h1> Bienvenido(a) a el panel de administración </h1>
                
                <div class="site-link">
                    <a href="index.php" target="_blank">Visitar el sitio</a>
                </div>

        </div>

        <?php if(isset($_SESSION['added'])) { ?>
            <div class="added-alert">
                <?= $_SESSION['added']?>
                <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
        <?php session_unset(); } ?>
        
        <div class="main-action-control">
            <div class="container-for-icons">
                <div class="bar-item">
                    <a href="admin_groups.php">
                    <svg class="container-for-svgs" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="14.9px"
                    height="18.6px" viewBox="0 0 14.9 18.6" style="enable-background:new 0 0 14.9 18.6;" xml:space="preserve">
                        <style type="text/css">
                        .grupos-st0{fill:none;stroke:white;stroke-miterlimit:10;}
                        .grupos-st1{fill:white;}
                    </style>
                    <defs>
                    </defs>
                    <polyline class="grupos-st0" points="9.3,17.8 9.3,0.8 0.5,0.8 0.5,17.8 "/>
                    <polygon class="grupos-st1" points="9.6,0.8 14.9,0 14.9,18.6 9.6,17.3 "/>
                    </svg>
                        <p class="text-icon" >Grupos</p>
                    </a>
                    
                    <button class="open-sub-menu" onclick="submenuToggle('btnOne')">+</button>
                            <div class="quick-access" id="btnOne">
                                <a href="add_group.php">Registrar</a>
                                <a href="admin_panel_groups.php">Consultar</a>
                            </div>
                </div> 

                <div class="bar-item">
                <a href="admin_distritos.php">
                        <svg class="container-for-svgs" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="17.4px"
                            height="17.3px" viewBox="0 0 17.4 17.3" style="enable-background:new 0 0 17.4 17.3;" xml:space="preserve">
                        <style type="text/css">
                            .distrito{fill:white;}
                        </style>
                        <defs>
                        </defs>
                        <g>
                            <polygon class="distrito" points="17.4,17.3 0,17.3 0,4.2 7,0 10.6,0 17.4,4.2 	"/>
                        </g>
                        </svg>
                        <p class="text-icon">Distritos</p>   
                    </a>
                    <button class="open-sub-menu" onclick="submenuToggle('btnTwo')">+</button>
                            <div class="quick-access" id="btnTwo">
                                <a href="add_distrito.php">Registrar</a>
                                <a href="admin_panel_distritos.php">Consultar</a>
                            </div>
                </div>

                <div class="bar-item">
                    <a href="registrar.php">
                    <svg class="container-for-svgs" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px"
                    height="19.3px" viewBox="0 0 20 19.3" style="enable-background:new 0 0 20 19.3;" xml:space="preserve">
                    <style type="text/css">
                    .new-user-st0{fill:#FFFFFF;}
                    .new-user-st1{fill:white;}
                    </style>
                    <defs>
                    </defs>
                    <g>
                    <path class="new-user-st0" d="M16.3,15.3c-0.2-0.4-0.6-0.8-1-1l-3.1-1.7c-0.3-0.2-0.7-0.3-1-0.3l-0.1,0c-0.5,0.2-1.1,0.4-1.7,0.4
                    c-0.6,0-1.2-0.2-1.8-0.4c-0.4,0-0.7,0.1-1,0.3l-3.2,1.8c-0.4,0.2-0.8,0.6-1,1l-2.3,4h18.6L16.3,15.3z"/>
                    <path class="new-user-st0" d="M11.1,11.5c1.5-0.7,2.5-2.1,2.5-3.8c0-2.3-1.9-4.2-4.2-4.2S5.2,5.4,5.2,7.7c0,1.7,1,3.1,2.4,3.8
                    c0.5,0.3,1.1,0.4,1.8,0.4C10,11.8,10.5,11.7,11.1,11.5z"/>
                    </g>
                    <g>
                    <g>
                    <circle class="new-user-st1" cx="17.6" cy="2.4" r="2.4"/>
                    </g>
                    </g>
                    </svg>
                    <p class="text-icon">Registrar</p>
                    </a>
                </div>
            </div> <!-- Container For Icons END -->


        <div class="index-control">
            <p>Puedes usar el siguiente recuadro para crear una nueva entrada</p>

            <form action="add_new_post.php" method="POST"> <!-- Edición de rectángulos -->    
            
            <div class="details-body">
                    <div class="titles-details">
                        <h2>Título:</h2>
                        <input class="edit-index-text-title" type="text" name="first_post_title" id="first_post_title">
                    </div>
                <textarea class="edit-index-text" name="first_post_text" id="first_post_text"></textarea>
                <input type="submit" class="terminar-btn" value="Terminar" name="submit"></input>
            </div>
                
            </form> <!-- Form END -->
            
            <div class="past-entries">
                <footer> <a href="past_entries.php">Entradas anteriores</a> </footer>
            </div>

        </div> <!-- index control layout END -->

        </div>
    </div> <!-- Main Action Control END -->
    
    <script>
        function submenuToggle(divid) {
            var submenu = document.getElementById(divid);
            if( submenu.style.display === "none") {
                submenu.style.display = "block";
            } else {
                submenu.style.display = "none";
            }
        }
    </script>

</body>
</html>