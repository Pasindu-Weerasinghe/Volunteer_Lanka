<?php include ('Navbar/navbar.php')?>
<?php include 'conn.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/signup.css">
    <title>Signup</title>
</head>
    <body>
    <div class="main">
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
        <input type="email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" name="psw" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
        title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">

        <label for="confirm-psw"><b>Confirm Password</b></label>
        <input type="password" name="confirm-psw" required>

        <div class="clearfix">
            <button class="cancel">Cancel</button>
            <button class="next" name="next">Next</button>
        </div>
    </div>
    </form>
    </div>
    </body>
</html>