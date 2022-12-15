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
    <title>View Advertiesment Requests</title>
    <link rel="stylesheet" href="styles/view_ad_req.css">
</head>

<body>
    <div class="main" id="main">
        <h2>View Advertiesment Requests</h2>
        <div id="ad-req-box">
            <div class="name">
                <h3 class="name-item">Sponsor Name:</h3>
                <h3 style="padding-top: 30px;">Virtusa Pvt ltd</h3>
            </div>
            <div class="name">
                <h3 class="name-item">Advertiesment:</h3>
                <div id="ad-box-item">
                    <img id="ad-box-img" src="images/beach.jpg" alt="">
                </div>
            </div>
            <div id="btn-area">
                <button class="btn">Reject</button>
                <button class="btn">Accept</button>
            </div>

        </div>
        <br>

        <br>
    </div>
</body>

</html>