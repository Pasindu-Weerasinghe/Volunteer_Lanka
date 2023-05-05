<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include 'views/includes/head-includes.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/cards.css">
    <title>Completed Projects</title>
</head>

<body>
<!-- navigation bar -->
<?php include 'views/includes/navbar_log.php'; ?>

<div class="main" id="main">
    <h2>Completed Projects</h2>

    <section class="container">
        <?php foreach ($this->projects as $project) {
            $pid = $project['P_ID'] ?>
            <div class="card">
                <div class="card-image">
                    <img id="card-img"
                         src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $this->prImage[$pid][0]['Image'] ?>">
                </div>
                <h2><?php echo($project["Name"]); ?></h2>
                <p><?php echo($project["Date"]); ?></p>
                <a class="btn" href="<?php echo BASE_URL ?>organizer/view_completed_project/<?php echo $project['P_ID'] ?>">Add to Blog</a>
            </div>
        <?php } ?>
    </section>
    <br/>
</div>

</body>

</html>