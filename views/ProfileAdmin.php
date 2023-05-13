<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/blog.css">
    <title>My Blog</title>
</head>
<body>
<?php include 'views/includes/navbar_log.php'; ?>

<div class="main" id="main">
    <!-- organization start -->
    <div class="organization">
        <div id="left">
            <img src="<?php echo BASE_URL; ?>public/images/profile.jpg" alt="">
            <h3><?php echo $this->profile['Name']; ?></h3>
        </div>
        <div id="right">
            <!-- <p>A proud member of the Colombo Uptown Rotary family, the Rotaract Club of University of Colombo, Faculty of Arts was charted on the 26th of March 2010. The Club slogan, "United We Stand in Diversity", represents our hope for the club as well as our country. During the period since its charter, the club has been recognised at the District Rotaract Assembly for its numerous projects along with the Rotary and Rotaract district citations and recognition as one of the best reporting clubs.</p> -->
            <p><b>User ID:</b> <?php echo $this->profile['U_ID'];  ?></p>
           
            
        </div>
    </div>
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
            $u_id = $this->profile['U_ID'];
            $status = $this->profile['Status'];
            include 'views/includes/only_admin.php';
        }
        ?>
    </div>
</body>
</html>