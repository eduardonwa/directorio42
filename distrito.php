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
            $distrito_id = $_GET['id'];
            $query_distrito = "SELECT * FROM distritos_aa_sonora_sur WHERE id = ".$distrito_id;
            $result_of_distrito = mysqli_query($conn, $query_distrito);
        ?>

        <div class="meeting-details">

        <?php while($row_distrito = mysqli_fetch_assoc($result_of_distrito)) { ?>

                <h1>Distrito <?php echo "{$row_distrito['id']}" ;?></h1>
                    <ul class="detailed-info">
                        <li class="meeting-info-item"><?php echo "{$row_distrito['schedule']}" ;?></li>
                        <li class="meeting-info-item"><?php echo "{$row_distrito['district_address']}" ;?></li>
                        <li class="meeting-info-item"><?php echo "{$row_distrito['gatherings']}" ;?></li>
                        <li class="meeting-info-item"><?php echo "{$row_distrito['region']}" ;?></li>
                    </ul>

            <div class="directions-container"> <?php echo "{$row_distrito['district_map']}"; ?></div>
            
            <?php } ?> 

            <a href="distritos.php" class="regresar-btn">Regresar</a>

        </div>
</body>
</html>