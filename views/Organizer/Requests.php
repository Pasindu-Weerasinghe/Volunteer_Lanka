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
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/requests.css">
    <title>Requests from Volunteers</title>
</head>

<body>
    <!-- navigation bar -->
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <h2>Requests from Volunteers</h2><br>
        <?php foreach ($this->pr_ideas as $idea) { ?>


            <div class="request">

                <div id="volunteer">
                    <img src="<?php echo BASE_URL; ?>public/images/org_image.png">
                    <div>
                        <h3><?php echo $this->pi_vol_name[$idea['PI_ID']]; ?></h3>
                    </div>
                </div>

                <div class="images-container">
                    <?php foreach ($this->pr_idea_images[$idea['PI_ID']] as $images) { ?>
                        <img src="<?php echo BASE_URL; ?>public/images/pi_images/<?php echo $images['Image']; ?>">
                    <?php } ?>
                </div>
                <p>
                <h3><?php echo $idea['Location'] ?></h3>
                </p>
                <p id="description"><?php echo $idea['Description'] ?></p>

            </div>
        <?php } ?>


    </div>

</body>

</html>