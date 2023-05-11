<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/form.css">
    <title>Complain</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>

    <div id="main" class="main">
        <h2>Complain to Admin</h2><br />
        <h3>Your complaint will be considered by one of our admins. Do not provide false information in the below form.</h3>
        <form action="setComplain" method="post" id="form2">
            <div class="container">
                <h3>Send us your complaint</h3><br>
                <hr>

                <label for="uname"><b>Username</b></label>
                <input type="text" name="uname" value=<?php echo ($_SESSION['uname']) ?> readonly>

                <label for="about"><b>Complain about</b></label>
                <input type="text" name="about" required>

                <label for="des"><b>Description</b></label>
                <input type="text" class="des" name="des" required><br /><br />

                <button class="btn">Cancel</button>
                <button class="btn" name="complain" id="complain-btn">Complain</button>

            </div>
        </form>
    </div>
    
    <?php include 'views/includes/footer.php'; ?>
</body>

</html>