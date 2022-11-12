<?php 
require 'conn.php';
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
}
require 'Navbar/navbar_log.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cards/cards.css">
    <title>Completed Projects</title>
</head>
<body>
<div id="main" class="main">
    <br/><h2>Completed Projects</h2><br/><br/>
    <h3>Provide your valuable feedback for the projects you participated</h3>
    <section class="container">
        <div class="card">
            <div class="card-image card1">
            </div>
            <h2>Project Name</h2>
            <p>Date</p>
            <a class="btn" href="">Add Feedback</a>
        </div>
        <div class="card">
            <div class="card-image card2">
            </div>
            <h2>Project Name</h2>
            <p>Date</p>
            <a class="btn" href="">Add Feedback</a>
        </div>
        <div class="card">
            <div class="card-image card3">
            </div>
            <h2>Project Name</h2>
            <p>Date</p>
            <a class="btn" href="">Add Feedback</a>
        </div>
    </section>
</div>
</body>
</html>