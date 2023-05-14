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
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/admin_home.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/cards.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/chat-icon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin Home Page</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>

    <div class="main" id="main">
        <!-- Advertiesment Reqests area -->
        <h2>Advertisement Requests</h2><br><br>
        <section class="container">
            <?php foreach ($this->ads as $ad) {
                if ($ad['Status'] == 'pending' && $ad['Reason'] == null) {
            ?>
                    <div class="card">
                        <div class="card-image"><img id="card-img" src="<?php echo BASE_URL ?>public/images/sp_images/<?php echo  $ad['Image'] ?>"></div>
                        <h2><?php echo $this->ad_sponsor_name[$ad['AD_ID']] ?></h2>
                        <a class="btn" href="<?php echo BASE_URL . 'admin/view_ad_req/' . $ad['AD_ID']; ?>">View</a>
                    </div>
            <?php }
            } ?>
        </section>
        <!-- Advertiesment Reqests area end-->
        <!-- Complaints area-->

        <h2>Complaints</h2><br><br>
        <?php
        foreach ($this->complaints as $complaint) {
            if ($complaint['Response'] == null) {
        ?>
                <div id="c-box">
                    <div id="c-box-item">
                        <h3 id="uname"><?php echo  $this->complain_userName[$complaint['C_ID']] ?></h3>
                        <button onclick="window.location.href='<?php echo BASE_URL . 'admin/view_complaints/' . $complaint['C_ID']; ?>'" id="c-view-btn">View</button>
                    </div>
                    <h4 id="c-box-des"><?php echo $this->complain_about[$complaint['C_ID']]  ?></h4>
                </div>
        <?php
            }
        }
        ?>
        <br><br><br>





</body>

</html>