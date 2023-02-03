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

    <div class="main" id="main"
    >

        <div class="search-container">
            <input type="text" name="search">
            <button name="search"><b>Search<b></button>
        </div>
        <br>

        <h2>Upcoming Projects</h2><br /><br />
        <section class="container">
            <div class="card">
                <div class="card-image">
                    <img src="<?php echo BASE_URL ?>public/images/tree.jpg" id="card-img">
                </div>
                <h2>Tree Planting</h2>
                <p>2022-12-30</p>
                <a class="btn" href="<?php echo BASE_URL . 'organizer/view_project/' . $pid; ?>">View</a>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="<?php echo BASE_URL ?>public/images/clean.jpeg" id="card-img">
                </div>
                <h2>Beach Cleaning</h2>
                <p>2023-01-10</p>
                <a class="btn" href="<?php echo BASE_URL . 'organizer/view_project/' . $pid; ?>">View</a>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="<?php echo BASE_URL ?>public/images/donate.jpg" id="card-img">
                </div>
                <h2>Book Donation</h2>
                <p>2023-01-20</p>
                <a class="btn" href="<?php echo BASE_URL . 'organizer/view_project/' . $pid; ?>">View</a>
            </div>
        </section><br />
        <h2>Completed Projects</h2><br /><br />
        <section class="container">
            <div class="card">
                <div class="card-image">
                    <img src="<?php echo BASE_URL ?>public/images/tree.jpg" id="card-img">
                </div>
                <h2>Tree Planting</h2>
                <p>2022-12-30</p>
                <a class="btn" href="<?php echo BASE_URL . 'organizer/view_project/' . $pid; ?>">View</a>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="<?php echo BASE_URL ?>public/images/clean.jpeg" id="card-img">
                </div>
                <h2>Beach Cleaning</h2>
                <p>2023-01-10</p>
                <a class="btn" href="<?php echo BASE_URL . 'organizer/view_project/' . $pid; ?>">View</a>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="<?php echo BASE_URL ?>public/images/donate.jpg" id="card-img">
                </div>
                <h2>Book Donation</h2>
                <p>2023-01-20</p>
                <a class="btn" href="<?php echo BASE_URL . 'organizer/view_project/' . $pid; ?>">View</a>
            </div>
        </section>
    </div>

</body>

</html>