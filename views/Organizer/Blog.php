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
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/blog.css">
    <title>My Blog</title>
</head>

<body>
    <!-- navigation bar -->
    <?php include 'views/includes/navbar_log.php'; ?>

    <div class="main" id="main">
        <!-- organization start -->
        <div class="organization">
            <div id="left">
                <img src="<?php echo BASE_URL; ?>public/images/org_image.jpg">
                <h3><?php echo $this->organizer['Name']; ?></h3>
            </div>
            <div id="right">
                <!-- <p>A proud member of the Colombo Uptown Rotary family, the Rotaract Club of University of Colombo, Faculty of Arts was charted on the 26th of March 2010. The Club slogan, "United We Stand in Diversity", represents our hope for the club as well as our country. During the period since its charter, the club has been recognised at the District Rotaract Assembly for its numerous projects along with the Rotary and Rotaract district citations and recognition as one of the best reporting clubs.</p> -->
                <p><b>No of members:</b> <?php echo $this->organizer['No_of_members']; ?></p>
                <p><b>Branch:</b> <?php echo $this->organizer['Branch']; ?></p>
                <p><b>Contact:</b> <?php echo $this->organizer['Contact']; ?></p>
                <p><b>No of projects organized:</b> <?php echo $this->no_of_projects; ?></p>
                <P><b>No of completed projects:</b> <?php echo $this->no_of_completed_projects; ?></p>
            </div>
        </div>
        <!-- organization end -->
        
        <!-- ***posts*** -->
        <div class="post-container">
            <center>
                <h2 class="post-header">Tree Planting Campaign</h2>
            </center>
            <div class="post-images">
                <img src="<?php echo BASE_URL; ?>public/images/card-img1.jpg">
                <img src="<?php echo BASE_URL; ?>public/images/card-img2.jpg">
                <img src="<?php echo BASE_URL; ?>public/images/card-img3.jpg">
            </div>
            <p class="description">
                A tree planting campaign was organized on 26th November 2022. Around 80 members participated in the campaign.
            </p>
        </div>

        <div class="post-container">
            <center>
                <h2 class="post-header">Beach Cleaning</h2>
            </center>
            <div class="post-images">
                <img src="<?php echo BASE_URL; ?>public/images/pr_images/cleaning.jpg">
            </div>
            <p class="description">
                A beach cleaning event was organized on 20 October 2022. Around 50 members participated in the event.
            </p>
        </div>
    </div>

</body>

</html>