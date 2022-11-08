<?php include 'Navbar/navbar.php' ?>
<?php include 'conn.php' ?>

<?php
    $sql = "SELECT P_ID, Name, Date FROM project";
    $result = mysqli_query($conn, $sql);
    $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cards/cards.css">
    <title>Home</title>
</head>
<body>
    <br/><h2>Upcoming Projects</h2><br/><br/>
    <section class="container">
        <?php foreach ($projects as $project){ ?>
            <div class="card">
            <div class="card-image card1">
            </div>
            <h2><?php echo ($project["Name"]); ?></h2>
            <p><?php echo ($project["Date"]); ?></p>
            <a class="btn" href="view_project_volunteer.php?pid=<?php echo $project['P_ID']?>">View</a>
            </div>
        <?php } ?>
    </section>
    <br/>
    <hr><br/>
        
    <h2>Suggested Projects</h2><br/><br/>
    <section class="container">
        <?php foreach ($projects as $project){ ?>
            <div class="card">
            <div class="card-image card1">
            </div>
            <h2><?php echo htmlspecialchars($project["Name"]); ?></h2>
            <p><?php echo htmlspecialchars($project["Date"]); ?></p>
            <a class="btn" href="view_project_volunteer.php?pid=<?php echo $project['P_ID']?>">View</a>
            </div>
        <?php } ?>
    </section>

</body>
</html>