<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include 'views/includes/head-includes.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/cards.css">
    <title>Home</title>
</head>

<body>

<?php include 'views/includes/navbar_log.php'; ?>

<div class="main" id="main">

    <h2>Upcoming Projects</h2><br/><br/>
    <section class="container">
        <?php foreach ($this->upcoming_projects as $project) {
            $pid = $project['P_ID'] ?>
            <div class="card">
                <div class="card-image">
                    <img id="card-img"
                         src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $this->prImage[$pid] ?>">
                </div>
                <h2><?php echo($project["Name"]); ?></h2>
                <p><?php echo($project["Date"]); ?></p>
                <a href="<?php echo BASE_URL ?>organizer/view_upcoming_project/<?php echo $project['P_ID'] ?>">
                    <button>View</button>
                </a>
            </div>
        <?php } ?>
    </section>
    <br/>

    <h2>Completed Projects</h2><br/><br/>
    <section class="container">
        <?php foreach ($this->upcoming_projects as $project) {
            $pid = $project['P_ID'] ?>
            <div class="card">
                <div class="card-image">
                    <img id="card-img"
                         src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $this->prImage[$pid] ?>">
                </div>
                <h2><?php echo($project["Name"]); ?></h2>
                <p><?php echo($project["Date"]); ?></p>
                <a href="<?php echo BASE_URL ?>volunteer/view_projects/<?php echo $project['P_ID'] ?>">
                    <button>View</button>
                </a>
            </div>
        <?php } ?>
    </section>
    <br/>

</div>

</body>

</html>