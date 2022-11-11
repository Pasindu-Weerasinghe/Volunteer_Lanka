<?php include ('Navbar/navbar.php') ?>
<?php include 'sidenav/sidenav.php' ?>

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

        <label for="type"><b>Select Your Type</b></label><br>
        
        
        <input  type="radio"  name="individual"> 
        <label for="individual">Individual</label><br>
        <input type="radio" name="organization">
        <label for="organization">Organization</label><br>
        <input type="radio" name="company">
        <label for="company">Company</label>
       
        
        
        <br><br>
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