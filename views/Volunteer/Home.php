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
    <div id="main" class="main">
        <div class="search-container">
            <input type="text" name="search">
            <button name="search"><b>Search<b></button>
        </div><br>

        <h2>Upcoming Projects</h2><br /><br />
        <section class="container">
            <?php foreach ($this->projects as $project) {
                $pid = $project['P_ID'] ?>
                <div class="card">
                <div class="card-image"><img id="card-img" src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $this->prImage[$pid][0]['Image']?>"></div>
                    <h2><?php echo ($project["Name"]); ?></h2>
                    <p><?php echo ($project["Date"]); ?></p>
                    <a class="btn" href="<?php echo BASE_URL ?>volunteer/view_projects/<?php echo $project['P_ID'] ?>">View</a>
                </div>
            <?php } ?>
        </section>
        <br />

        <h2>Suggested Projects</h2><br /><br />
        <section class="container">
            <?php foreach ($this->projects as $project) { 
                $pid = $project['P_ID']; ?>
                <div class="card">
                    <div class="card-image"><img id="card-img" src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $this->prImage[$pid][0]['Image']?>"></div>
                    <h2><?php echo ($project["Name"]); ?></h2>
                    <p><?php echo ($project["Date"]); ?></p>
                    <a class="btn" href="<?php echo BASE_URL ?>volunteer/view_projects/<?php echo $project['P_ID'] ?>">View</a>
                </div>
            <?php } ?>
        </section>
        <br />

        <h2>Sponsor Advertisements</h2><br /><br />
        <section class="container">
            <?php foreach ($this->ads as $ad) { 
                $adid = $ad['AD_ID']?>
                <div class="card">
                    <div class="card-image"><img id="card-img" src="<?php echo BASE_URL ?>public/images/<?php echo $this->adImage[$adid][0]['Image']?>"></div>
                    <h2><?php echo ($this->sponsor['Name']); ?></h2>
                    <p><?php echo ($ad["Description"]); ?></p>
                    <a class="btn" href="volunteer/view_projects/<?php echo $project['P_ID'] ?>">View</a>
                </div>
            <?php } ?>
        </section>
        
        <br />

    </div>
</body>

</html>