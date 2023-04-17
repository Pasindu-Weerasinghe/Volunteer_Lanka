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
        <form action="<?php echo BASE_URL; ?>volunteer/search_project" method="post">
                <label>Filter By</label>
                <select id="filter" name="filter">
                    <option value="name">Project Name</option>
                    <option value="area">Interest Area</option>
                    <option value="date">Date</option>
                    <option value="location">Location</option>
                    <option value="organizer">Organizer</option>
                    <option value="completed">Completed Projects</option>
                    <option value="volunteers">Number of Volunteers</option>
                </select>
                <label>Enter your keyword</label><input type="text" name="key">
                <button name="search"><b>Search<b></button>
            </form>
        </div><br><hr><br>

        <h2>Search Results</h2><br /><br />
        <section class="container">
            <?php foreach ($this->projects as $project) {
                $pid = $project['P_ID'] ?>
                <div class="card">
                    <div class="card-image"><img id="card-img" src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $this->prImage[$pid][0]['Image'] ?>"></div>
                    <h2><?php echo ($project["Name"]); ?></h2>
                    <p><?php echo ($project["Date"]); ?></p>
                    <a class="btn" href="<?php echo BASE_URL ?>volunteer/view_projects/<?php echo $project['P_ID'] ?>">View</a>
                </div>
            <?php } ?>
        </section>

    </div>
</body>

</html>