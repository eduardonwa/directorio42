<?php 

    include 'includes/connect.php';

    if(isset($_POST['submit'])) {

        $first_title = $_POST['first_post_title'];
        $first_text = $_POST['first_post_text'];

    $entry_query = "INSERT INTO index_posts (post_title, post_text)
    VALUES ('$first_title', '$first_text')";

    $entry_result = mysqli_query ($conn, $entry_query);

    $_SESSION['added'] = 'Tu entrada ha sido publicada';
    header("Location: admin_panel.php");

    }
?>