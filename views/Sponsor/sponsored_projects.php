<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/cards.css">
    <title>Sponserd Projects</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <br />
        <h2>Sponserd Projects</h2><br /><br />
        <section class="container">
            <?php foreach ($this->sponsored_projects as $spProject) {
                $pid = $spProject['P_ID'];
            ?>
                <div class="card">
                    <div class="card-image">
                        <img id="card-img" src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $this->prImage[$pid][0]['Image'] ?>">
                    </div>

                    <h2><?php echo ($spProject["Name"]); ?></h2>
                    <p>Date: <?php echo ($spProject["Date"]); ?></p>
                    <p><?php echo ucfirst($spProject['Package']) ?>: <?php echo ($spProject['Amount']); ?></p>

                    <a class="btn" href="<?php echo BASE_URL ?>Sponsor/view_sponsor_project/<?php echo $pid ?>">View</a>

                </div>
            <?php } ?>
        </section>
    </div>
    <?php include 'views/includes/footer.php'; ?>
</body>

</html>