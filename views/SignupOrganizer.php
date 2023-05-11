<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/includes/head-includes.php'; ?>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>public/styles/signup.css">
    <title>Signup for Volunteer</title>
</head>

<body>

    <?php include 'views/includes/navbar.php'; ?>
    <div class="main" id="main">

        <form action="<?php echo BASE_URL . 'index/signup_finish/' . $_SESSION['role']; ?>" method="post">

            <div class="container">
                <h1>Signup as an Organizer</h1><br />

                <label><b>Name</b></label>
                <input type="text" name="name" required>
                <label><b>Contact Number</b></label>
                <input type="text" name="contact" minlength="10" maxlength="10" required>
                <label><b>Address</b></label>
                <input type="text" name="address" required><br />
                <label><b>Branch</b></label>
                <input type="text" name="branch" required><br />
                <label><b>Number of members</b></label>
                <input type="number" name="no-of-members" id="no-of-members" min="1" required><br />

                <input type="checkbox" name="agree" id="chkbox" required>
                <label>I have read and understand the <a href="">terms and conditions</a> and will adhere to them.</label><br />

                <div class=" clearfix">
                    <button class="cancel"><b>Cancel</b></button>
                    <button type="submit" id="submit" name="submit" class="next"><b>Submit</b></button>
                </div>
        </form>

    </div>
</body>

</html>