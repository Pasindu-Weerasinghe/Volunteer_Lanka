<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('Location: ' . BASE_URL);
}

// $uid = $_SESSION['uid'];
// require 'Navbar/navbar_log.php';
// $sql = "SELECT P_ID, Name, Date FROM project WHERE Sponsor = 1";
// $result = mysqli_query($conn, $sql);
// $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/stylescards.css">
    <title>Home</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <div class="search-container">
            <br /><input type="text" name="search">
            <button name="search"><b>Search<b></button>
        </div><br>
        <h2>Sponsor Notices</h2><br><br>
        <section class="container">
            <?php foreach ($this->projects as $project) {
                $pid = $project['P_ID'] ?>
                <div class="card">
                    <!-- <?php $sql2 = "SELECT Image FROM pr_image WHERE $pid = P_ID";
                            $result2 = mysqli_query($conn, $sql2);

                            $sql3 = "SELECT Amount FROM sponsor_notice WHERE $pid=P_ID";
                            $result3 = mysqli_query($conn, $sql3);
                            $amount = $result3->fetch_assoc();

                            while ($row = $result2->fetch_assoc()) {
                                $image = $row['Image']; ?>
                        <div class="card-image"><img id="cards" src="images/<?= $image ?>"></div>
                    <?php } ?> -->
                    <h2><?php echo ($project["Name"]); ?></h2>
                    <p>Amount : LKR </p>
                    <a class="btn" href="view_sponsor_notices.php?pid=<?php echo $project['P_ID'] ?>">View</a>
                </div>
            <?php } ?>
        </section>
    </div>

    <!-- <?php
    if ($amount != null) {
        echo ($amount['Amount']);
    } else {
        echo "0";
    }
    ?> -->

</body>

</html>