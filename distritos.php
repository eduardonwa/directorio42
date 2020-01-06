<?php
    include ("includes/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Distritos</title>
</head>
<body>

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

        <?php
                $query = "SELECT id, district_title, schedule, district_address, gatherings, region FROM distritos_aa_sonora_sur";
                $result = mysqli_query($conn, $query); ?>

        <div class="distritos-row-container">
                    <ul class="titles-row">
                        <li>Distrito</li>
                        <li>Horario</li>
                        <li>Dirección</li>
                        <li>Reuniones</li>
                        <li>Región</li>
                    </ul>
        </div>           

                    <div id="meetings">
                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="all-distritos-container" data-meetings="<?php echo "{$row['schedule']}"?> <?php echo "{$row['id']}"?> <?php echo "{$row['district_address']}"?> <?php echo "{$row['gatherings']}"?> <?php echo "{$row['region']}"?>">
                                <div class="data-row-container">
                                   
                                    <li class="distrito-number-info"><a href="distrito.php?id=<?php echo "{$row['id']}"?>"><?php echo "{$row['district_title']}" ;?></a></li>
                                    <li class="distrito-hour-info"><?php echo "{$row['schedule']}" ;?></li>
                                    <li class="distrito-info"><?php echo "{$row['district_address']}" ;?></li>
                                    <li class="distrito-info"><?php echo "{$row['gatherings']}" ;?></li>
                                    <li class="distrito-info"><?php echo "{$row['region']}" ;?></li>
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
            </script>
</body>
</html>