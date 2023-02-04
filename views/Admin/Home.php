
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
                    <a class="btn" href="view_ad_req.php?adid=<?php echo $adid ?>">View</a>
                </div>
            <?php } ?>
        </section>
        <!-- Advertiesment Reqests area end-->
        <?php
        // $sql4 = "SELECT C_ID,About,Complain,U_ID FROM complaints";
        // $result4 = mysqli_query($conn, $sql4);
        // $complaints = mysqli_fetch_all($result4, MYSQLI_ASSOC); ?>
        <!-- Complains Area -->
        <h2>Complaints</h2><br><br>
            <?php
            // foreach ($complaints as $row) {
            //     $complain_id = $row['C_ID'];
            //     $complain_about = $row['About'];
            //     $complain = $row['Complain'];
            //     $c_uid = $row['U_ID']; ?>
                <div id="c-box">
                    <div id="c-box-item">
                        <?php
                        // $sql5 = "SELECT Role FROM user WHERE $c_uid = U_ID";
                        // $result5 = mysqli_query($conn, $sql5);
                        // $row = $result5->fetch_assoc();
                        // $role = $row['Role'];

                        // $sql6 = "SELECT Name FROM " . $role . " WHERE '$c_uid'";
                        // $result6 = mysqli_query($conn, $sql6);
                        // $name =  $result6->fetch_assoc()['Name'];

                        ?>
                        <h3 id="uname"><?php ?></h3>
                        <button id="c-view-btn">View</button>
                    </div>
                    <p id="c-box-des"> <?php ?></p>
                    <br>
                </div>
            <?php
            // }
            ?>
    <br><br><br>




</body>

</html>