<?php require_once('inc/conn.php'); ?>
<?php
session_start();
$error = '';
if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $psw = $_POST['psw'];

    $query = "SELECT * FROM user WHERE Email='$uname' AND Password='$psw' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // if query successful
        if (mysqli_num_rows($result) == 1) {
            // valid user found
            $user = $result->fetch_assoc();

            $uid = $user['U_ID'];
            $email = $user['Email'];
            $role = $user['Role'];
            $status = $user['Status'];

            if ($status != 'restricted') {
                // if user is not restricted
                $_SESSION['uid'] = $uid;
                $_SESSION['uname'] = $uname;
                header('Location: home_organizer.php');
            } else {
                // if user is restricted
                $error = "restricted";
            }
        } else {
            // Incorrect username or password
            $error = "incorrect";
        }
    } else {
        // if query failed
        echo "<script> alert ('Database query failed!');</script>";
        $error = "query failed";
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

<body>
    <?php include 'Navbar/navbar.php' ?>
    <form action="login.php" method="post">
        <div class="container">
            <h1>Login</h1>
            <?php 
            if($error == 'incorrect') {
                echo '<p id="error">Incorrect Username/Password</p>';
            }
            if ($error == 'restricted') {
                echo '<p id="error">Your account is restricted!</p>';
            }
            ?>
            
            <label for="uname"><b>Username</b></label>
            <input type="email" name="uname" placeholder="Email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" name="psw" placeholder="Password" required>
            <span class="psw">Forgot <a href="#">password?</a></span>

            <button type="submit" name="login">Login</button>
        </div><br />

        <span class="signup">Don't have an account? <a href="#">Sign up</a></span>
    </form>
</body>
</head>

</html>