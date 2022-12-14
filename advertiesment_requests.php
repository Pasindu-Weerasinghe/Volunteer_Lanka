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
    <link rel="stylesheet" href="styles/advertiesment_requests.css">
    <title>Ad Requests</title>
</head>

<body>
    <div class="main" id="main">
        <h2>Advertisement Request</h2>
        <div id="ar-box">
            <div id="ar-box-item">
                <img id="user-img" src="images/icons8-user-32.png" alt="">
                <h3 id="ar-box-item-sname">Sponsor Name</h3>
                <p id="des">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Nobis facilis commodi unde, eius ipsum illum iste consequatur quos sapiente magni,
                    architecto ratione rem, labore aut quo molestias quis non incidunt.</p>
                <button id="ar-view-btn">View</button>


            </div>

        </div>
        <div id="ar-box">
            <div id="ar-box-item">
                <img id="user-img" src="images/icons8-user-32.png" alt="">
                <h3 id="ar-box-item-sname">Sponsor Name</h3>
                <p id="des">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Nobis facilis commodi unde, eius ipsum illum iste consequatur quos sapiente magni,
                    architecto ratione rem, labore aut quo molestias quis non incidunt. Lorem, ipsum dolor sit amet consectetur adipisicing elit. In, porro? Beatae explicabo, itaque est hic nulla odio placeat, cumque fugiat natus, ratione facilis. Illum odit porro, enim non architecto suscipit!</p>
                <button id="ar-view-btn">View</button>


            </div>

        </div>
        <div id="ar-box">
            <div id="ar-box-item">
                <img id="user-img" src="images/icons8-user-32.png" alt="">
                <h3 id="ar-box-item-sname">Sponsor Name</h3>
                <p id="des">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Nobis facilis commodi unde, eius ipsum illum iste consequatur quos sapiente magni,
                    architecto ratione rem, labore aut quo molestias quis non incidunt.</p>
                <button id="ar-view-btn">View</button>


            </div>

        </div>
        <br>
        <button id="back-btn">Back</button>
        <br><br>
    </div>

</body>

</html>