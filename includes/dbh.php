<?php

    $server = "localhost";
    $username = "root";
    $pwd = "";
    $dbname = "directorio42";

    $conn = mysqli_connect($server, $username, $pwd, $dbname);
    
    if(!$conn) {
        die("Not connected: ".mysqli_connect_error());
    }

?>