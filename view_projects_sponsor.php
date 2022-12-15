<?php
require 'conn.php';
session_start();

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
}
include 'Navbar/navbar_log.php';
$P_ID = $_GET['pid'];
$sql1 = "SELECT Name, Date, Time, Venue, Description, No_of_volunteers FROM project WHERE P_ID='" . $P_ID . "'";
$result1 = mysqli_query($conn, $sql1);
// output data of each row
while ($row1 = $result1->fetch_assoc()) {
    $Name = $row1['Name'];
    $Date = $row1['Date'];
    $Time = $row1['Time'];
    $Venue = $row1['Venue'];
    $No_of_volunteers = $row1['No_of_volunteers'];
    $Description = $row1['Description'];
}

$sql2 = "SELECT Image FROM pr_image WHERE P_ID='$P_ID'";
$result2 = mysqli_query($conn, $sql2);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/view.css">
    <title><?php echo ($Name) ?></title>
</head>

<body>
    <div class="main" id="main">
        <h2><?php echo ($Name) ?></h2><br /><br />
        <div class="container">
            <div class="container-image">
                <?php
                if (mysqli_num_rows($result2) > 0) {
                    while ($row2 = $result2->fetch_assoc()) {
                        $image = $row2['Image'] ?>
                        <img src="images/<?php echo $image ?>"><br><br>
                <?php }
                } ?>
            </div>
            <div class="wrapper">
                <div class="left-div">
                    <label for="">Date</label><br>
                    <label for="">Time</label><br>
                    <label for="">Venue</label><br>
                    <label for="">Number of Volunteers</label><br>
                    <label for="">Description</label><br>
                </div>

                <div class="right-div">
                    <label id="data"><?php echo ($Date) ?></label><br>
                    <label id="data"><?php echo ($Time) ?></label><br>
                    <label id="data"><?php echo ($Venue) ?></label><br>
                    <label id="data"><?php echo ($No_of_volunteers) ?></label><br>
                    <label id="data"><?php echo ($Description) ?></label><br>
                </div>
            </div>
            <div class="btn-area">
                <button onclick="history.back()" class="btn">Back</button>
                <button type="submit" name="next" class="btn" id="join">Join</button>
            </div>
        </div>
    </div>

</body>

</html>