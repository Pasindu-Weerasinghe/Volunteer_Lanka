<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>public/styles/signup.css">
    <title>Signup</title>
</head>

<body>

    <?php include 'views/includes/navbar.php'; ?>

    <form action="<?php echo BASE_URL; ?>index/signup_auth" method="post">
        <div class="container">
            <h1>Signup</h1><br /><br />
            <p>Passionate about volunteering? <b>Come join us</b></p>
            <hr>

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
                <a href="<?php echo BASE_URL; ?>"><button class="cancel">Cancel</button></a>
                <button type="submit" class="next" name="next">Next</button>
            </div>

        </div>
    </form>
</body>

</html>