<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--navbar links-->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/navbar_log.css">
    <script defer src="<?php echo BASE_URL; ?>public/scripts/navbar.js"></script>
    <!--------------------------------------------------------------------------->

    <!--sidenav links-->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/sidenav.css">
    <script defer src="<?php echo BASE_URL; ?>public/scripts/sidenav.js"></script>
    <!--------------------------------------------------------------------------->

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/cards.css">
    <title>Upcoming Projects</title>
</head>

<body>
    <!-- navigationb bar -->
    <?php include 'views/includes/navbar_log.php'; ?>

    <div class="main" id="main">
    <h2>Upcoming Projects</h2><br /><br />
        <section class="container">
            <?php foreach ($this->projects as $project) {
                $pid = $project['P_ID'] ?>
                <div class="card">
                <div class="card-image"><img id="card-img" src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $this->prImage[$pid][0]['Image']?>"></div>
                    <h2><?php echo ($project["Name"]); ?></h2>
                    <p><?php echo ($project["Date"]); ?></p>
                    <a class="btn" href="organizer/view_projects/<?php echo $project['P_ID'] ?>">View</a>
                </div>
            <?php } ?>
        </section>
        <br />

    </div>

</body>

</html>