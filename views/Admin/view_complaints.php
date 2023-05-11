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
    <title>View Complaints</title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/view_ad_req.css">
</head>

<body>
<?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <h2>View Complaints</h2>
        <div id="ad-req-box">
            <div class="name">
                <h3 class="name-item">User Name:</h3>
                <h3 style="padding-top: 30px;"><?php echo $this->name['Name'];
        
        ?></h3>
            </div>
            <div class="name">
                <h3 class="name-item">About:</h3>
                <div id="ad-box-item">
                    <p><?php echo $this->complaint['Complain'] ?></p>
                </div>
            </div>
            <div id="btn-area">
                <!-- <button class="btn">Reject</button>
                <button class="btn">Accept</button> -->
            </div>

        </div>
        <br>

        <br>
    </div>
    
</body>

</html>