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
    <link rel="stylesheet" href="styles/signup.css">
    <title>Request</title>
</head>
<body>
<div id="main" class="main">
    <h2>Request to Organize Projects</h2><br/>
    <h4>As a volunteer you are able to inform the organizers about your ideas to arrange a new volunteering project. You can send a request to all the organizers by submitting this form.
    <br/>Please provide reliable information.</h4>
    <form action="newideas_insert.php" method="post" enctype="multipart/form-data">
    <div class="container">
    <p>Let us know of the opportunities</p><hr>
    
        <label for="uname"><b>Username</b></label>
        <input type="text" name="uname" value=<?php echo ($_SESSION['uname']) ?> readonly>

        <label for="location"><b>Location</b></label>
        <input type="text" name="location" required>

        <label for="des"><b>Description</b></label>
        <input type="text" name="des" required>

        <label for="photo"><b>Add Photos</b></label>
        <input type="file" id="myFile" name="file"><br/><br/>

        <button class="cancel">Back</button>
        <button class="next" name="request">Request</button>
    </div>
    </form>
</div>
</body>
</html>


