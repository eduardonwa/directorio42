<?php

session_start();

$server = "localhost";
$user = "root";
$pwd = "";
$dbname = "directorio42";

// Create connection to MYSQL
$conn = mysqli_connect($server, $user, $pwd, $dbname);

// Check connection
if ($conn) {
    mysqli_query($conn, 'SET NAMES utf8');
} else {
    echo "Not connected";
}

?>