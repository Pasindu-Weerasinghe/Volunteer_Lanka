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
    <!-- <link rel="stylesheet" href="cards/cards.css"> -->
    <title>Complain</title>
</head>
<body>
<div id="main" class="main">
    <h2><br/>Complain to Admin</h2><br/>
    <h4>Your complaint will be considered by one of our admins. Do not provide false information in the below form.</h4>
    <form action="complain.php" method="post">
    <div class="container">
        <p>Send us your complain about another user or any other general issue</p><hr>
    
        <label for="uname"><b>Username</b></label>
        <input type="text" name="uname" value=<?php echo ($_SESSION['uname']) ?> readonly>

        <label for="about"><b>Complain about</b></label>
        <input type="text" name="about" required>

        <label for="des"><b>Description</b></label>
        <input type="text" name="des" required><br/><br/>

        <button class="cancel">Cancel</button>
        <button class="next" name="complain">Complain</button>
        
    </div>
    </form>
</div>
</body>
</html>


