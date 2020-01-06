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
    <title>Agregar un nuevo grupo</title>
</head>
<body>

    <div class="admin-panel-header">
        <h1>Alta para nuevo grupo</h1>
    </div>
        
        <form action="add_group_record.php" method="POST">
            <div class="add-group-layout">

                <div class="first-row"> 
                    <section class="top-row"> <!-- Nombre y dirección -->
                        <p>Nombre</p>
                            <input type="text" class="new-record-input" name="name" id="name" required>
                        <p>Dirección</p>
                            <input type="text" class="new-record-input" name="address" id="address">
                    </section>
                    <section class="bottom-row"> <!-- Reuniones y Región -->
                            <?php $query_reunion = "SELECT * FROM meeting_reunion";
                            $result_query_reunion = mysqli_query($conn, $query_reunion); ?>
                            <p>De</p>
                            <select class="select-from-list" name="from_this_day">
                                <option selected disabled>Día</option>
                                <?php while($row_for_reunion = mysqli_fetch_assoc($result_query_reunion)):;?>
                                <option value="<?php echo $row_for_reunion['day_id']?>"> <?php echo $row_for_reunion['reunion_day']?> </option>
                                <?php endwhile; ?>
                            </select>

                            <span> a </span>

                            <?php $query_reunion = "SELECT * FROM meeting_reunion";
                            $result_query_reunion = mysqli_query($conn, $query_reunion); ?>
                            <select class="select-from-list" name="to_this_day">
                                <option selected disabled>Día</option>
                                    <?php while($row_for_reunion = mysqli_fetch_assoc($result_query_reunion)):;?>
                                <option value="<?php echo $row_for_reunion['day_id']?>"> <?php echo $row_for_reunion['reunion_day']?> </option>
                                    <?php endwhile; ?>
                            </select>

                            <?php $query_regions_group = "SELECT * FROM meeting_region";
                                $result_query_region_group = mysqli_query($conn, $query_regions_group); ?> <!-- Get regions table --> 
                                <!-- Feed dropdown list with table content -->
                                <p>Localidad</p>
                                <select class="select-from-list" name="region">
                                    <option selected disabled>Región</option>
                                        <?php while($row_for_region_group = mysqli_fetch_assoc($result_query_region_group)):;?>
                                        <option value="<?php echo $row_for_region_group['region_id']?>"><?php echo $row_for_region_group['locality']?></option>
                                        <?php endwhile; ?>
                                </select>
                    </section>
                </div> <!-- First row END -->

                <div class="second-row"> 
                    <section class="top-row"> <!-- Horario y período -->
                    <p>Horario</p>
                        <input type="text" class="new-record-input" name="schedule">
                         <?php $query_period_day = "SELECT * FROM meeting_period";
                        $result_query_period_day = mysqli_query($conn, $query_period_day); ?>
                        <p>Período</p>
                            <select class="select-from-list" name="period">
                                <option selected disabled>Período del día</option>
                                <?php while($row_for_period_day = mysqli_fetch_assoc($result_query_period_day)):;?>
                                <option value="<?php echo $row_for_period_day['period_id']?>"><?php echo $row_for_period_day['period_string']?></option>
                                <?php endwhile; ?>
                            </select>      
                    </section> <!-- Top Row END -->

                    <section class="bottom-row"> <!-- Horario extra -->

                        <button class="extra-schedule-btn" onclick="submenuToggle('extraSchedule')">Agregar nuevo horario</button>
                            <div class="extra-schedule-menu" id="extraSchedule">
                                    <?php $query_reunion = "SELECT * FROM meeting_reunion";
                                    $result_query_reunion = mysqli_query($conn, $query_reunion); ?>

                                <select class="select-from-list" name="from_this_day">
                                    <option selected disabled>Día</option>
                                    <?php while($row_for_reunion = mysqli_fetch_assoc($result_query_reunion)):;?>
                                    <option value="<?php echo $row_for_reunion['day_id']?>"> <?php echo $row_for_reunion['reunion_day']?> </option>
                                    <?php endwhile; ?>
                                </select>
                                
                                    <input type="text" class="new-record-input" name="schedule" placeholder="Horario">
                                    <?php $query_period_day = "SELECT * FROM meeting_period";
                                    $result_query_period_day = mysqli_query($conn, $query_period_day); ?>
                                    
                                <select class="select-from-list" name="period">
                                    <option selected disabled>Período del día</option>
                                    <?php while($row_for_period_day = mysqli_fetch_assoc($result_query_period_day)):;?>
                                    <option value="<?php echo $row_for_period_day['period_id']?>"><?php echo $row_for_period_day['period_string']?></option>
                                    <?php endwhile; ?>
                                </select>    
                            </div> <!-- Extra schedule END -->

                    </section> <!-- Bottom row END -->
                </div> <!-- Second row END -->

                <div class="third-row"> <!-- Distrito -->
                    <p>Distrito</p>
                        <input type="text" class="new-record-input" name="district">
                </div> <!-- Third Row END -->

                <div class="fourth-row"> <!-- Mapa, submit button -->
                    <p>Mapa</p>
                        <input type="text" class="new-record-input" name="group_map" id="group_map">
                    <input type="submit" name="submit" class="guardar-btn" id="submit" value="Agregar">
                        <div class="go-back-link"> 
                            <a href="admin_panel.php">Regresar</a>
                            <a href="admin_panel_groups.php">Ver grupos</a>
                        </div>
                </div>  <!-- Fourth Row END -->

            </div> <!-- Add group layout END -->

        </form> <!-- Add group form END -->

        <script>
        function submenuToggle(divid) {
            var submenu = document.getElementById(divid);
            if( submenu.style.display === "none") {
                submenu.style.display = "block";
            } else {
                submenu.style.display = "none";
            }
        }
    </script>
</body>
</html>