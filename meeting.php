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
    <title>Reunion</title>
</head>
<body>

        <div class="logo-individual">
            <img src="img/logo-aa.png" alt="aa-logo">
        </div>
    
        <?php
            $meeting_id = $_GET['id'];
            $query = "SELECT meeting_results.id AS meeting_result_id,
                      meeting_results.group_name AS meeting_group_name,
                      meeting_results.group_address AS meeting_group_address,
                      meeting_results.group_period AS meeting_period,
                      meeting_results.group_schedule AS meeting_schedule,
                      meeting_results.from_this_day AS from_this_day,
                      meeting_results.to_this_day AS to_this_day,
                      meeting_results.group_map AS group_map,
                      meeting_region.locality AS locality,
                      meeting_period.period_string AS period_of_day,
                      result_from_day_table.reunion_day AS result_from_day,
                      result_to_day_table.reunion_day AS result_to_day 
                      FROM meeting_results
                      INNER JOIN meeting_region ON meeting_results.group_region = meeting_region.region_id
                      INNER JOIN meeting_period ON meeting_results.group_period = meeting_period.period_id
                      INNER JOIN meeting_reunion AS result_from_day_table ON meeting_results.from_this_day = result_from_day_table.day_id
                      INNER JOIN meeting_reunion AS result_to_day_table ON meeting_results.to_this_day = result_to_day_table.day_id
                      WHERE id = '$meeting_id'";
            $result = mysqli_query($conn, $query);
        ?>

        <div class="meeting-details">

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

                <h1><?php echo "{$row['meeting_group_name']}" ;?></h1>
                    <ul class="detailed-info">
                        <li class="meeting-info-item"><?php echo "{$row['meeting_schedule']}" ;?></li>
                        <li class="meeting-info-item"><?php echo "{$row['meeting_group_address']}" ;?></li>
                        <li class="meeting-info-item"><?php echo "{$row['locality']}" ;?></li>
                        <li class="meeting-info-item"> <?php echo "{$row['result_from_day']}" ;?> <?php echo "a";?> <?php echo "{$row['result_to_day']}" ;?> </li>
                    </ul>

            <div class="directions-container"> <?php echo "{$row['group_map']}"; ?></div>
            
            <?php } ?> 

            <a href="meetings.php" class="regresar-btn">Regresar</a>

        </div>
</body>
</html>