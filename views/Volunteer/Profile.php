<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('Location: ' . BASE_URL);
}


$uid = $_SESSION['uid'];

$sql1 = "SELECT * FROM user WHERE U_ID='$uid'";
$result1 = mysqli_query($conn, $sql1);
$row1 = $result1->fetch_assoc();

$sql2 = "SELECT * FROM volunteer WHERE U_ID='$uid'";
$result2 = mysqli_query($conn, $sql2);
$row2 = $result2->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/profile_volunteer.css">
    <title>User Profile</title>
</head>

<body>
<?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <h2>Volunteer Profile</h2><br><br>
        <div class="container">
            <div class="column1">
                <img class="image" src="images/profile_pic.jpeg" /><br><br>
                <label class="sub2"> <?php echo $row2['Name']; ?></label><br><br>
                <label class="sub3">Projects Volunteered : 8</label>
            </div>
            <div class="column2"><br/>
            <button class="btnpw"> <a href="change_password.php" class="same">Change Password</a></button><br><br>
                <table>
                    <tr>
                        <td>User ID</td>
                        <td>:</td>
                        <td><?php echo $row1['U_ID']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $row1['Email'] ?></td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td>:</td>
                        <td><?php echo $row2['Contact']; ?></td>
                    </tr>
            <tr>
                <td>Interest Areas</td>
                <td>:</td>
                <td>Beach Cleaning, Tree Planting</td>
            </tr>    
            <tr>
                <td>Joined Organizations</td>
                <td>:</td>
                <td>Rotaract Club UOC</td>
            </tr>  
            </table>
            </div>
        </div>
    </div>
</body>

</html>