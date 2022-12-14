<?php
require 'conn.php';
session_start();

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
}
include 'Navbar/navbar_log.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/publish_advertisement.css">
    <title>Publish Advertiesment</title>
</head>

<body>
    <div class="main" id="main">
        <h1>Publish Advertiesment</h1><br />
        <p class="p1">You can publish your company's adverisement from here. It will be sent to our admins and get published after they accept</p> <br><br>
        <div class="container">
            <form action="upload_image.php" method="post" enctype="multipart/form-data">

                <label for="photo"><b>Add Photos: <br></label>
                <input class ="file" type="file" name="file[]" multiple="multiple"><br><br><br><br>

                <!-- <img class="image2" src="images/tree planting.jpg"> <br><br> -->
                
                <label for="des"><b>Description: <br></label>
                <textarea class="des" name="comment" required></textarea><br/>
                <br><br><br>
                
                <button class="btn1"><a href="home_sponsor.php">Cancel</a></button>
                <button class="btn2"><a href="publish_advertisment.php"></a>Publish</button>
            </form>
        </div>
     </div>
</body>

</html>