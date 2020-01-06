<?php
    include 'includes/connect.php';

    if(isset($_POST['submit'])) {
        $title = $_POST['district_title'];
        $schedule = $_POST['district_schedule'];
        $address = $_POST['district_address'];
        $meetings = $_POST['district_meetings'];
        $region = $_POST['district_region'];
        $map = $_POST['district_map'];
        
        $sql = "INSERT INTO distritos_aa_sonora_sur (district_title, schedule, district_address, gatherings, region, district_map)
        VALUES ('$title', '$schedule', '$address', '$meetings', '$region', '$map')";

        $result = mysqli_query($conn, $sql);
        if(!$result) {
            die("query failed");
        }
        echo 'saved';
        $_SESSION['added'] = 'Nuevo distrito añadido';
        header("Location: admin_panel_distritos.php?record=success");
    }    
?>