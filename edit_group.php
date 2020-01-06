<?php

    include 'includes/connect.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $edit_group_query = "SELECT * FROM meeting_results WHERE id = $id";
        $edit_group_result = mysqli_query($conn, $edit_group_query);
        if (mysqli_num_rows($edit_group_result) == 1) {
            $row_edit_groups = mysqli_fetch_array($edit_group_result);
            $edit_group_name = $row_edit_groups['group_name'];
            $edit_group_address = $row_edit_groups['group_address'];
            $edit_group_schedule = $row_edit_groups['group_schedule'];
            $edit_group_period = $row_edit_groups['group_period'];
            $edit_group_from_day = $row_edit_groups['from_this_day'];
            $edit_group_to_day = $row_edit_groups['to_this_day'];
            $edit_group_map = $row_edit_groups['group_map'];
            $edit_group_district = $row_edit_groups['group_district'];
            $edit_group_region = $row_edit_groups['group_region'];
        }
    }

    if(isset($_POST['update_group'])) {
        $id = $_GET['id'];
        $update_group_name = $_POST['group_name'];
        $update_group_address = $_POST['group_address'];
        $update_group_schedule = $_POST['group_schedule'];
        $update_group_period = $_POST['group_period'];
        $update_group_from_day = $_POST['from_this_day'];
        $update_group_to_day = $_POST['to_this_day'];
        $update_group_district = $_POST['group_district'];
        $update_group_region = $_POST['group_region'];
        $update_group_map = $_POST['group_map'];

        $update_group_query = "UPDATE meeting_results 
                                SET group_name = '$update_group_name',
                                group_address = '$update_group_address',
                                group_schedule = '$update_group_schedule',
                                group_period = '$update_group_period',
                                from_this_day = '$update_group_from_day',
                                to_this_day = '$update_group_to_day',
                                group_district = '$update_group_district',
                                group_region = '$update_group_region',
                                group_map = '$update_group_map'
                                WHERE id = '$id'";

        mysqli_query($conn, $update_group_query);

        $update_group_record = "UPDATE meeting_records
                                SET course = '$update_group_period',
                                sector = '$update_group_region',
                                district = '$update_group_district',
                                from_this_day = '$update_group_from_day',
                                to_this_day = '$update_group_to_day'
                                WHERE meeting_results = '$id'";

        mysqli_query($conn, $update_group_record);
        $_SESSION['edited'] = 'Grupo fue actualizado';
        header("Location: admin_panel_groups.php");
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
        <h1>Grupo - Editar información</h1>
    </div>
        
        <form class="new-record-layout" action="edit_group.php?id=<?php echo "{$_GET['id']}"?>" method="POST">
            <p>Nombre</p>
                <input type="text" class="new-record-input" name="group_name" value="<?php echo "{$row_edit_groups['group_name']}"?>" id="group_name">
            <p>Direccion</p>
                <input type="text" class="new-record-input" name="group_address" value="<?php echo "{$row_edit_groups['group_address']}"?>" id="group_address">
            <p>Horario</p>
                <input type="text" class="new-record-input" name="group_schedule" value="<?php echo "{$row_edit_groups['group_schedule']}"?>" id="group_schedule">
           
            <p>Período del día</p>
                <?php $query_period_day = "SELECT * FROM meeting_period";
                $result_query_period_day = mysqli_query($conn, $query_period_day); ?>

                <select class="select-from-list" name="group_period">
                <option selected disabled>Seleccionar</option>
                    <?php while($row_for_period_day = mysqli_fetch_assoc($result_query_period_day)):;?>
                    <option <?php if($row_for_period_day['period_id'] == $edit_group_period){ echo "selected ";} ?>
                    value="<?php echo $row_for_period_day['period_id']?>"><?php echo $row_for_period_day['period_string']?></option>
                    <?php endwhile; ?>
                </select>

            <p>Reuniones</p>
            <?php $query_reunion = "SELECT * FROM meeting_reunion";
                $result_query_reunion = mysqli_query($conn, $query_reunion); ?>
            
            <p> De: </p>
            <select class="select-from-list" name="from_this_day">
                        <option selected disabled>Día</option>
                        <?php while($row_for_reunion = mysqli_fetch_assoc($result_query_reunion)):;?>
                        <option <?php if($row_for_reunion['day_id'] == $edit_group_from_day){ echo "selected ";} ?>
                        value="<?php echo $row_for_reunion['day_id']?>"> <?php echo $row_for_reunion['reunion_day']?> </option>
                        <?php endwhile; ?>
                    </select>
            
            <p> A: </p>
            <?php $to_day_query_reunion = "SELECT * FROM meeting_reunion";
            $result_to_day_query = mysqli_query($conn, $to_day_query_reunion); ?>
            
            <select class="select-from-list" name="to_this_day">
                        <?php while($row_for_reunion_to_day = mysqli_fetch_assoc($result_to_day_query)):;?>
                        <option <?php if($row_for_reunion_to_day['day_id'] == $edit_group_to_day){ echo "selected "; }?>
                        value="<?php echo $row_for_reunion_to_day['day_id']?>"> <?php echo $row_for_reunion_to_day['reunion_day']?></option>
                        <?php endwhile; ?>
                    </select>


            <p>Distrito</p>
                <input type="text" class="new-record-input" name="group_district" value="<?php echo "{$row_edit_groups['group_district']}"?>" id="group_district">

            <p>Región</p>
            <?php $query_regions_group = "SELECT * FROM meeting_region";
                $result_query_region_group = mysqli_query($conn, $query_regions_group); ?> <!-- Get regions table -->
            <!-- Feed dropdown list with table content -->
            <select class="select-from-list" name="group_region">
                <option selected disabled>Seleccionar región</option>
                    <?php while($row_for_region_group = mysqli_fetch_assoc($result_query_region_group)):;?>
                    <option <?php if($row_for_region_group['region_id'] == $edit_group_region){ echo "selected ";} ?>
                        value="<?php echo $row_for_region_group['region_id'] ; ?>"> <?php echo $row_for_region_group['locality']?> </option>
                    <?php endwhile; ?>
            </select>

            <p>Mapa (link)</p>
                <input type="text" class="new-record-input" name="group_map" value="<?php echo $edit_group_map?>" id="group_map">

            <button class="guardar-btn" name="update_group" value="update_group">Actualizar</button>
            
            <a href="admin_panel_groups.php">Regresar</a>
        </form>


</body>
</html>