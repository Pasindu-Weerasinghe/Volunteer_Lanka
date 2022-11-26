<?php
include 'conn.php';
session_start();
$uid=$_SESSION['uid'];
$sql1 = "select * from sponsor where U_ID='".$uid."'";

$result=mysqli_query($conn,$sql1);


if(mysqli_num_rows($result)>0 ){
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="" text="text/css">
        <title>Sponsor</title>
    </head>
  
    <body>
        <?php
                while($row1 = mysqli_fetch_assoc($result))
            {
        ?>

            <h1 class="head1"><img src="./petro.jpg" height="60" width="140"><label class="sub2">Hi <?php echo $row1['U_ID'];?></label></h1>
            <div class="sub">
                <div class="row">
                    <div class="column1">
                    <img class="image"src="./profile1.jpg" alt="a cat staring at you" height="190" width="190"/><br><br>
                    <div class="but1">
                        <button type="submit"><a href="change_password.php" class="same">Change Password</a></button><br><br>
                    </div>
                    </div>
                    <div class="column">
                            <label>User Account Details</label><br><br>
                            <label class="textarea">User ID:<?php echo $row1['U_ID'];?></label><br><br>
                            <label class="textarea">Name:<?php echo $row1['Name'];?> </label><br><br>
                            <label class="textarea">Contact No:<?php echo $row1['Contact'];?> </label><br><br>
                            <label class="textarea">Email:<?php echo $row1['Email'];?></label><br><br>
                            <label class="textarea">Role:<?php echo $row1['Role'];?></label><br><br>
                            <label class="textarea">Password:<input type="password" value="<?php echo $row1['password']; ?>" id="myInput" readonly="readonly" style="width:25%">&nbsp;<input type="checkbox" onclick="myFunction()"></label>
                </div>
            </div>
                <?php
            }
        ?>
        <button type="submit"><a href="home.php" class="same">Back</a></button>
        <button type="submit" class="logout"><a href="login.php" class="same">Logout</a></button>
         </div>
    </body>
</html>
