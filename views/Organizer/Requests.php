<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/cards.css">
    <title>Requests from Volunteers</title>
</head>

<body>
    <!-- navigation bar -->
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <h2>Project ideas from Volunteers</h2><br>
        <section class="container">
            <?php foreach ($this->pr_ideas as $idea) { ?>
                <div class="card">
                    <?php
                    $pi_id = $idea['PI_ID'];
                    ?>
                    <div id="volunteer">
                        <img src="<?php echo BASE_URL; ?>public/images/<?php echo $this->volunteer[$pi_id]['Photo'] ?: 'icon.jpg' ?>">
                        <div>
                            <h3><?php echo $this->volunteer[$pi_id]['Name']; ?></h3>
                        </div>
                    </div>

                    <div class="card-image">
                        <img id="card-img" src="<?php echo BASE_URL; ?>public/images/pi_images/<?php echo $this->pr_idea_images[$pi_id]; ?>" alt="">
                    </div>
                    <p>
                    <h2><?php echo $idea['Location'] ?></h2>
                    <a class="btn" href="<?php echo BASE_URL ?>organizer/view_pr_idea/<?php echo $pi_id ?>">View</a>
                </div>
                <br />
            <?php } ?>
        </section>

        <h2>Replied Ideas</h2><br>
        <section class="container">
            <?php foreach ($this->replied_ideas as $idea) { ?>
                <div class="card">
                    <?php
                    $pi_id = $idea['PI_ID'];
                    ?>
                    <div id="volunteer">
                        <img src="<?php echo BASE_URL; ?>public/images/<?php echo $this->volunteer[$pi_id]['Photo'] ?: 'icon.jpg' ?>">
                        <div>
                            <h3><?php echo $this->volunteer[$pi_id]['Name']; ?></h3>
                        </div>
                    </div>

                    <div class="card-image">
                        <img id="card-img" src="<?php echo BASE_URL; ?>public/images/pi_images/<?php echo $this->pr_idea_images[$pi_id]; ?>" alt="">
                    </div>
                    <p>
                    <h2><?php echo $idea['Location'] ?></h2>
                    <a class="btn" href="<?php echo BASE_URL ?>organizer/view_pr_idea/<?php echo $pi_id ?>/replied">View</a>
                </div>
                <br />
            <?php } ?>
        </section>
    </div>

</body>

</html>