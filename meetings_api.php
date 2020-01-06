<?php

    include 'includes/connect.php';

    $meetings = [];
    $meeting_json = json_encode($meetings);

    $meeting_query = "SELECT * FROM meeting_results";
    $meeting_results = mysqli_query ($conn, $meeting_query);

    while($meeting_row = mysqli_fetch_assoc($meeting_results)) {
        array_push($meetings, $meeting_row);
    }

    if(isset($_GET['region']) && $_GET['region']!=null);
    if(isset($_GET['from_this_day']) && $_GET['from_this_day']!=null);
    if(isset($_GET['to_this_day']) && $_GET['to_this_day']!=null);
    if(isset($_GET['period']) && $_GET['period']!=null);

    echo utf8_encode(json_encode($meetings));
?>