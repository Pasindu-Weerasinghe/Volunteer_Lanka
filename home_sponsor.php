<?php 
require 'conn.php';
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
}
require 'Navbar/navbar_log.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/home_sponsor.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
    <h2>Sponsor Notices</h2>
    <section class="container">
        <div class="card">
            <div class="card-image card1">
            </div>
            <h2>Project Name</h2>
            <h2>Amount:</h2>
            <a class="btn" href="sponsored_projects.php">View</a>
        </div>
        <div class="card">
            <div class="card-image card2">
            </div>
            <h2>Project Name:</h2>
            <h2>Amount:</h2>
            <a class="btn" href="sponsored_projects.php">View</a>
        </div>
        <div class="card">
            <div class="card-image card3">
            </div>
            <h2>Project Name</h2>
            <h2>Amount:</h2>
            <a class="btn" href="sponsored_projects.php">View</a>
        </div>
    </section>
    </div>
    
</body>
</html>