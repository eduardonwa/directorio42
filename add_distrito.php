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
    <title>Agregar nuevo distrito</title>
</head>
<body>

    <div class="admin-panel-header">
        <h1>Alta para nueva sede de distrito</h1>
    </div>
        
        <form action="add_district_record.php" method="POST" class="new-record-layout">
            <p>Distrito</p>
                <input type="text" class="new-record-input" name="district_title" id="district_title">
            <p>Horario</p>
                <input type="text" class="new-record-input" name="district_schedule" id="district_schedule">
            <p>Direccion</p>
                <input type="text" class="new-record-input" name="district_address" id="district_address">
            <p>Reuniones</p>
                <input type="text" class="new-record-input" name="district_meetings" id="district_meetings">
            <p>Región</p>
                <input type="text" class="new-record-input" name="district_region" id="district_region">
            <p>Mapa (link)</p>
                <input type="text" class="new-record-input" name="district_map" id="district_map">

            <input type="submit" name="submit" class="guardar-btn" id="submit" value="Agregar">
            
        </form>
        <div class="go-back-link"> 
            <a href="admin_panel.php">Regresar</a>
            <a href="admin_panel_distritos.php">Ver distritos</a> </div>

        
</body>
</html>