<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('Location:' . BASE_URL);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/cards.css">
    <title>Sponserd Projects</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <br />
        <h2>Sponserd Projects</h2><br /><br />
        <section class="container">
            <?php foreach ($this->projects as $project) {
                $pid = $project['P_ID'] ?>
                <div class="card">
                    <div class="card-image">
                        <img id="card-img" src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $this->prImage[$pid][0]['Image'] ?>">
                    </div>
                    <h2><?php echo ($project["Name"]); ?></h2>
                    <p>Date: <?php echo ($project["Date"]); ?></p>
                    <p>Amount: <?php echo ($this->amounts[$pid]); ?></p>
                    <a class="btn" href="<?php echo BASE_URL ?>Sponsor/view_projects_sponsor/<?php echo $project['P_ID'] ?>">View</a>
                </div>
            <?php } ?>
        </section>
    </div>
</body>

</html>