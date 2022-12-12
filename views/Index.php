<?php
session_start();
if (isset($_SESSION['uid'])) {
    header('Location: ' . BASE_URL . $_SESSION['role']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/cards.css">
    <title>Volunteer Lanka</title>
</head>

<body>
    <?php include 'views/includes/navbar.php' ?>

    <div class="main" id="main">

        <section class="container">
            <div class="card">
                <div class="card-image card1">
                </div>
                <h2>Project Name</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum id non a similique atque aspernatur et.</p>
                <a class="btn" href="">READ MORE</a>
            </div>
            <div class="card">
                <div class="card-image card2">
                </div>
                <h2>Project Name</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum id non a similique atque aspernatur et.</p>
                <a class="btn" href="">READ MORE</a>
            </div>
            <div class="card">
                <div class="card-image card3">
                </div>
                <h2>Project Name</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum id non a similique atque aspernatur et.</p>
                <a class="btn" href="">READ MORE</a>
            </div>
        </section>
        <section class="container">
            <div class="card">
                <div class="card-image card1">
                </div>
                <h2>Project Name</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum id non a similique atque aspernatur et.</p>
                <a class="btn" href="">READ MORE</a>
            </div>
            <div class="card">
                <div class="card-image card2">
                </div>
                <h2>Project Name</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum id non a similique atque aspernatur et.</p>
                <a class="btn" href="">READ MORE</a>
            </div>
            <div class="card">
                <div class="card-image card3">
                </div>
                <h2>Project Name</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum id non a similique atque aspernatur et.</p>
                <a class="btn" href="">READ MORE</a>
            </div>
        </section>
        <section class="container">
            <div class="card">
                <div class="card-image card1">
                </div>
                <h2>Project Name</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum id non a similique atque aspernatur et.</p>
                <a class="btn" href="">READ MORE</a>
            </div>
            <div class="card">
                <div class="card-image card2">
                </div>
                <h2>Project Name</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum id non a similique atque aspernatur et.</p>
                <a class="btn" href="">READ MORE</a>
            </div>
            <div class="card">
                <div class="card-image card3">
                </div>
                <h2>Project Name</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum id non a similique atque aspernatur et.</p>
                <a class="btn" href="">READ MORE</a>
            </div>
        </section>
    </div>
</body>

</html>