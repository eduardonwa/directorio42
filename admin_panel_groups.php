<?php
    include 'includes/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Consultar lista de grupos </title>
</head>
<body>

    <button onclick="topFunction()" id="topBtn" title="Arriba">Arriba</button> 
   
    <div class="admin-panel-header">

    <div class="header-icons">
            <a href="admin_panel_distritos.php">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="18.4px"
                    height="18.2px" viewBox="0 0 18.4 18.2" style="enable-background:new 0 0 18.4 18.2;" xml:space="preserve">
                <style type="text/css">
                    .st0{fill:none;stroke:#FFFFFF;stroke-miterlimit:10;}
                </style>
                <defs>
                </defs>
                <g>
                    <polyline class="st0" points="6.3,17.5 6.3,8.2 12.1,8.2 12.1,17.5 	"/>
                    <polygon class="st0" points="17.9,17.7 0.5,17.7 0.5,4.7 7.5,0.5 11.1,0.5 17.9,4.7 	"/>
                </g>
                </svg>
                <span style="color:white;position:relative;bottom:3px;"> Distritos </span>
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
                <path class="st0" d="M18.6,16.8H1.4c-0.5,0-0.9-0.4-0.9-0.9v-0.9c0-0.5,0.4-0.9,0.9-0.9h17.2c0.5,0,0.9,0.4,0.9,0.9v0.9
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
        <h1> Grupos - Consulta y edición </h1>
        <a href="add_group.php" class="new-record-shortcut">Agregar un nuevo grupo</a>
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
        
            <script>

                $(document).ready(function(){
                    
                    $("#search-groups").on('input', function(){
                        $value = $(this).val();
                        $(".admin-searches-groups-container").hide();
                        $(".admin-searches-groups-container").filter(function(){
                            return $(this).data("meetings").toLowerCase().includes($value.toLowerCase());
                        }).show();
                    });
                });

            </script>

        <?php 
        $admin_filters_query = "SELECT DISTINCT group_district FROM meeting_results";
        $admin_filters_result = mysqli_query ($conn, $admin_filters_query);
        ?>

        <div class="admin-filters-info-container">
            <div class="admin-filters-info">
                <input type="text" id="search-groups" placeholder="Ingresar distrito, localidad ó nombre de grupo">
            </div>
        </div>

        <div class="admin-searches-groups">
            <div class="admin-header-columns">
                <p class="admin-columns">Nombre</p>
                <p class="admin-columns">Distrito</p>
                <p class="admin-columns">Localidad</p>
                <p class="admin-columns">Acciones</p>
            </div>
        </div> 

        <?php
        $admin_query_groups = "SELECT meeting_results.id AS group_id,
                                      meeting_results.group_name AS group_name,
                                      meeting_results.group_district AS group_district,
                                      meeting_results.group_region AS group_region,
                                      meeting_region.locality AS locality
                                FROM meeting_results
                                LEFT JOIN meeting_region ON meeting_results.group_region = meeting_region.region_id";
        $result = mysqli_query ($conn, $admin_query_groups);
        ?>
                                   
                <div id="admin-meetings">
                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="admin-searches-groups-container" data-meetings="<?php echo "{$row['group_name']}"?> <?php echo "{$row['group_district']}"?> <?php echo "{$row['group_region']}"?> <?php echo "{$row['locality']}"?>">
                                <div class="admin-looks-info-grid">
                                    <li class="admin-info"><?php echo "{$row['group_name']}" ;?></li>
                                    <li class="admin-info"><?php echo "{$row['group_district']}" ;?></li>
                                    <li class="admin-info"><?php echo "{$row['locality']}" ;?></li>
                                    <li class="actions">                        
                                        <div class="table-actions-container"> <a href="edit_group.php?id=<?php echo "{$row['group_id']}" ?>"> <img class="table-action-icon" src="img/icons/edit-icon.svg"></a> </div>
                                        <div class="table-actions-container"> <a href="delete_group_record.php?id=<?php echo "{$row['group_id']}" ?>" onclick="return confirm('Este registro se borrará, porfavor confirma')"> <img class="table-action-icon" src="img/icons/delete-distrito.svg"></a> </div>
                                    </li>
                                </div>
                            </div>
                        <?php } ?> 
                </div>

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