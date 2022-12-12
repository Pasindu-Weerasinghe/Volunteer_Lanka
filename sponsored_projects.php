<?php 
require 'conn.php';
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
}
require 'Navbar/navbar_log.php';

    $sql = "SELECT P_ID, Name, Date FROM project";
    $result = mysqli_query($conn, $sql);
    $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cards/cards.css">
    <title>Sponserd Projects</title>
</head>
<body>
    <div class="main" id="main">
    <br/><h2>Sponserd Projects</h2><br/><br/>
    <section class="container">
    <?php foreach ($projects as $project)
            $pid = $project['P_ID'];
            $_SESSION['pid']=$pid;
            ?>
        <div class="card">
            <div class="card-image card1">
            </div>
            <p>Project Name</p>
            <p>Amount</p>
            <a class="btn" href="view_projects_sponsor.php">View</a>
        </div>
        <div class="card">
            <div class="card-image card2">
            </div>
            <p>Project Name</p>
            <p>Amount</p>
            <a class="btn" href="view_projects_sponsor.php">View</a>
        </div>
        <div class="card">
            <div class="card-image card3">
            </div>
            <p>Project Name</p>
            <p>Amount</p>
            <a class="btn" href="view_projects_sponsor.php">View</a>
        </div>
    </section>
    <section class="container">
    <?php foreach ($projects as $project)
            $pid = $project['P_ID'];
            $_SESSION['pid']=$pid;
            ?>
        <div class="card">
            <div class="card-image card1">
            </div>
            <p>Project Name</p>
            <p>Amount</p>
            <a class="btn" href="view_projects_sponsor.php">View</a>
        </div>
        <div class="card">
            <div class="card-image card2">
            </div>
            <p>Project Name</p>
            <p>Amount</p>
            <a class="btn" href="view_projects_sponsor.php">View</a>
        </div>
        <div class="card">
            <div class="card-image card3">
            </div>
            <p>Project Name</p>
            <p>Amount</p>
            <a class="btn" href="view_projects_sponsor.php">View</a>
        </div>
    </section>
    <section class="container">
        <div class="card">
            <div class="card-image card1">
            </div>
            <p>Project Name</p>
            <p>Amount</p>
            <a class="btn" href="">View</a>
        </div>
        <div class="card">
            <div class="card-image card2">
            </div>
            <p>Project Name</p>
            <p>Amount</p>
            <a class="btn" href="">View</a>
        </div>
        <div class="card">
            <div class="card-image card3">
            </div>
            <p>Project Name</p>
            <p>Amount</p>
            <a class="btn"  href="view_project_sponsor.php">View</a>
        </div>
    </section>
    </div>
</body>
</html>