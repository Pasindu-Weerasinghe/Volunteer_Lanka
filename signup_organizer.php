<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Signup/signup.css">
    <title>Signup for Volunteer</title>

<body>
    <?php include('Navbar/navbar.php') ?>
    <form action="signup_volunteer.php" method="post">
        <div class="container">
            <h1>Signup as a Organizer</h1><br />
            <hr>

            <label for="name"><b>Name</b></label>
            <input type="text" name="name" required>
            <label for="contact"><b>Contact Number</b></label>
            <input type="text" name="contact" required>
            <label for="address"><b>Address</b></label>
            <input type="text" name="address" required><br />
            <label for="branch"><b>Branch</b></label>
            <input type="text" name="branch" required><br />
            <label for="no-of-members"><b>Number of members</b></label>
            <div><input type="number" name="no-of-members" id="no-of-members" min="1" required><br /></div>
            <label for="location"><b>Location</b></label>
            <input type="text" name="location" required><br />

            <input type="checkbox" name="agree">
            <label for="agree">I have read and understand the <a href="">terms and conditions</a> and will adhere to them.</label><br />

            <div class="clearfix">
                <button class="cancel"><b>Cancel</b></button>
                <button class="next"><b>Submit</b></button>
            </div>

        </div>
    </form>
</body>
</head>

</html>