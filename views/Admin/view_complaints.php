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
                <h3 style="padding-top: 30px;"></h3>
            </div>
            <div class="name">
                <h3 class="name-item">About:</h3>
                <div id="ad-box-item">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi error adipisci voluptas rem ducimus qui ad labore pariatur delectus consectetur, omnis sed modi obcaecati accusamus quod illum, molestias inventore quasi! Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, hic atque fugit animi fuga magni vero quaerat ipsa consectetur, officia autem similique. Fugiat tenetur voluptas eum adipisci corrupti praesentium pariatur.</p>
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