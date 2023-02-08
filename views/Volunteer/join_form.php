<?php 
require 'conn.php';
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/form.css">
    <title>Join Form</title>
</head>
<body>
<?php include 'views/includes/navbar_log.php'; ?>
<div id="main" class="main">
    <h2>Fill this form and join the project</h2><br/>
    <form action="join_form.php" method="post">
    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" name="uname" value=<?php echo ($_SESSION['uname']) ?> readonly>

        <br><br><label for="about"><b>Meal Preference</b></label><br><br>
        <input type="radio" id="veg"> Vegetarian &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <input type="radio" id="non-veg"> Non Vegetarian<br><br>

        <label for="des"><b>Have you participated in volunteering projects before?</b></label><br><br>
        <input type="radio" id="yes"> Yes &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <input type="radio" id="no"> No<br><br>

        <button class="cancel">Cancel</button>
        <button class="next" name="complain">Submit</button>
        
    </div>
    </form>
</div>
</body>
</html>


