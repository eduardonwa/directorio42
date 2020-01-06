<?php

    include 'includes/connect.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $delete_post_query = "DELETE FROM index_posts WHERE id = $id";
        $delete_post_result = mysqli_query($conn, $delete_post_query);
        if(!$delete_post_result) {
            die ("query failed");
        }
        $_SESSION['deleted'] = 'Entrada eliminada';
        header("Location: past_entries.php");
    }

?>