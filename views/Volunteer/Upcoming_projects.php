<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/cards.css">
    <title>My Projects</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div id="main" class="main">
        <div class="search-container">
            <input type="text" name="search">
            <button name="search"><b>Search<b></button>
        </div><br>
        <h2>My Upcoming Projects</h2><br /><br />
        <section class="container">
            <?php foreach ($this->uprojects as $uproject) {
                $pid = $uproject['P_ID'] ?>
                <div class="card">
                    <div class="card-image"><img id="card-img" src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $this->prImage[$pid][0]['Image'] ?>"></div>
                    <h2><?php echo ($uproject["Name"]); ?></h2>
                    <p><?php echo ($uproject["Date"]); ?></p>
                    <a class="btn" href="<?php echo BASE_URL ?>volunteer/view_projects/<?php echo $uproject['P_ID'] ?>">View</a>
                </div>
            <?php } ?>
        </section>
    </div>
</body>

</html>