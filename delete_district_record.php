<?php

    include 'includes/connect.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $delete_record_query = "DELETE FROM distritos_aa_sonora_sur WHERE id = $id";
        $delete_group_result = mysqli_query($conn, $delete_record_query);
        if(!$delete_group_result) {
            die("La consulta falló");
        }

        $_SESSION['deleted'] = 'Distrito eliminado.';
        header("Location: admin_panel_distritos.php");
    }

?> 