<?php include 'conn.php';
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
    <title>View Complaints</title>
    <link rel="stylesheet" href="styles/view_compliants.css">
</head>

<body>
    <br><br><br>
    <div class="main">
        <h2>Complaints</h2>
        <div id="com-box">
            <div class="name">
                <h3 class="name-item">Sponsor Name:</h3>
                <h3 style="padding-top: 30px;">Virtusa Pvt ltd</h3>
            </div>
            <div class="name">
                <h3 class="name-item">Complaint About:</h3>
                <h3 style="padding-top: 30px;">Rotract Club Galle</h3>
            </div>
            <div class="name">
                <h3 class="name-item">Complaint:</h3>
                <p id="com">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Nobis minima cumque veritatis! Aliquam facilis magnam voluptatem totam,
                    voluptatum, quae libero temporibus ut officiis aperiam
                    iste qui dolor rem possimus? Vitae.</p>
            </div>
            <br>
        </div>
        <br>
    </div>
    <div id="btn-area">
        <button class="btn">Back</button>
        <button class="btn">Resolve</button>
    </div>
    <br>
</body>

</html>