<?php 
require 'conn.php';
session_start();

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
}
include 'Navbar/navbar_log.php';
session_start();
    $P_ID= $_SESSION['pid'];
    $sql1 = "SELECT Name, Date, Time, Venue, Description, No_of_volunteers FROM project WHERE P_ID='".$P_ID."'";
    $result1 = mysqli_query($conn, $sql1);
        // output data of each row
        while($row1 = $result1->fetch_assoc()) {
            $Name = $row1['Name'];
            $Date = $row1['Date'];
            $Time = $row1['Time'];
            $Venue = $row1['Venue'];
            $No_of_volunteers = $row1['No_of_volunteers'];
            $Description = $row1['Description'];
        }

    $sql2 = "SELECT Image FROM pr_image WHERE P_ID='".$P_ID."'";
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
    <h2><?php echo ($Name) ?></h2><br/><br/>
    <div class="container">
        <div class="container-image">    
        <?php 
            if (mysqli_num_rows($result2)>0) {
                while($row2 = $result2->fetch_assoc()) { 
                    $image = $row2['Image']?>
                    <div class="item"><img src="images/<?php echo $image ?>"></div>
                <?php }
            }?>    
        </div>
        <table>
            <tr>
                <td>Date</td>
                <td>:</td>
                <td><?php echo ($Date) ?></td>
            </tr>
            <tr>
                <td>Time</td>
                <td>:</td>
                <td><?php echo ($Time) ?></td>
            </tr>
            <tr>
                <td>Venue</td>
                <td>:</td>
                <td><?php echo ($Venue) ?></td>
            </tr>
            <tr>
                <td>Number of Volunteers</td>
                <td>:</td>
                <td><?php echo ($No_of_volunteers) ?></td>
            </tr>
            <tr>
                <td>Description</td>
                <td>:</td>
                <td><?php echo ($Description) ?></td>
            </tr>
        </table>
    </div>
    
    <button class="btn1"><a href="login.php">Back</a></button>
    <button class="btn2"><a href="#">Join</a></button>

</div>

</body>

</html>