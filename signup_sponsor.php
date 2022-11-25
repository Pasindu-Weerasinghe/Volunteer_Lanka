<?php include('Navbar/navbar.php') ?>
<?php include 'conn.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/signup.css">
    <title>Signup for Sponsor</title>

<body>
    <form action="signup_auth.php" method="post" enctype="multipart/form-data">
        <div class="container">
            <h1>Signup as a Sponsor</h1><br />
            <hr>

            <label for="name"><b>Name</b></label>
            <input type="text" name="name" required>

            <label for="contact"><b>Contact Number</b></label>
            <input type="text" name="contact" required>

            <label for="address"><b>Address</b></label>
            <input type="text" name="address" required><br />

            <label for="type"><b>Select Your Type</b></label><br>


            <input type="radio" name="type" value="individual">
            <label >Individual</label><br>
            <input type="radio" name="type" value="organization">
            <label >Organization</label><br>
            <input type="radio" name="type" value="company">
            <label >Company</label><br>
            

            <br><br>
            <input type="checkbox" name="area5">
            <label for="area1">I have read and understand the <a href="#">terms and conditions</a> and will add here to them</label><br /><br />

            <div class="clearfix">
                <button class="cancel"><b>Cancel</b></button>
                <button name="signup" type="submit" class="next"><b>Submit</b></button>
            </div>

        </div>
    </form>
</body>
</head>

</html>