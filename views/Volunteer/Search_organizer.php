<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('Location: ' . BASE_URL);
}

// $sql = "SELECT * FROM organizer";
// $result = mysqli_query($conn, $sql);
// $organizers = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/search.css">
    <title>Search</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>

    <div id="main" class="main">
        <div class="search-container">
            <input type="text" name="search">
            <button name="search"><b>Search<b></button>
        </div><br><br>
        <table>
            <tr>
                <th>Organizer</th>
                <th>Branch</th>
                <th>Contact Number</th>
            </tr>
            <?php foreach ($this->organizers as $organizer) { ?>
                <tr>
                    <td><?php echo ($organizer["Name"]); ?></td>
                    <td><?php echo ($organizer["Branch"]); ?></td>
                    <td><?php echo ($organizer["Contact"]); ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>