<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('Location: ' . BASE_URL);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/complain.css">
    <title>Complain</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>

    <div id="main" class="main">
        <h2>Complain to Admin</h2><br />
        <label id="complain">Your complaint will be considered by one of our admins. Do not provide false information in the below form.</label>
        <form action="complain.php" method="post">
            <div class="container">
                <p id="send">Send us your complaint</p><br>
                <hr>

                <label for="uname"><b>Username</b></label>
                <input type="text" name="uname" value=<?php echo ($_SESSION['uname']) ?> readonly>

                <label for="about"><b>Complain about</b></label>
                <input type="text" name="about" required>

                <label for="des"><b>Description</b></label>
                <input type="text" name="des" required><br /><br />

                <button class="cancel">Cancel</button>
                <button class="next" name="complain">Complain</button>

            </div>
        </form>
    </div>
</body>

</html>