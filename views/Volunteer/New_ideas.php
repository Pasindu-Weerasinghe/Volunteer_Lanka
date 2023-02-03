<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('Location: ' . BASE_URL);
}


// $uid = $_SESSION['uid'];

//     $sql = "SELECT PI_ID, Location, Description FROM pr_ideas WHERE $uid = U_ID";
//     $result = mysqli_query($conn, $sql);
//     $requests = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/request.css">
    <title>New Ideas</title>
</head>
<body>
<?php include 'views/includes/navbar_log.php'; ?>
<div id="main" class="main">
        <h2>Requests sent by you to organize projects</h2>
        <button class="new"><a href="<?php echo BASE_URL ?>volunteer/request_projects"><b>New Request</b></a></button>
        <br/><br/><br/><br/>
        <table>
            <tr>
                <th>Location</th>
                <th>Description</th>
                <th>Images</th>
            </tr>
            <?php foreach ($this->pr_ideas as $idea) { ?> 
                <tr>
                    <td><?php echo $idea['Location']; ?></td>
                    <td><?php echo $idea['Description']; ?></td>
                    <td>
                    <?php foreach ($this->pr_idea_images[$idea['PI_ID']] as $images) { ?>
                        <img src="<?php echo BASE_URL; ?>public/images/pi_images/<?php echo $images['Image']; ?>">
                    <?php } ?>
                    
                    </td>
                </tr>
            <?php } ?>
        </table>
</div>
</body>
</html>
