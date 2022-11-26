<?php include ('Navbar/navbar.php') ?>
<?php include 'conn.php';
    $_SESSION['role'] = $_POST['role'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['psw'] = $_POST['psw'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/signup.css">
    <title>Signup for Volunteer</title>
</head>
    <body>
    <div class="main">
    <form action="signup_auth.php" method="post" enctype="multipart/form-data">
    <div class="container">
    <h1>Signup as a Volunteer</h1><br/><hr>
    
        <label for="name"><b>Name</b></label>
        <input type="text" name="name" required>

        <label for="contact"><b>Contact Number</b></label>
        <input type="text" name="contact" required>
        <label for="address"><b>Address</b></label>
        <input type="text" name="address" required><br/>

        <label><b>Select your interested areas for volunteering</b></label><br/>
        <input type="checkbox" name="area[]" value="Beach cleaning">
        <label>Beach cleaning</label><br/>
        <input type="checkbox" name="area[]" value="Providing facilities to rural areas">
        <label>Providing facilities to rural areas</label><br/>
        <input type="checkbox" name="area[]" value="Tree planting">
        <label>Tree planting</label> <br/>
        <input type="checkbox" name="area[]" value="Helping child/adult orphanages">
        <label>Helping child/adult orphanages</label><br/>
        <input type="checkbox" name="area[]" value="Animal rescuing/rehabilitation">
        <label>Animal rescuing/rehabilitation</label><br/><br/>


        <label><b>Select organizations you have already joined</b></label><br/>
        <input type="checkbox" name="org[]" value="Rotaract Club">
        <label for="org1">Rotaract Club</label><br/>
        <input type="checkbox" name="org[]" value="IEEE Society">
        <label for="org2">IEEE society</label><br/>
        <input type="checkbox" name="org[]" value="AIESEC">
        <label for="org3">AIESEC</label> <br/>
        <input type="checkbox" name="org[]" value="Leo Club">
        <label for="org4">Leo Club</label><br/>
        <input type="checkbox" name="org[]" value="Lions Club">
        <label for="org5">Lions Club</label><br/><br/>
        
        <div class="buttons">
            <button class="cancel"><b>Cancel</b></button>
            <button name="signup" class="next"><b>Submit</b></button>
        </div>

    </div>
    </form>
    </div>
    </body>
</html>