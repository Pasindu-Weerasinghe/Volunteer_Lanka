<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/cards.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/chat-icon.css">
    <script src="<?php echo BASE_URL; ?>public/scripts/users.js" async></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home</title>
</head>

<body>

<?php include 'views/includes/navbar_log.php'; ?>

<div class="main" id="main">

    <div class="search-container">
        <input type="text" name="search">
        <button name="search"><b>Search<b></button>
    </div>
    <br>


    <h2>Upcoming Projects</h2><br/><br/>
    <section class="container">
        <?php foreach ($this->projects as $project) {
            $pid = $project['P_ID'] ?>
            <div class="card">
                <div class="card-image">
                    <img id="card-img" src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $this->prImage[$pid][0]['Image'] ?>">
                </div>
                <h2><?php echo($project["Name"]); ?></h2>
                <p><?php echo($project["Date"]); ?></p>
                <a class="btn"
                   href="<?php echo BASE_URL ?>organizer/view_projects/<?php echo $project['P_ID'] ?>">View</a>
            </div>
        <?php } ?>
    </section>
    <br/>

    <h2>Completed Projects</h2><br/><br/>
    <section class="container">
        <?php foreach ($this->projects as $project) {
            $pid = $project['P_ID'] ?>
            <div class="card">
                <div class="card-image">
                    <img id="card-img" src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $this->prImage[$pid][0]['Image'] ?>">
                </div>
            <?php } ?>
        </section>
        <br />
    
    
    
    
    </div>
    <?php include 'views/includes/chat_icon.php'; ?>

</body>

</html>