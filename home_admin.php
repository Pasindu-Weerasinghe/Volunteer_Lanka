<?php
include 'conn.php';
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
}
require 'Navbar/navbar_log.php';
?>
<?php
$sql = "SELECT AD_ID,Sponsor FROM advertisement";
$result = mysqli_query($conn, $sql);
$ads = mysqli_fetch_all($result, MYSQLI_ASSOC);
//images tika ad_image table eken
//advertiesment eken ganna wisthara tika
//sponsor name eka sponsor table eken ganna
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/admin_home.css">
    <link rel="stylesheet" href="styles/cards.css">
    <title>Admin Home Page</title>
</head>

<body>
    <div class="main" id="main">
        <!-- Advertiesment Reqests area -->
        <h2>Advertiesment Requests</h2><br><br>
        <section class="container">
            <?php foreach ($ads as $ad) {
                $adid = $ad['AD_ID'];
                $sponsor = $ad['Sponsor'];
            ?>
                <div class="card">
                    <?php $sql2 = "SELECT Image FROM ad_image WHERE $adid = AD_ID";
                    $result2 = mysqli_query($conn, $sql2);
                    while ($row = $result2->fetch_assoc()) {
                        $image = $row['Image']; ?>
                        <div class="card-image"><img id="cards" src="images/<?= $image ?>"></div>
                    <?php } ?>
                    <?php $sql3 = "SELECT Name FROM sponsor WHERE $sponsor = U_ID";
                    $result3 = mysqli_query($conn, $sql3);
                    while ($row = $result3->fetch_assoc()) {
                        $sponsorname = $row['Name']; ?>
                        <h2><?php echo $sponsorname ?></h2>
                    <?php } ?>


                    <a class="btn" href="view_ad_req.php">View</a>
                </div>
            <?php }
            ?>
        </section>
        <!-- Advertiesment Reqests area end-->
        <?php
        $sql4 = "SELECT C_ID,About,Complain,U_ID FROM complaints";
        $result4 = mysqli_query($conn, $sql4);
        $complaints = mysqli_fetch_all($result4, MYSQLI_ASSOC); ?>
        <!-- Complains Area -->
        <h2>Complains</h2><br><br>
            <?php
            foreach ($complaints as $row) {
                $complain_id = $row['C_ID'];
                $complain_about = $row['About'];
                $complain = $row['Complain'];
                $c_uid = $row['U_ID']; ?>
                <div id="c-box">
                    <div id="c-box-item">
                        <?php
                        $sql5 = "SELECT Role FROM user WHERE $c_uid = U_ID";
                        $result5 = mysqli_query($conn, $sql5);
                        $row = $result5->fetch_assoc();
                        $role = $row['Role'];

                        $sql6 = "SELECT Name FROM " . $role . " WHERE '$c_uid'";
                        $result6 = mysqli_query($conn, $sql6);
                        $name =  $result6->fetch_assoc()['Name'];

                        ?>
                        <h3 id="uname"><?php echo $name; ?></h3>
                        <button id="c-view-btn">View</button>
                    </div>
                    <p id="c-box-des"> <?php echo $complain ?></p>
                    <br>
                </div>
            <?php
            }
            ?>
    <br><br><br>




</body>

</html>