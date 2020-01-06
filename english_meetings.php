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

        <h1>English Speaking Meetings</h1>
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