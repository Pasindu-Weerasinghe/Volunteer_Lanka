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
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/cards.css">
    <title>Home</title>
</head>

<body>
<?php include 'views/includes/navbar_log.php'; ?>
    <div id="main" class="main">
        <div class="search-container">
            <input type="text" name="search">
            <button name="search"><b>Search<b></button>
        </div><br>

        <h2>Sponsored Projects</h2><br /><br />
        <section class="container">
            <div class="card">
                <div class="card-image">
                    <img src="<?php echo BASE_URL ?>public/images/tree.jpg" id="card-img">
                </div>
                <h2>Tree Planting</h2>
                <p>2022-12-30</p>
                <a class="btn" href="<?php echo BASE_URL . 'Sponsor/view_sponsor_notices'; ?>">View</a>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="<?php echo BASE_URL ?>public/images/clean.jpeg" id="card-img">
                </div>
                <h2>Beach Cleaning</h2>
                <p>2023-01-10</p>
                <a class="btn" href="<?php echo BASE_URL . 'Sponsor/view_sponsor_notices'; ?>">View</a>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="<?php echo BASE_URL ?>public/images/donate.jpg" id="card-img">
                </div>
                <h2>Book Donation</h2>
                <p>2023-01-20</p>
                <a class="btn" href="<?php echo BASE_URL . 'Sponsor/view_sponsor_notices'; ?>">View</a>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="<?php echo BASE_URL ?>public/images/tree.jpg" id="card-img">
                </div>
                <h2>Tree Planting</h2>
                <p>2022-12-30</p>
                <a class="btn" href="<?php echo BASE_URL . 'Sponsor/view_sponsor_notices'; ?>">View</a>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="<?php echo BASE_URL ?>public/images/clean.jpeg" id="card-img">
                </div>
                <h2>Beach Cleaning</h2>
                <p>2023-01-10</p>
                <a class="btn" href="<?php echo BASE_URL .'Sponsor/view_sponsor_notices'; ?>">View</a>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="<?php echo BASE_URL ?>public/images/donate.jpg" id="card-img">
                </div>
                <h2>Book Donation</h2>
                <p>2023-01-20</p>
                <a class="btn" href="<?php echo BASE_URL .'Sponsor/view_sponsor_notices'; ?>">View</a>
            </div>
        </section><br />

            <?php foreach ($projects as $project) {
                $pid = $project['P_ID'] ?>
                <div class="card">
                    <?php $sql2 = "SELECT Image FROM pr_image WHERE $pid = P_ID";
                    $result2 = mysqli_query($conn, $sql2);
                    while ($row = $result2->fetch_assoc()) {
                        $image = $row['Image']; ?>
                        <div class="card-image"><img id="cards" src="images/<?= $image ?>"></div>
                    <?php } ?>
                    <h2><?php echo ($project["Name"]); ?></h2>
                    <p><?php echo ($project["Date"]); ?></p>
                    <a class="btn" href="view_project_volunteer.php?pid=<?php echo $project['P_ID'] ?>">View</a>
                </div>
            <?php } ?>
        </section>
        <br />

        <h2>Suggested Projects</h2><br /><br />
        <section class="container">
            <?php foreach ($projects as $project) {
                $pid = $project['P_ID'] ?>
                <div class="card">
                    <?php $sql2 = "SELECT Image FROM pr_image WHERE $pid = P_ID";
                    $result2 = mysqli_query($conn, $sql2);
                    while ($row = $result2->fetch_assoc()) {
                        $image = $row['Image']; ?>
                        <div class="card-image"><img id="cards" src="images/<?= $image ?>"></div>
                    <?php } ?>
                    <h2><?php echo ($project["Name"]); ?></h2>
                    <p><?php echo ($project["Date"]); ?></p>
                    <a class="btn" href="view_project_volunteer.php?pid=<?php echo $project['P_ID'] ?>">View</a>
                </div>
            <?php } ?>
        </section>
        <br/>

        <h2>Sponsor Advertisements</h2><br /><br />
        <section class="container">
            <?php foreach ($ads as $ad) {
                $adid = $ad['AD_ID'];
                $sponsor = $ad['Sponsor'];
                $image = $ad['Image'];
            ?>
                <div class="card">
                        <div class="card-image"><img id="cards" src="images/<?= $image ?>"></div>
                    <?php $sql3 = "SELECT Name FROM sponsor WHERE $sponsor = U_ID";
                    $result3 = mysqli_query($conn, $sql3);
                    $row = $result3->fetch_assoc();
                    $sponsorname = $row['Name']; ?>
                    <h2><?php echo $sponsorname ?></h2>
                    <p><?php echo ($ad['Description']); ?></p><br />
                    <a class="btn" href="view_project_volunteer.php?pid=<?php echo $project['P_ID'] ?>">View</a>
                </div>
            <?php } ?>
        </section> -->
    </div>
</body>

</html>