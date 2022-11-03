<?php include ('Navbar/navbar.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Signup/signup.css">
    <title>Signup for Volunteer</title>
    <body>
    <form action="signup_volunteer.php" method="post">
    <div class="container">
    <h1>Signup as a Volunteer</h1><br/><hr>
    
        <label for="name"><b>Name</b></label>
        <input type="text" name="name" required>

        <label for="contact"><b>Contact Number</b></label>
        <input type="text" name="contact" required>
        <label for="address"><b>Address</b></label>
        <input type="text" name="address" required><br/>

        <label><b>Select your interested areas for volunteering</b></label><br/>
        <input type="checkbox" name="area1">
        <label for="area1">Beach cleaning</label><br/>
        <input type="checkbox" name="area2">
        <label for="area1">Providing facilities to rural areas</label><br/>
        <input type="checkbox" name="area3">
        <label for="area1">Tree planting</label> <br/>
        <input type="checkbox" name="area4">
        <label for="area1">Helping child/adult orphanages</label><br/>
        <input type="checkbox" name="area5">
        <label for="area1">Animal rescuing/rehabilitation</label><br/><br/>


        <label><b>Select organizations you have already joined</b></label><br/>
        <input type="checkbox" name="area1">
        <label for="area1">Rotaract Club</label><br/>
        <input type="checkbox" name="area2">
        <label for="area1">IEEE society</label><br/>
        <input type="checkbox" name="area3">
        <label for="area1">AIESEC</label> <br/>
        <input type="checkbox" name="area4">
        <label for="area1">Leo Club</label><br/>
        <input type="checkbox" name="area5">
        <label for="area1">Lions Club</label><br/><br/>
        
        <div class="clearfix">
            <button class="cancel"><b>Cancel</b></button>
            <button class="next"><b>Submit</b></button>
        </div>

    </div>
    </form>
    </body>
</head>
</html>