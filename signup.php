<?php include ('Navbar/navbar.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/signup.css">
    <title>Signup</title>
    <body>
    <form action="signup_volunteer.php" method="post">
    <div class="container">
    <h1>Signup</h1><br/><br/>
    <p>Passionate about volunteering? <b>Come join us</b></p><hr>
    
        <label for="role"><b>Role</b></label>
        <div class="select">
        <select id="role" name="role" required>
            <option value="organizer">Organizer</option>
            <option value="volunteer">Volunteer</option>
            <option value="sponsor">Sponsor</option>
        </select>
        </div>

        <label for="email"><b>Email</b></label>
        <input type="text" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" name="psw" required>

        <label for="confirm-psw"><b>Confirm Password</b></label>
        <input type="password" name="confirm-psw" required>

        <div class="clearfix">
            <button class="cancel">Cancel</button>
            <button class="next">Next</button>
        </div>

        <!-- <?php 
            if (isset($_POST)) {
                // collect value of input field
                $_SESSION['email'] = $_POST['email'];
            }
        ?> -->

    </div>
    </form>
    </body>
</head>
</html>