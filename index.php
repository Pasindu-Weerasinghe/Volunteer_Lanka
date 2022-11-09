<?php include 'Navbar/navbar.php';
include 'conn.php'; ?>

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
    <title>Volunteer Lanka</title>
</head>
<body>
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
</body>
</html>
