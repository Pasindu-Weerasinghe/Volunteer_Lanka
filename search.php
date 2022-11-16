<?php 
require 'conn.php';
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
}
require 'Navbar/navbar_log.php';

    $sql = "SELECT * FROM organizer";
    $result = mysqli_query($conn, $sql);
    $organizers = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/search.css">
    <title>Search</title>
</head>
<body>
<div id="main" class="main">
        <div class="search-container">
                <br/><input type="text" name="search">
                <button name="search"><b>Search<b></button>
        </div><br/><br/><br/>
        <table>
            <tr>
                <th>Organizer</th>
                <th>Branch</th>
                <th>Contact Number</th>
            </tr>
            <?php foreach ($organizers as $organizer){ ?> 
            <tr>
                <td><?php echo ($organizer["Name"]); ?></td>
                <td><?php echo ($organizer["Branch"]); ?></td>
                <td><?php echo ($organizer["Contact"]); ?></td>
            </tr>
            <?php }?>
        </table>
</div>
</body>
</html>






