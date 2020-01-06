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
    <title>Consultar lista distrital</title>
</head>
<body>

<button onclick="topFunction()" id="topBtn" title="Ir arriba">Arriba</button>
        
    <div class="admin-panel-header">

    <div class="header-icons">
            <a href="admin_panel_groups.php">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="15.4px"
                    height="19.8px" viewBox="0 0 15.4 19.8" style="enable-background:new 0 0 15.4 19.8;" xml:space="preserve">
                    <style type="text/css">
                    .grupos-st0{fill:none;stroke:white;stroke-miterlimit:10;}
                    .grupos-st1{fill:white;}
                 </style>
                <defs>
                </defs>
                <polyline class="grupos-st0" points="9.3,18.4 9.3,1.4 0.5,1.4 0.5,18.4 "/>
                <polygon class="grupos-st1" points="9.6,1.4 14.9,0.6 14.9,19.2 9.6,17.9 "/>
                </svg>
                <span style="color:white;position:relative;bottom:5px;"> Grupos </span>
            </a>
            
            <a href="past_entries.php">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20.1px"
                    height="17.3px" viewBox="0 0 20.1 17.3" style="enable-background:new 0 0 20.1 17.3;" xml:space="preserve">
                <style type="text/css">
                    .blog-st0{fill:none;stroke:white;stroke-miterlimit:10;}
                    .blog-st1{fill:white;stroke:white;stroke-linecap:round;stroke-miterlimit:10;}
                </style>
                <defs>
                </defs>
                <path class="blog-st0" d="M18.6,16.8H1.4c-0.5,0-0.9-0.4-0.9-0.9v-0.9c0-0.5,0.4-0.9,0.9-0.9h17.2c0.5,0,0.9,0.4,0.9,0.9v0.9
                    C19.6,16.4,19.2,16.8,18.6,16.8z"/>
                <path class="blog-st0" d="M15.8,0.5H4.3c-0.5,0-1,0.4-1,1V13c0,0.5,0.4,1,1,1h11.5c0.5,0,1-0.4,1-1V1.5C16.8,0.9,16.3,0.5,15.8,0.5z"/>
                <line class="blog-st1" x1="6.5" y1="3.8" x2="13.6" y2="3.8"/>
                <line class="blog-st1" x1="6.4" y1="7.2" x2="13.6" y2="7.2"/>
                <line class="blog-st1" x1="6.4" y1="10.6" x2="13.6" y2="10.6"/>
                </svg>
                <span style="color:white;position:relative;bottom:5px;"> Entradas de blog </span>
            </a>
        </div> <!-- Header icon END -->
                    
            <a href="admin_panel.php">
                <svg class="go-back-admin" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 -5 20 25" xml:space="preserve">
                <style type="text/css">
                .arrow{fill:white;}
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
            </a> <!-- Go back admin END -->
        <h1> Distritos - Consulta y edición </h1>
        <a href="add_distrito.php" class="new-record-shortcut">Agregar una nueva sede de distrito</a>
     </div>

        <div class="admin-searches-district">
            <div class="admin-header-columns-districts">
                <p class="admin-columns">Distrito</p>
                <p class="admin-columns">Horario</p>
                <p class="admin-columns">Dirección</p>
                <p class="admin-columns">Reuniones</p>
                <p class="admin-columns">Región</p>
                <p class="admin-columns">Acciones</p>
            </div>
        </div>

        <?php if(isset($_SESSION['added'])) { ?>
            <div class="added-alert">
                <?= $_SESSION['added']?>
                <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
        <?php session_unset(); } ?>

        <?php if(isset($_SESSION['deleted'])) { ?>
            <div class="deleted-alert">
                <?= $_SESSION['deleted']?>
                <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
        <?php session_unset(); } ?>

        <?php if(isset($_SESSION['edited'])) { ?>
            <div class="edited-alert">
                <?= $_SESSION['edited']?>
                <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
        <?php session_unset(); } ?>


        <?php
        $admin_query_distritos = "SELECT id, district_title, schedule, district_address, gatherings, region FROM distritos_aa_sonora_sur";
        $result_admin_query = mysqli_query($conn, $admin_query_distritos);
        ?>

<?php while($row = mysqli_fetch_assoc($result_admin_query)) { ?>
                            <div class="all-distritos-container" data-meetings="<?php echo "{$row['schedule']}"?> <?php echo "{$row['district_address']}"?> <?php echo "{$row['gatherings']}"?> <?php echo "{$row['region']}"?>">
                                <div class="admin-data-row-container">
                                    <li class="distrito-number-info"><?php echo "{$row['district_title']}"?></li>
                                    <li class="distrito-hour-info"><?php echo "{$row['schedule']}" ;?></li>
                                    <li class="distrito-info"><?php echo "{$row['district_address']}" ;?></li>
                                    <li class="distrito-info"><?php echo "{$row['gatherings']}" ;?></li>
                                    <li class="distrito-info"><?php echo "{$row['region']}" ;?></li>
                                    <li class="actions">
                                        <div class="table-actions-container"> <a href="edit_distrito.php?id=<?php echo "{$row['id']}" ?>"> <img class="table-action-icon" src="img/icons/edit-icon.svg"> </a> </div>
                                        <div class="table-actions-container"> <a href="delete_district_record.php?id=<?php echo "{$row['id']}" ?>" onclick="return confirm('Este registro se borrará, porfavor confirma')"> <img class="table-action-icon" src="img/icons/delete-distrito.svg"> </a> </div>
                                    </li>
                                    
                                </div>
                            </div>

                        <?php } ?>  

        <script>
                        // Target the 'back to top' button
        var topButton = document.getElementById("topBtn");
            // Get onscroll function to append to ID
        window.onscroll = function() {scrollFunction()};
            // Display the button once it reaches 20 from top
        function scrollFunction() {
            if (document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20) {
                topButton.style.display = "block";
            } else {
                topButton.style.display = "none";
            }
        }
            // Set function
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
            </script>
</body>
</html>