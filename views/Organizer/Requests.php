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
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/cards.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/requests.css">
    <title>Requests from Volunteers</title>
</head>

<body>
    <!-- navigation bar -->
    <?php include 'views/includes/navbar_log.php'; ?>

    <div class="main" id="main">
        <h2>Requests from Volunteers</h2><br /><br />
        <div class="request">

            <div id="volunteer">
                <img src="<?php echo BASE_URL; ?>public/images/org_image.png">
                <div>
                    <h3>Volunteer Name</h3>
                </div>
            </div>

            <div class="images-container">
                <img src="<?php echo BASE_URL; ?>public/images/card-img1.jpg">
                <img src="<?php echo BASE_URL; ?>public/images/card-img2.jpg">
                <img src="<?php echo BASE_URL; ?>public/images/card-img3.jpg">
            </div>
            <p>
            <h3>Location</h3>
            </p>
            <p id="description">Description</p>

        </div>


    </div>

</body>

</html>