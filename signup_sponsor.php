<?php include ('Navbar/navbar.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/signup.css">
    <title>Signup for Volunteer</title>
    <body>
    <form action="signup_sponsor.php" method="post">
    <div class="container">
    <h1>Signup as a Sponsor</h1><br/><hr>
    
        <label for="name"><b>Name</b></label>
        <input type="text" name="name" required>

        <label for="contact"><b>Contact Number</b></label>
        <input type="text" name="contact" required>

        <label for="address"><b>Address</b></label>
        <input type="text" name="address" required><br/>

        <label for="branch"><b>Branch</b></label>
        <input type="text" name="branch" required><br/>


        <div class="select">
        <label for="location"><b>Location</b></label>
        <select id="role" name="role" required>
            <option value="Colombo">Colombo</option>
            <option value="Gampaha">Gampaha</option>
            <option value="Galle">Galle</option>
            <option value="Matara">Matara</option>
            <option value="Kandy">Kandy</option>
        </select>
        </div>

        <input type="checkbox" name="area5">
        <label for="area1">I have read and understand the <a href="#">terms and conditions</a> and will add here to them</label><br/><br/>
        
        <div class="clearfix">
            <button class="cancel"><b>Cancel</b></button>
            <button class="next"><b>Submit</b></button>
        </div>

    </div>
    </form>
    </body>
</head>
</html>