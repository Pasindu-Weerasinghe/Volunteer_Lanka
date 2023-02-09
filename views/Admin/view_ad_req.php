<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('Location: ' . BASE_URL);
}
?>
<?php
// $adid = $_REQUEST["adid"];

// $sql1 = "SELECT Sponsor FROM advertisement WHERE $adid=AD_ID";
// $result1 = mysqli_query($conn, $sql1);
// if ($result1->num_rows > 0) {
//     while ($row = $result1->fetch_assoc()) {
//         $sponsor = $row['Sponsor'];
//     }
// }
// echo ($sponsor);
// $sql2 = "SELECT Image FROM ad_image WHERE $adid = AD_ID";
// $result2 = mysqli_query($conn, $sql2);
// if ($result2->num_rows > 0) {
//     while ($row = $result2->fetch_assoc()) {
//         $image = $row['Image'];
//     }
// }
// $sql3 = "SELECT Name FROM sponsor WHERE $sponsor = U_ID";
// $result3 = mysqli_query($conn, $sql3);
// if ($result3->num_rows > 0) {
//     while ($row = $result3->fetch_assoc()) {
//         $sponsorname = $row['Name'];
//     }
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Advertisement Requests</title>
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
            <div id="btn-area">
                <button class="btn">Reject</button>
                <button class="btn">Accept</button>
            </div>

        </div>
        <br>

        <br>
    </div>
</body>

</html>