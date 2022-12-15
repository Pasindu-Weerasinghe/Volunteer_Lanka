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
    <div class="main" id="main">
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
                <p id="com">I am writing to report a user on your system who has been behaving inappropriately. The user's username is [Rotract Club Galle] and they have been [describe the inappropriate behavior].
                    I have included evidence of their behavior below: [include any relevant screenshots or other evidence].
                    I believe that this behavior is in violation of your terms of service and I request that you take appropriate action.
                    Thank you for your attention to this matter.</p>
            </div>
            <br>
            <div id="btn-area">
                <button class="btn" onclick="window.location.href='home_admin.php'">Back</button>
                <button class="btn">Resolve</button>
            </div>
        </div>
        <br>
    </div>

    <br>
</body>

</html>