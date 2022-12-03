<?php
session_start();
if (isset($_SESSION['uid'])) {
    header('Location: ' . BASE_URL . $_SESSION['role']);
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
    <?php include 'views/includes/navbar.php' ?>

    <div class="main" id="main">
        <?php include 'views/includes/cards.php' ?>
        <?php include 'views/includes/cards.php' ?>
        <?php include 'views/includes/cards.php' ?>
    </div>

</body>

</html>