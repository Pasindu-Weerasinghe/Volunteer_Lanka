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

    <div class="main">

        <h2>Upcoming Projects</h2><br /><br />
        <section class="container">
            <div class="card">
                <div class="card-image card1">
                </div>
                <h2>Project Name</h2>
                <a class="btn" href="">View</a>
            </div>
            <div class="card">
                <div class="card-image card2">
                </div>
                <h2>Project Name</h2>
                <a class="btn" href="">View</a>
            </div>
            <div class="card">
                <div class="card-image card3">
                </div>
                <h2>Project Name</h2>
                <a class="btn" href="">View</a>
            </div>
        </section><br />
        <hr><br />
        <h2>Completed Projects</h2><br /><br />
        <section class="container">
            <div class="card">
                <div class="card-image card1">
                </div>
                <h2>Project Name</h2>
                <a class="btn" href="">View</a>
            </div>
            <div class="card">
                <div class="card-image card2">
                </div>
                <h2>Project Name</h2>
                <a class="btn" href="">View</a>
            </div>
            <div class="card">
                <div class="card-image card3">
                </div>
                <h2>Project Name</h2>
                <a class="btn" href="">View</a>
            </div>
        </section>
        
    </div>

</body>

</html>