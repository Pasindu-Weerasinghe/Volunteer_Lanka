<?php include 'Navbar/navbar.php' ?>
<style><?php include ('Navbar/navbar.css') ?></style>

<?php 
    //connect to database
    $conn = mysqli_connect('localhost', 'volunteer_lanka', 'VolunteerLanka', 'volunteer_lanka');

    if (!$conn) {
        echo 'Connection error: '.mysqli_connect_error();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Lanka</title>
</head>
<body>
<?php include'cards/cards.php'?>
<?php include'cards/cards.php'?>
<?php include'cards/cards.php'?>
</body>
</html>
