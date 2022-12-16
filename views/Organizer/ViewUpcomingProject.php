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
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/view.css">
    <title>Project Name</title>
</head>

<body>
    <!-- navigationb bar -->
    <?php include 'views/includes/navbar_log.php'; ?>

    <div class="main" id="main">
        <h2>Project Name</h2><br /><br />
        <div class="container">
            <div class="container-image">
                <image src="<?php echo BASE_URL ?>public/images/card-img1.jpg">
            </div>
            <div class="wrapper">
                <div class="left-div">
                    <label for="">Date</label><br>
                    <label for="">Time</label><br>
                    <label for="">Venue</label><br>
                    <label for="">Number of Volunteers</label><br>
                    <label for="">Description</label><br>
                </div>

                <div class="right-div">
                    <label id="data"><?php echo "2022-12-30"; ?></label><br>
                    <label id="data"><?php echo '11-30 AM'; ?></label><br>
                    <label id="data"><?php echo 'Galle'; ?></label><br>
                    <label id="data"><?php echo '25'; ?></label><br>
                    <label id="data"><?php echo 'Tree Planting Description'; ?></label><br>
                </div>
            </div>
            <div class="btn-area">
                <button class="btn" onclick="history.back()">Cancel Project</button>
                <button class="btn" id="right">Postpone Project</button>
            </div>
        </div>
    </div>

</body>

</html>