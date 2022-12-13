<?php
require 'conn.php';
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
}
$uid=$_SESSION['uid'];
require 'Navbar/navbar_log.php';
$sql = "SELECT P_ID, Name, Date FROM project";
$result = mysqli_query($conn, $sql);
$projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/cards.css">
    <title>Document</title>
</head>

<body>
    <div class="main" id="main">
    <div class="search-container">
                <br/><input type="text" name="search">
                <button name="search"><b>Search<b></button>
        </div><br><br><br>
        <h2>Sponsor Notices</h2><br><br>
        <section class="container">
            <?php foreach ($projects as $project) {
                $pid = $project['P_ID'] ?>
                <div class="card">
                    <?php $sql2 = "SELECT Image FROM pr_image WHERE $pid = P_ID";
                    $result2 = mysqli_query($conn, $sql2);

                    $sql3 ="SELECT Amount FROM sponsor_notice WHERE $pid=P_ID";
                    $result3=mysqli_query($conn, $sql3);
                    $amount=$result3->fetch_assoc();

                    while ($row = $result2->fetch_assoc()) {
                        $image = $row['Image']; ?>
                        <div class="card-image"><img id="cards" src="images/<?= $image ?>"></div>
                    <?php } ?>
                    <h2><?php echo ($project["Name"]); ?></h2>
                    <p>Amount:<?php echo ($amount['Amount']); ?></p>
                    <a class="btn" href="view_sponsor_notices.php?pid=<?php echo $project['P_ID'] ?>">View</a>
                </div>
            <?php } ?>
        </section>
    </div>



</body>

</html>