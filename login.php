<?php
$error = '';
require 'conn.php';
session_start();
if (isset($_REQUEST["login"])) {
    $uname = $_POST["uname"];
    $psw = $_POST["psw"];

    $sql = "SELECT * FROM user WHERE Email ='$uname'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $uid = $row['U_ID'];
        $hash_psw = $row['Password'];
        $email = $row['Email'];
        $role = $row['Role'];
        $status = $row['Status'];

        if (password_verify($psw, $hash_psw)) {
            if ($status != 'restricted') {

                $_SESSION['uid'] = $uid;
                $_SESSION['uname'] = $uname;
                $_SESSION['role'] = $role;

                switch ($role) {
                    case 'volunteer':
                        header('Location: home_volunteer.php');
                        break;

                    case 'admin':
                        header('Location: home_admin.php');
                        break;

                    case 'sponsor':
                        header('Location: home_sponsor.php');
                        break;
                }
            } else {
                $error = 'Your account is restricted';
            }
        } else {
            $error = 'Invalid Username or Password';
        }
    } else {
        $error = 'Invalid Username or Password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/login.css">
    <title>Login</title>
</head>

<body>
    <?php include 'Navbar/navbar.php'; ?>
    <div class="main">
        <form action="login.php" method="post">
            <div class="container">
                <h1>Login</h1>

                <?php
                if ($error != '') {
                    echo "<div id='error'>" . $error . "</div>";
                }
                ?>

                <label for="uname"><b>Username</b></label>
                <input type="email" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" name="psw" required>
                <span class="psw">Forgot <a href="#">password?</a></span>

                <button name="login" type="submit" id="login-btn">Login</button>
            </div><br />
            <span class="signup">Don't have an account? <a href="signup.php">Sign up</a></span>
        </form>
    </div>
</body>

</html>