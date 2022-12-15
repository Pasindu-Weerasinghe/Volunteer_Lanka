<?php
include 'conn.php';
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
}
require 'Navbar/navbar_log.php';
?>
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/advertiesment_requests.css">
    <link rel="stylesheet" href="styles/cards.css">
    <title>Ad Requests</title>
</head>

<body>
    <div class="main" id="main">
        <h2 style="margin-bottom: 50px;">Advertisement Request</h2>
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
                        <div class="card-image"><img id="cards" src="images/<?php echo $image ?>"></div>
                    <?php } ?>
                    <?php $sql3 = "SELECT Name FROM sponsor WHERE $sponsor = U_ID";
                    $result3 = mysqli_query($conn, $sql3);
                    while ($row = $result3->fetch_assoc()) {
                        $sponsorname = $row['Name']; ?>
                        <h2><?php echo $sponsorname ?></h2>
                    <?php } ?>

                    <a class="btn" href="view_ad_req.php?adid=<?php echo $adid ?>">View</a>
                </div>
            <?php }
            ?>
        </section>
        <br>
        <button id="back-btn" onclick="window.location.href='home_admin.php'">Back</button>
        <br><br>
    </div>

</body>

</html>