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
    <title>View Advertisement Requests</title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/view_ad_req.css">
</head>

<body>
<?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <h2>View Advertisement Requests</h2>
        <div id="ad-req-box">
            <div class="name">
                <h3 class="name-item">Sponsor Name:</h3>
                <h3 style="padding-top: 30px;"><?php echo $this->sponsor_name ?></h3>
            </div>
            <div class="name">
                <h3 class="name-item">Advertisement:</h3>
                <div id="ad-box-item">
                    <img id="ad-box-img" src="<?php echo BASE_URL ?>public/images/<?php echo  $this->image ?>" alt="">
                </div>
            </div>
            <div id="btn-area">
                <button class="btn">Reject</button>
                <button onclick="window.location.href='<?php echo BASE_URL . 'admin/accept_ad_req/' . $this->ad['AD_ID']; ?>'" class="btn">Accept</button>
            </div>

        </div>
        <br>

        <br>
    </div>
    <?php 
    print_r($this->ad)
    ?>
</body>

</html>