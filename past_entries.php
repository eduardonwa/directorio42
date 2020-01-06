<?php

    include 'includes/connect.php';

    if(isset($_POST['hidden_id']) && isset($_POST["post_text"])) {
        $id = $_POST['hidden_id'];
        $edit_post_query = "SELECT * FROM index_posts WHERE id = $id";
        $edit_post_result = mysqli_query($conn, $edit_post_query);
            
        if (mysqli_num_rows($edit_post_result) == 1) {
            $edit_post_row = mysqli_fetch_array($edit_post_result);
            $hidden_id = $edit_post_row['id'];
            $edit_post_title = $edit_post_row['post_title'];
            $edit_post_text = $edit_post_row['post_text'];

            $new_post_text = $_POST["post_text"];
            $new_post_title = $_POST["post_title"];

            $update_post_query = "UPDATE index_posts
                                  SET post_text = '$new_post_text',
                                  post_title = '$new_post_title'
                                  WHERE id = $id";

            mysqli_query($conn, $update_post_query);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Entradas anteriores</title>
</head>
<body>
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
                <h1> Blog - Consulta y edición </h1>
            </div>

                <?php if(isset($_SESSION['deleted'])) { ?>
                    <div class="added-alert">
                        <?= $_SESSION['deleted']?>
                        <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
                    </div>
                <?php session_unset(); } ?>

                <?php if(isset($_SESSION['edited'])) { ?>
                    <div class="added-alert">
                        <?= $_SESSION['edited']?>
                        <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
                    </div>
                <?php session_unset(); } ?>

                <?php 
                    $past_entries_query = "SELECT id, post_title, post_text, created_at FROM index_posts";
                    $past_entries_result = mysqli_query($conn, $past_entries_query);
                ?>

                <div class="past-entries-container">
                    <?php while($past_entry_row = mysqli_fetch_assoc($past_entries_result)) { ?>
                        
                        <div class="past-entries-info">
                        <h2 style="color:black;"><?php echo "{$past_entry_row['post_title']}" ?></h2>
                          <span style="color:black;font-style:italic;"> <?php echo date("D d F", strtotime($past_entry_row['created_at']));?> <br> <?php echo date("g:i a", strtotime($past_entry_row['created_at']));?> </span>
                                <div class="entries-actions">
                                    <div class="entries-icon"> <a href="delete_post.php?id=<?php echo "{$past_entry_row['id']}" ?>" onclick="return confirm('Este registro se borrará, porfavor confirma')"> <img src="img/icons/delete-post-icon.svg"> </a> </div>
                                </div> <!-- Entries Actions END -->
                        </div> <!-- Entries Info END -->
                        
                        <div class="past-entries-content">
                        <?php if(isset($_POST["hidden_id"]) && $_POST["hidden_id"] == $past_entry_row['id']) { ?>
                            
                            <form action="past_entries.php" method="POST">
                                <input class="new-record-input" type="text" name="post_title" value="<?php echo $past_entry_row['post_title']; ?>" style="border-radius:5px;width:100%;margin:5px auto;background-color:white;">
                                <textarea class="edit-index-text" name="post_text" style="border-radius:5px;padding:0;"> <?php echo $past_entry_row['post_text']; ?>  </textarea> 
                                <input type="hidden" name="hidden_id" value="<?php echo $_POST['hidden_id'];?>">
                                <input class="save-post-btn" name="edit_post" value="Guardar" type="submit">
                            </form> <!-- Save entry upon edit selection -->
                        <?php } else { ?>

                              <form action="past_entries.php" method="POST">
                                        <input type="hidden" name="hidden_id" value="<?php echo $past_entry_row['id']?>">
                                        <input class="save-post-btn" name="edit_post" value="Editar" type="submit">
                                </form> <!-- Edit button -->
                        <?php } ?>
                            
                        </div> <!-- Entries Content END -->
                    
                        <?php } ?>


                </div> <!-- Past entries container END -->
        </div>

        <script src="js/moment.js"></script>
        
</body>
</html>