<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/condition.css" text="text/css">
    <?php include 'views/includes/head-includes.php'; ?>
    <script src="https://kit.fontawesome.com/18409fd0c0.js" crossorigin="anonymous"></script>
    <title>Terms and Condition</title>
</head>
<?php include 'views/includes/navbar.php'; ?>

<body>
    <div class="main" id="main">


        <div class="form">
            <?php
            if ($_SESSION['role'] == "organizer") {
            ?>
                    <h2 style="text-align:center;">Signup as a <?php echo $_SESSION['role']; ?></h2><br><br>
                    <h3>Terms and Conditions</h3>
                    <ul class="ul1">
                        <li>12</li>
                        <li>12</li>
                        <li>46</li>
                    </ul>
            <?php
            }
            ?>

            <?php
            if ($_SESSION['role'] == "volunteer") {
            ?>
                    <h2 style="text-align:center;">Signup as a <?php echo $_SESSION['role']; ?></h2><br><br>
                    <h3>Terms and Conditions</h3>
                    <ul class="ul1">
                        <li>12</li>
                        <li>12</li>
                        <li>46</li>
                    </ul>
            
            <?php
            }
            ?>

            <?php
            if ($_SESSION['role'] == "sponsor") {
            ?>
                    <h2 style="text-align:center;">Signup as a <?php echo $_SESSION['role']; ?></h2><br><br>
                    <h3>Terms and Conditions</h3>
                    <ul class="ul1">
                        <li>You can sponsor any project, but you can only sponsor each project once. </li>
                        <li>You can publish an advertisement only for projects that you have sponsored. However, you are only permitted to publish one advertisement per sponsored project.</li>
                        <li>There are four sponsorship packages available("SILVER,GOLD,PLATINUM and OTHER"). You cannot sponsor any amount; you can only sponsor an amount between the remaining balance and the minimum sponsorship amount for each package.</li>
                        <li>The remaining amount will be displayed for each project, and the minimum sponsorship amount is typically assumed to be Rs1000. However, if there is a silver package that costs less than Rs1000, the minimum sponsorship amount will be calculated as the silver package amount minus Rs200.</li>
                        <li>The amount for OTHER packages will be calculated between the minimum amount of Rs1000.00 and the amount of the silver package.</li>
                        <li>You can submit a complaint to the admin regarding any issue. However please note that for security purposes, the admin will save the sender's email and complaint in our database </li>
                        <li>You can change your password as needed, but every password should include at least one lowercase letter [a-z], one uppercase letter [A-Z], one number [1-9], and one symbol.</li>
                    </ul>
            <?php
            }
            ?>

            <?php
            if ($_SESSION['role'] == "admin") {
            ?>
                <div>
                    <h2>Signup as a <?php echo $_SESSION['role']; ?></h2><br><br>
                    <h3>Terms and Conditions</h3>
                    <ul >
                        <li>12</li>
                        <li>12</li>
                        <li>46</li>
                    </ul>
            <?php
            }
            ?>

        </div><br>
    </div>
</body>

</html>