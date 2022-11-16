<?php
include 'conn.php';
$error = null;

if (isset($_POST["submit"])) {

    $role = $_POST['role'];
    $email = $_POST['email'];
    $psw = $_POST['psw'];
    $confirm = $_POST['confirm-psw'];

    if ($confirm == $psw) {
        $query1 = "INSERT INTO user (Email, Password, Role, Status, Restricted) values ( '$email', '$psw', '$role','active', '0')";
        $result1 = mysqli_query($conn, $query1);
        header("Location:signup_sponsor.php");

       
    } else {
        $error = "Password is not matched!";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/signup.css">
    <title>Signup</title>

<body>
    <form action="" method="post">
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
            <input type="email" name="email" required><br>

            <label for="psw"><b>Password</b></label>
            <input type="password" name="psw" required>

            <label for="confirm-psw"><b>Confirm Password</b></label>
            <input type="password" name="confirm-psw" required>
            
            <div class="clearfix">
                <button class="cancel">Cancel</button>
                <button class="next" name="submit">Next</button>
            </div>

            <label class="error">
                <?php echo $error ?>
            </label>

        </div>
    </form>
    
</body>
</head>

</html>