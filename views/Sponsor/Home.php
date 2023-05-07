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
    <?php include 'views/includes/navbar_log.php'
    ;
    print_r($this->spProjects);
    ?>

    <div class="main" id="main">
        <div class="search-container">
            <br /><input type="text" name="search">
            <button name="search"><b>Search<b></button>
        </div><br>
        <h2>My sponsored Project</h2><br><br>

        <section class="container">
            <?php foreach ($this->spProjects as $spProject) {
                $pid = $spProject['P_ID'];
            ?>
                <div class="card">
                    <div class="card-image">
                        <img id="card-img" src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $this->prImages[$pid][0]['Image'] ?>">
                    </div>

                    <h2><?php echo ($spProject["Name"]); ?></h2>
                    <p>Date: <?php echo ($spProject["Date"]); ?></p> 
                    <p>Total: <?php echo ($this->prices[$pid]['Amount']); ?></p>

                    <a class="btn" href="<?php echo BASE_URL ?>Sponsor/view_sponsor_project/<?php echo $spProject['P_ID'] ?>">View</a>

                </div>
            <?php } ?>
        </section>

        <h2>Sponsor Notices</h2><br><br>

        <section class="container">
            <?php foreach ($this->projectsNs as $projectNs) {
                $pid = $projectNs['P_ID'];
            ?>
                <div class="card">
                    <div class="card-image">
                        <img id="card-img" src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $this->prImages[$pid][0]['Image'] ?>">
                    </div>
                    <h2><?php echo ($projects["Name"]); ?></h2>
                    <p>Date: <?php echo ($projects["Date"]); ?></p>
                    <p>Total: <?php echo ($this->prices[$pid]['Amount']); ?></p>
                    <a class="btn" href="<?php echo BASE_URL ?>Sponsor/view_sponsor_notice/<?php echo $projectNs['P_ID'] ?>">View</a>
                </div>
            <?php } ?>
        </section>
    </div>

    <?php include 'views/includes/footer.php'; ?>
</body>

</html>