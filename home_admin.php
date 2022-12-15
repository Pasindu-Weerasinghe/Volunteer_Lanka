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
                $adid = $ad['AD_ID'] ;
                $sponsor=$ad['Sponsor'];
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
            $conn->close(); ?>
        </section>
        <!-- Advertiesment Reqests area end-->
        <!-- Complains Area -->
        <h2>Complains</h2><br><br>
        
        <!-- Complains Area end-->
    </div>
    </div>
    <!-- <div class="main" id="main">
        <div class="main_container">
            <h2>Advertiesment Request</h2>
            <section class="ar-container">
                <div class="ar-card">
                    <div class="ar-img ar-card1"></div>
                    <button>View</button>
                </div>
                <div class="ar-card">
                    <div class="ar-img ar-card1"></div>
                    <button>View</button>
                </div>
                <div class="ar-card">
                    <div class="ar-img ar-card1"></div>
                    <button>View</button>
                </div>
            </section>


            <br>
            </div>
        <div class="main_container">
            <h2>Complaints</h2>
            <div id="c-box">
                <div id="c-box-item">
                    <h3>User Name</h3>
                    <button id="c-view-btn">View</button>
                </div>
                <p id="c-box-des"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, beatae quidem.
                    Accusantium voluptatem ipsam dolor, vel officiis, adipisci molestias ea voluptatum iure id
                    voluptatibus libero quam labore, animi odit. In!</p>
                <br>

            </div>
            <div id="c-box">
                <div id="c-box-item">
                    <h3>User Name</h3>
                    <button id="c-view-btn">View</button>
                </div>
                <p id="c-box-des"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, beatae quidem.
                    Accusantium voluptatem ipsam dolor, vel officiis, adipisci molestias ea voluptatum iure id
                    voluptatibus libero quam labore, animi odit. In!</p>
                <br>

            </div>
            <div id="c-box">
                <div id="c-box-item">
                    <h3>User Name</h3>
                    <button id="c-view-btn">View</button>
                </div>
                <p id="c-box-des"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, beatae quidem.
                    Accusantium voluptatem ipsam dolor, vel officiis, adipisci molestias ea voluptatum iure id
                    voluptatibus libero quam labore, animi odit. In!</p>
                <br>

            </div>
            <br>
        </div>
    </div> -->

</body>

</html>