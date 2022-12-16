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
    <div class="main" id="main">
        <h2>Complaints</h2>
        <div id="com-box">
            <div id="com-box-item">
                <!-- <img id="user-img" src="images/icons8-user-32.png" alt=""> -->
                <h3 id="com-box-item-uname">Leo Club Gampaha</h3>
                <h4>Complain :</h4>
                <p>I am writing to report a user on your system who has been behaving inappropriately. Rotaract Club Galle has been cacelling too many projects for past few months.
                    I believe that this behavior is in violation of your terms of service and I request that you take appropriate action.
                    Thank you for your attention to this matter.</p>
                <button>View</button>
            </div>
        </div>
        <div id="com-box">
            <div id="com-box-item">
                <!-- <img id="user-img" src="images/icons8-user-32.png" alt=""> -->
                <h3 id="com-box-item-uname">Rotract Club Kurunegala</h3>
                <h4>Complain :</h4>
                <p>I am writing to bring to your attention a user who has been acting offensive in the chat. Please take necessary measures against this user.
                </p>
                <button>View</button>
            </div>
        </div>
        <br>
        <button onclick="history.back()" id="back-btn">Back</button>
        <br><br>
    </div>
</body>

</html>