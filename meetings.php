<?php
    include 'includes/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Reuniones</title>
    <style>
    </style>
</head>
<body>

<button onclick="topFunction()" id="topBtn" title="Ir arriba">Arriba</button>

        <div class="layout-design">
            <div class="logo">
                <img src="img/logo-aa.png" alt="aa-logo">
            </div>
        
            <div class="navbar">
                    <div class="toggle-icon">
                        <svg width="20" height="20">
                            <circle cx="10" cy="10" r="10" />
                        </svg>
                    </div> <!-- Toggle icon END -->
                    <ul class="navbar-items">
                        <a href="index.php"><li class="nav-link">Inicio</li></a>
                        <a href="meetings.php"><li class="nav-link">Reuniones</li></a>
                        <a href="distritos.php"><li class="nav-link">Distritos</li></a>
                        <a href="english_meetings.php"><li class="nav-link">English Speaking Meetings</li></a>
                        <a href="#"><li class="nav-link">Contacto</li></a>
                    </ul>
                </div> <!-- Navbar END -->
        </div>

            <!-- Jquery handler -->
            <script>

                $(document).ready(function(){
                    
                    $("#search-meetings").on('input', function(){
                        $value = $(this).val();
                        $(".all-data-container").hide();
                        $(".all-data-container").filter(function(){
                            return $(this).data("meetings").toLowerCase().includes($value.toLowerCase());
                        }).show();
                    });
                });
            
            </script>
            
        <div class="filter-search-bar"> <!-- Inicia Filter Search -->
            <input type="text" id="search-meetings" placeholder="Buscar">
   
            <div class="dropdowns-container">
                <input class="filter-selection" id="region" type="radio" value="region" name="selection" />
                    <label class="label-filter" for="region"> Por región </label>
                <input class="filter-selection" id="days" type="radio" value="days" name="selection"/>
                    <label class="label-filter" for="days"> Por día</label>
                <input class="filter-selection" id="period" type="radio" value="period" name="selection"/>
                    <label class="label-filter" for="period">Por período de día</label>
            </div>

            <?php
            $query_region = "SELECT region_id, locality FROM meeting_region";
            $result_of_region = mysqli_query($conn, $query_region);
            ?>
                <div id="region" class="content"> <!-- Regions --> 
                    <ul>
                    <?php while($row_region = mysqli_fetch_assoc($result_of_region)) { ?> 
                        <li class="filter-region" data-region="<?php echo "{$row_region['region_id']}";?>"> <?php echo "{$row_region['locality']}" ;?> </li>
                    </ul>
                    <?php } ?>
                </div> <!-- Regions END -->

            <?php 
            $query_days = "SELECT day_id, reunion_day FROM meeting_reunion";
            $result_of_day = mysqli_query($conn, $query_days);
            ?>
                <div id="days" class="content"> <!-- Days -->
                    <ul>
                    <?php while($row_days = mysqli_fetch_assoc($result_of_day)) { ?>
                        <li class="filter-day" data-day=" <?php echo "{$row_days['day_id']}" ;?> " ><?php echo "{$row_days['reunion_day']}" ;?></li>
                    </ul>
                    <?php } ?>
                </div> <!-- Days of week END -->

            <?php
            $query_periods = "SELECT period_id, period_string FROM meeting_period";
            $result_of_periods = mysqli_query($conn, $query_periods);
            ?>
                <div id="period" class="content"> <!-- Period of day --> 
                    <ul>
                    <?php while($row_periods = mysqli_fetch_assoc($result_of_periods)) { ?> 
                        <li class="filter-period" data-period="<?php echo "{$row_periods['period_id']}";?>"> <?php echo "{$row_periods['period_string']}" ;?> </li>
                    </ul>
                    <?php } ?>
                </div> <!-- Period of day END -->
                <button id="reset-filters">Limpiar filtros</button>
            </div>
        </div> <!-- Fin de Filter Search -->

        <?php 
            $query = 
            "SELECT meeting_results.id AS meeting_result_id,
            meeting_results.group_name AS meeting_group_name,
            meeting_results.group_address AS meeting_group_address,
            meeting_results.group_period AS meeting_period,
            meeting_results.group_schedule AS meeting_schedule,
            meeting_results.from_this_day AS from_this_day,
            meeting_results.to_this_day AS to_this_day,
            meeting_region.locality AS locality,
            meeting_period.period_string AS period_of_day,
            result_from_day_table.reunion_day AS result_from_day,
            result_to_day_table.reunion_day AS result_to_day
            FROM meeting_results
            INNER JOIN meeting_region ON meeting_results.group_region = meeting_region.region_id
            INNER JOIN meeting_period ON meeting_results.group_period = meeting_period.period_id
            INNER JOIN meeting_reunion ON meeting_results.from_this_day = meeting_reunion.day_id
            INNER JOIN meeting_reunion AS result_from_day_table ON meeting_results.from_this_day = result_from_day_table.day_id
            INNER JOIN meeting_reunion AS result_to_day_table ON meeting_results.to_this_day = result_to_day_table.day_id";
            $result = mysqli_query ($conn, $query);
            ?>

               <div class="titles-row-container">
                        <ul class="titles-row">
                            <li>Horario</li>
                            <li>Grupo</li>
                            <li>Dirección</li>
                            <li>Reuniones</li>
                            <li>Región</li>
                        </ul>
                </div>

                <div id="meetings">
                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="all-data-container" data-meetings="<?php echo "{$row['meeting_schedule']}"?> <?php echo "{$row['meeting_group_name']}"?> <?php echo "{$row['meeting_group_address']}"?> <?php echo "{$row['from_this_day']}"?> <?php echo "{$row['to_this_day']}"?>  <?php echo "{$row['locality']}"?>">
                                <div class="data-row-container">
                                    <li class="hour"><?php echo "{$row['meeting_schedule']}" ;?></li>
                                    <li class="info"><a href="meeting.php?id=<?php echo "{$row['meeting_result_id']}"?>"> <?php echo "{$row['meeting_group_name']}" ;?> </a></li>
                                    <li class="info"><?php echo "{$row['meeting_group_address']}" ;?></li>
                                    <li class="info"><?php echo "{$row['result_from_day']}" ;?> <?php echo "a";?> <?php echo "{$row['result_to_day']}" ;?> </li>
                                    <li class="info"><?php echo "{$row['locality']}" ;?></li>
                                </div>
                            </div>
                        <?php } ?> 
                </div>             

        <script>
            // Toggle navbar 
        function classToggle() {
        const navs = document.querySelectorAll('.navbar-items')
        navs.forEach(nav => nav.classList.toggle('toggle-show'));
        }

        document.querySelector('.toggle-icon').addEventListener('click', classToggle);

            // Target the 'back to top' button
        var topButton = document.getElementById("topBtn");
            // Get onscroll function to append to ID
        window.onscroll = function() {scrollFunction()};
            // Display the button once it reaches 20 from top
        function scrollFunction() {
            if (document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20) {
                topButton.style.display = "block";
            } else {
                topButton.style.display = "none";
            }
        }
            // Set function
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
        
        (() => {
            document.querySelectorAll('input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', e => {
            document.querySelectorAll("div.content").forEach(div => div.style.display = "none");
            document.querySelector("div.content#"+e.target.value).style.display = "block";
        });
        });
        })();
        
        </script>
</body>
</html>