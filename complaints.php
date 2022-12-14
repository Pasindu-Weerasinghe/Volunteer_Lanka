<?php
include 'conn.php';
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
    <title>Complaints</title>
    <link rel="stylesheet" href="styles/complaints.css">
</head>

<body>
    <br><br><br>
    <div class="main" id="main">
        <h2>Complaints</h2>
        <div id="com-box">
            <div id="com-box-item">
                <img id="user-img" src="images/icons8-user-32.png" alt="">
                <h3 id="com-box-item-uname">User Name</h3>
                <h4>Complain about:</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti nesciunt ipsam magni quam magnam esse, laudantium ratione unde libero, quis vitae! Perspiciatis minus nihil facere! In veniam facere quos delectus.</p>
                <button>View</button>
            </div>
        </div>
        <div id="com-box">
            <div id="com-box-item">
                <img id="user-img" src="images/icons8-user-32.png" alt="">
                <h3 id="com-box-item-uname">User Name</h3>
                <h4>Complain about:</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti nesciunt ipsam magni quam magnam esse, laudantium ratione unde libero, quis vitae! Perspiciatis minus nihil facere! In veniam facere quos delectus.</p>
                <button>View</button>
            </div>
        </div>
        <br>
        <button onclick="history.back()" id="back-btn">Back</button>
        <br><br>
    </div>
</body>

</html>