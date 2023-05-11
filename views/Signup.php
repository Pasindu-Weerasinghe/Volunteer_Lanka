<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include 'views/includes/head-includes.php'; ?>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>public/styles/signup.css">
    <title>Signup</title>
</head>

<body>

    <?php include 'views/includes/navbar.php'; ?>
    <br>
    <br>
    <br>
    <br>
    <form action="<?php echo BASE_URL; ?>index/signup_auth" method="post">
        <div class="container">
            <h1>Signup</h1><br>
            <!-- <hr> -->
            <?php
            if ($this->error == 'email exists') {
                echo '<p id="error">Email exists!</p>';
            }
            if ($this->error == 'password does not match') {
                echo '<p id="error">Password does not match!</p>';
            }
            ?>
            <label for="role"><b>Role</b></label>
            <div class="select">
                <select id="role" name="role" required>
                    <option value="organizer">Organizer</option>
                    <option value="volunteer">Volunteer</option>
                    <option value="sponsor">Sponsor</option>
                </select>
            </div>

            <label for="email"><b>Email</b></label>
            <input id="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input id="psw" type="password" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>

            <label for="confirm-psw"><b>Confirm Password</b></label>
            <input id="confirm-psw" type="password" name="confirm-psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <!-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" -->
            <div class="clearfix">
                <a href="<?php echo BASE_URL; ?>"><button class="cancel">Cancel</button></a>
                <button type="submit" class="next" name="next">Next</button>
            </div>

        </div>
    </form>
</body>

</html>