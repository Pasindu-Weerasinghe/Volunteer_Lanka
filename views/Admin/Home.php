<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/admin_home.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/cards.css">
    <title>Admin Home Page</title>
</head>

<body>
     <?php include 'views/includes/navbar_log.php'; ?> 
    <div class="main" id="main">
        <!-- Advertiesment Reqests area -->
        <h2>Advertisement Requests</h2><br><br>
        <section class="container">
            <?php foreach ($this->ads as $ad) {

            ?>
                <div class="card">
                    <div class="card-image"><img id="card-img" src="<?php echo BASE_URL ?>public/images/<?php echo  $this->adimages[$ad['AD_ID']] ?>"></div>
                    <h2><?php echo $this->ad_sponsor_name[$ad['AD_ID']] ?></h2>
                    <a class="btn" href="<?php echo BASE_URL . 'admin/view_ad_req/' . $ad['AD_ID']; ?>">View</a>
                </div>
            <?php } ?>
        </section>
        <!-- Advertiesment Reqests area end-->
        <!-- Complaints area-->

        <h2>Complaints</h2><br><br>
        <?php
        foreach ($this->complaints as $complaint){
        ?>
            <div id="c-box">
                <div id="c-box-item" >
                    <h3 id="uname">Pasindu Weerasinghe</h3>
                    <button id="c-view-btn">View</button>
                </div>
                <p id="c-box-des">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates fuga repellat quaerat natus reprehenderit reiciendis quidem rem error, deserunt adipisci saepe explicabo. Fugit, delectus? Dolorem cupiditate saepe quae laborum quibusdam?</p>
            </div>
        <?php
        }
        ?>
        <br><br><br>




</body>

</html>