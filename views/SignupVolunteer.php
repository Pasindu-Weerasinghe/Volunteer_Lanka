<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>public/styles/signup.css">
    <title>Signup for Volunteer</title>
</head>
<?php include 'views/includes/navbar.php'; ?>

<body>
    <div class="main">
        <form action="<?php echo BASE_URL . 'index/signup_finish/' . $_SESSION['role']; ?>" method="post" enctype="multipart/form-data">
            <div class="container1">
                <h1>Signup as a Volunteer</h1><br />
                <hr>

                <label for="name"><b>Name</b></label>
                <label id="require"><strong>*</strong></label>
                <input type="text" name="name" required>

                <label for="contact"><b>Contact Number</b></label>
                <label id="require"><strong>*</strong></label>
                <input type="text" name="contact" minlength="10" maxlength="10" required>

                <label for="address"><b>Address</b></label>
                <label id="require"><strong>*</strong></label>
                <textarea rows="4" name="address" style="resize: none;"></textarea>

                <label><b>Select your interested areas for volunteering</b></label><br /><br />
                <div class="checkbox_container ">
                    <input type="checkbox" name="area[]" value="Beach">
                    <label>Beach cleaning</label><br />
                    <input type="checkbox" name="area[]" value="Donation">
                    <label>Providing facilities to rural areas</label><br />
                    <input type="checkbox" name="area[]" value="Environment">
                    <label>Tree planting</label> <br />
                    <input type="checkbox" name="area[]" value="Orphan">
                    <label>Helping child/adult orphanages</label><br />
                    <input type="checkbox" name="area[]" value="Animal">
                    <label>Animal rescuing/rehabilitation</label><br /><br />
                </div>


                <label><b>Select organizations you have already joined</b></label><br /><br />
                <div class="checkbox_container">
                    <input type="checkbox" name="org[]" value="Rotaract Club">
                    <label for="org1">Rotaract Club</label><br />
                    <input type="checkbox" name="org[]" value="IEEE Society">
                    <label for="org2">IEEE society</label><br />
                    <input type="checkbox" name="org[]" value="AIESEC">
                    <label for="org3">AIESEC</label> <br />
                    <input type="checkbox" name="org[]" value="Leo Club">
                    <label for="org4">Leo Club</label><br />
                    <input type="checkbox" name="org[]" value="Lions Club">
                    <label for="org5">Lions Club</label><br /><br />
                </div>

                <input type="checkbox" required>
                <label for="area1">I have read and understand the <a href="#">terms and conditions</a> and will add here to them</label><br /><br />


                <div class="clearfix">
                    <button class="cancel"><b>Cancel</b></button>
                    <button name="submit" class="next"><b>Submit</b></button>
                </div>

            </div>
        </form>
    </div>
</body>

</html>