
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Advertisement Requests</title>
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/view_ad_req.css">
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <h2>View Advertisement</h2>
        <div id="ad-req-box">
            <div class="name">
                <h3 class="name-item">Advertisement:</h3>
                <div id="ad-box-item">
                    <img id="ad-img-vol" src="<?php echo BASE_URL ?>public/images/sp_images/<?php echo  $this->adImage[0]['Image'] ?>" alt="">
                </div>
            </div>
            <div class="name">
                <h3 class="name-item">Description:</h3>
                <div id="ad-box-item">
                    <p><?php echo $this->ad[0]['Description'] ?></p>
                </div>
            </div>
            <br><br>
            <div id="btn-area">
                <button class="btn" id="reject-btn" onclick="history.back()">Back</button>
            </div>

        </div>
        <br>

        <br>
    </div>

</body>

</html>