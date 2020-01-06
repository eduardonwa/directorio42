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
    <title>Alcohólicos Anónimos México Área 42</title>
</head>
<body>

    <?php 
        require "header.php";
    ?>

        <div class="logged-alerts">
            <?php
                if(isset($_SESSION['user_id'])) {
                    echo '<p style="color:green;">Estas conectado</p>';
                }
            ?>
        </div>

        <div class="layout-design">

            <div class="logo">
                <img src="img/logo-aa.png" alt="aa-logo">
            </div> <!-- Logo END -->

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

        </div> <!-- Layout design END -->

        <div class="index-layout">
            <div class="header">
                <h1 class="header-title">Bienvenido(a)s al directorio del área #42 de Alcohólicos Ánonimos en México</h1>
                    <p class="header-body">Buscar una junta cerca de mí</p>
                <a href="meetings.php"><button class="header-btn">Comenzar</button></a>
            </div> <!-- Header END -->

            <?php
            $index_query = "SELECT * FROM index_posts";
            $index_results = mysqli_query($conn, $index_query);
            ?>
        
            <div class="more-info">
            <?php while($index_row = mysqli_fetch_assoc($index_results)) { ?>
                <div class="card-info">
                    <h1 class="card-title"> <?php echo "{$index_row['post_title']}"; ?> </h1>
                        <p class="card-body"> <?php echo "{$index_row['post_text']}"; ?> </p>
                </div> <!-- Card info END -->
                <?php } ?>
            </div> <!-- More info END -->
        </div> <!-- Index layout END -->
        
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