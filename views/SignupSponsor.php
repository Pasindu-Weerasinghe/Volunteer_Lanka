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
    <title>Signup for Sponsor</title>

<body>
    <?php include 'views/includes/navbar.php' ?>
    <div id="main" class="main">

        <div class="form2">
            <form action="<?php echo BASE_URL . 'index/signup_finish/' . $_SESSION['role']; ?>" method="post">
                <div class="container">
                    <h1>Signup as a Sponsor</h1><br />
                    <hr>

                    <label for="name"><b>Name</b></label>
                    <label id="require"><strong>*</strong></label>
                    <input type="text" name="name" required>

                    <label for="contact"><b>Contact Number</b></label>
                    <label id="require"><strong>*</strong></label>
                    <input type="text" name="contact" minlength="10" maxlength="10" required>

                    <label for="address"><b>Address</b></label>
                    <label id="require"><strong>*</strong></label>
                    <input type="text" name="address" required><br />

                    <label for="type"><b>Select Your Type</b></label>
                    <label id="require"><strong>*</strong></label><br>


                    <input type="radio" name="type" value="individual">
                    <label>Individual</label><br>
                    <input type="radio" name="type" value="organization">
                    <label>Organization</label><br>
                    <input type="radio" name="type" value="company">
                    <label>Company</label><br>


                    <br>
                    <input type="checkbox" name="area5">
                    <label for="area1">I have read and understand the <a href="<?php echo BASE_URL . 'index/condition/';?>">terms and conditions</a> and will add here to them</label><br /><br />

                    <div class=" clearfix">
                        <button class="cancel"><b>Cancel</b></button>
                        <button type="submit" id="submit" name="submit" class="next"><b>Submit</b></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>
</head>

</html>