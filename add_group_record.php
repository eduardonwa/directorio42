<?php
    include 'includes/connect.php';
    
    if(isset($_POST['submit'])) {

        $group_name = $_POST['name'];
        $group_schedule = $_POST['schedule'];
        $group_period = $_POST['period'];
        $group_address = $_POST['address'];
        $from_this_day = $_POST['from_this_day'];
        $to_this_day = $_POST['to_this_day'];
        $group_district = $_POST['district'];
        $group_region = $_POST['region'];
        $group_map = $_POST['group_map'];
         
        $new_result = "INSERT INTO meeting_results 
                            (group_name, group_schedule, group_address, group_period, from_this_day,
                            to_this_day, group_region, group_district, group_map)
                            VALUES ('$group_name', '$group_schedule', '$group_address', '$group_period',
                                    '$from_this_day', '$to_this_day', '$group_region', '$group_district', '$group_map')";
        
        $add_new_result = mysqli_query($conn, $new_result);
        $result_id = mysqli_insert_id($conn);

        $new_record = "INSERT INTO meeting_records (course, sector, from_this_day, to_this_day, district, meeting_results_id)
        VALUES($group_period, '$group_region', '$from_this_day', '$to_this_day', '$group_district', $result_id)";

        $new_record_result = mysqli_query($conn, $new_record);
        
        mysqli_commit($conn);
        $_SESSION['added'] = 'Nuevo grupo añadido';
        header("Location: admin_panel_groups.php");
    }
?>