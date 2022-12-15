<?php include('Navbar/navbar.php');
include 'conn.php';

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
    <div class="main" id="main">
        <div class="form2">
            <form action="signup_auth.php" method="post" enctype="multipart/form-data">
                <div class="container">
                    <h1>Signup as a Sponsor</h1><br />
                    <hr>

                    <label for="name"><b>Name</b></label>
                    <label id="require"><strong>*</strong></label>
                    <input type="text" name="name" required>

                    <label for="contact"><b>Contact Number</b></label>
                    <label id="require"><strong>*</strong></label>
                    <input type="text" name="contact" required>

                    <label for="address"><b>Address</b></label>
                    <label id="require"><strong>*</strong></label>
                    <textarea rows="4" name="address" style="resize: none;"></textarea>

                    <label for="type"><b>Select Your Type</b></label>
                    <label id="require"><strong>*</strong></label><br>


                    <div class="checkbox_container">
                        <input type="radio" name="type" value="individual" required>
                        <label>Individual</label><br>
                        <input type="radio" name="type" value="organization" required>
                        <label>Organization</label><br>
                        <input type="radio" name="type" value="company" required>
                        <label>Company</label><br>
                    </div>

                    <br>
                    <input type="checkbox" required>
                    <label for="area1">I have read and understand the <a href="#">terms and conditions</a> and will add here to them</label><br /><br />

                    <div class="clearfix">
                        <button class="cancel"><b>Cancel</b></button>
                        <button name="signup" type="submit" class="next"><b>Submit</b></button>
                    </div>

                </div>
            </form>
        </div>
    </div>


</body>
</head>

</html>