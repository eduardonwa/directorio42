<?php

    include 'includes/connect.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $delete_record_query = "DELETE FROM meeting_results WHERE id = $id";
        $delete_group_result = mysqli_query($conn, $delete_record_query);
        if(!$delete_group_result) {
            die("La consulta falló");
        }

        $_SESSION['deleted'] = 'Grupo ha sido borrado';
        header("Location: admin_panel_groups.php");
    }

?> 