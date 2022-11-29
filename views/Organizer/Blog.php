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
    <!-- navigationb bar -->
    <?php include 'views/includes/navbar_log.php'; ?>

    <div class="main">
        <!-- organization start -->
        <div class="organization">
            <div id="left">
                <img src="<?php echo BASE_URL; ?>public/images/org_image.png">
                <h3>Organiztion Name</h3>
            </div>
            <div id="right">
                <p>uyhg duyhsgf jhdsg afhgfhjasdfh adfhads vfhgavfd vhgfvasg hdfv hgsd vfhgdvf hgds
                    shgda hgads gshdahd fashfbcshdf hgsdbvhdbf jhdbbjhsbdc jhsbcjhs bcjhbdcjhs bdcjhch jsbd csh
                </p>
            </div>
        </div>
        <!-- organization end -->

        <!-- ***posts*** -->
        <div class="post-container">
            <div class="post-images">
                <img src="<?php echo BASE_URL; ?>public/images/card-img1.jpg">
                <img src="<?php echo BASE_URL; ?>public/images/card-img2.jpg">
                <img src="<?php echo BASE_URL; ?>public/images/card-img3.jpg">
            </div>
            <p class="description">

            </p>
        </div>
    </div>

</body>

</html>