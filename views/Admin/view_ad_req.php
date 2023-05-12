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
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/popup.css">
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
            <div class="name">
                <h3 class="name-item">Description:</h3>
                <div id="ad-box-item">
                    <p><?php echo $this->ad['Description'] ?></p>
                </div>
            </div>
            <br><br>
            <div id="btn-area">
                <button class="btn" id="reject-btn">Reject</button>
                <button onclick="window.location.href='<?php echo BASE_URL . 'admin/accept_ad_req/' . $this->ad['AD_ID']; ?>'" class="btn">Accept</button>
            </div>

        </div>
        <br>

        <br>
    </div>
    <div class="popup-bg" style="display:none;">
        <div class="popup">
            <!--close button-->
            <div class="popup-close"><i class="fa-solid fa-xmark"></i></div>
            <h2>Rsponse</h2>
            <form id="edit-pr-form" method="post" action="<?php echo BASE_URL ?>">
                <textarea name="reson" id="reson" value="<?php  ?>" required></textarea>
                <button class="btn" type="submit" name="edit-project" id="edit-project">Send</button>
            </form>
            
        </div>
    </div>
    
</body>
<script>
    const popupbg = document.querySelector(".popup-bg");
    const popup = document.querySelector(".popup");
    const popupCloseBtn = document.querySelector(".popup-close");
    const rejectBtn = document.querySelector("#reject-btn");

    rejectBtn.addEventListener("click",() =>{
        popupbg.style.display="flex";
    });
    popupCloseBtn.addEventListener("click",() =>{
        popupbg.style.display="none";
    });


</script>

</html>