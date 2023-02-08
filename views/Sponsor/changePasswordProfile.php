<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('Location: ' . BASE_URL);
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/password.css" text="text/css">
    <title>Changed Password</title>
</head>

<body>
    <?php include 'views/includes/navbar.php' ?>
    <div class ="main" id="main">
        <form method="POST" action="<?php echo BASE_URL; ?>Sponsor/ChangeProfilePsw">
            <p>Existing password<br />
                <input type="password" class="box" name="current" required />
            </p>
            <p>New password<br />
                <input type="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"  class="box" name="new" id="t1" required />
            </p>
            <p>Confirm password<br />
                <input type="password" name="confirm" required />
            </p>
           
            <button><a href="<?php echo BASE_URL ?> Sponsor/Profile" class="same">Back</a></button>
            <button name="submit" type="submit" >Save Password</button>
            <?php
            if (isset($this->error)) {
                echo '<label class="error">'.$this->error.'</label>';
            }?>

        </form>
    </div>
    
</body>

</html>