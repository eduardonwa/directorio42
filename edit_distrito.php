<?php

    include 'includes/connect.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $edit_district_query = "SELECT * FROM distritos_aa_sonora_sur WHERE id = $id";
        $edit_district_result = mysqli_query($conn, $edit_district_query);
        if (mysqli_num_rows($edit_district_result) == 1) {
            $edit_district_row = mysqli_fetch_array($edit_district_result);
            $edit_district_title = $edit_district_row['district_title'];
            $edit_district_schedule = $edit_district_row['schedule'];
            $edit_district_address = $edit_district_row['district_address'];
            $edit_district_gatherings = $edit_district_row['gatherings'];
            $edit_district_region = $edit_district_row['region'];
            $edit_district_map = $edit_district_row['district_map'];
        }
    }

    if(isset($_POST['update_district'])) {
        $id = $_GET['id'];
        $update_district_title = $_POST['district_title'];
        $update_district_schedule = $_POST['schedule'];
        $update_district_address = $_POST['district_address'];
        $update_district_gatherings = $_POST['gatherings'];
        $update_district_region = $_POST['region'];
        $update_district_map = $_POST['district_map'];

        $update_district_query = "UPDATE distritos_aa_sonora_sur
                                    SET district_title = '$update_district_title',
                                    schedule = '$update_district_schedule',
                                    district_address = '$update_district_address',
                                    gatherings = '$update_district_gatherings',
                                    region = '$update_district_region', 
                                    district_map = '$update_district_map'
                                    WHERE id = '$id'";
        
        $update_district_result = mysqli_query($conn, $update_district_query);
        $_SESSION['edited'] = 'Distrito fue actualizado';
        header("Location: admin_panel_distritos.php");
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Agregar nuevo distrito</title>
</head>
<body>

    <div class="admin-panel-header">
        <h1>Distrito - Editar información</h1>
    </div>
        
        <form class="new-record-layout" action="edit_distrito.php?id=<?php echo "{$_GET['id']}"?>" method="POST">
            <p>Distrito</p>
                <input type="text" class="new-record-input" name="district_title" value="<?php echo "{$edit_district_title}"?>" id="district_title">
            <p>Horario</p>
                <input type="text" class="new-record-input" name="schedule" value="<?php echo "{$edit_district_schedule}"?>" id="schedule">
            <p>Direccion</p>
                <input type="text" class="new-record-input" name="district_address" value="<?php echo "{$edit_district_address}"?>" id="district_address">
            <p>Reuniones</p>
                <input type="text" class="new-record-input" name="gatherings" value="<?php echo "{$edit_district_gatherings}"?>" id="gatherings">
            <p>Región</p>
                <input type="text" class="new-record-input" name="region" value="<?php echo "{$edit_district_region}"?>" id="region">
            <p>Mapa (link)</p>
                <input type="text" class="new-record-input" name="district_map" value="<?php echo "{$edit_district_map}"?>" id="district_map">
            
            <button class="guardar-btn" name="update_district">Actualizar</button>
            <a href="admin_panel_distritos.php">Regresar</a>
        </form>


</body>
</html>