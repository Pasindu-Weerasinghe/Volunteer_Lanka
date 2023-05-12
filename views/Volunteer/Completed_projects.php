<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/cards.css">
    <title>Completed Projects</title>

    <script type="text/javascript">
        function buttonAdd($i) {
            if ($i == 1) {
                document.getElementById("add").innerHTML = "View";
            } else {
                document.getElementById("right").innerHTML = "Add Feedback";
            }
        }
    </script>

</head>

<body>

    <?php include 'views/includes/navbar_log.php'; ?>
    <div id="main" class="main">
        <div class="search-container">
            <input type="text" name="search">
            <button name="search"><b>Search<b></button>
        </div><br>
        <h2>Completed Projects</h2><br /><br />
        <h3>Provide your valuable feedback for the projects you participated</h3>
        <h3><?php print_r($this->feedbackGiven) ?></h3>
        <section class="container">
            <?php foreach ($this->projects as $project) {
                $pid = $project['P_ID'];
                if($this->feedbackGiven[$pid]==1) {
                    $btnmessage = "View";
                } else {
                    $btnmessage = "Add Feedback";
                }?>
                <div class="card">
                    <div class="card-image"><img id="card-img" src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $this->prImage[$pid][0]['Image'] ?>"></div>
                    <h2><?php echo ($project["Name"]); ?></h2>
                    <p><?php echo ($project["Date"]); ?></p>
                    <a class="btn" href="<?php echo BASE_URL ?>volunteer/feedback/<?php echo $this->feedbackGiven[$pid]?>/<?php echo $project['P_ID'] ?>/<?php echo $project['U_ID'] ?>" id="add"><?php echo $btnmessage?></a>
                </div>
            <?php } ?>
        </section>
    </div>
</body>

</html>