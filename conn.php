<?php 
    //connect to database
    $host = 'localhost';
    $user = 'volunteer_lanka';
    $pass = 'VolunteerLanka';
    $db = 'volunteer_lanka';
    $conn = mysqli_connect($host, $user, $pass, $db);

    if (!$conn) {
        echo 'Connection error: '.mysqli_connect_error();
    }

    if (!isset($_SESSION)) {
        session_start();
    }
    
?>