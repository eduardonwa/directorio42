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
    <title>Distritos</title>
</head>
<body>

        <div class="admin-panel-header">
            <h1> Administrador de grupos </h1>
        </div>

        <div class="action-control">
           
           <div class="actions-box">
               <img class="actions-panel-icon" src="img/icons/grupos-icon.svg">
               <p><a href="add_group.php">Agregar un nuevo grupo</a></p>
           </div>
           
           <div class="actions-box">
               <img class="actions-panel-icon" src="img/icons/consult-icon.svg">
               <p><a href="admin_panel_groups.php">Consultar y editar</a></p>
           </div>

       </div>

       <a href="admin_panel.php">
            <svg class="go-back-admin" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 -5 20 25" xml:space="preserve">
            <style type="text/css">
            .arrow {fill:black}
            </style>
                <defs>
            </defs>
            <g>
                <g>
                    <polygon class="arrow" points="0,3.5 6.1,7 6.1,0 		"/>
                </g>
                <rect class="arrow" x="6" y="2.2" width="10.6" height="2.7"/>
                <polygon class="arrow" points="11,9 13.5,4.9 16.6,4.9 14.1,9 	"/>
            </g>
            </svg>
        </a>
    
</body>
</html>