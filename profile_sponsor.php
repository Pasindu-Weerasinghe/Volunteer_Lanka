<?php
include 'conn.php';
session_start();
$pump_id=$_SESSION['pump_id'];
$sql = "select * from user where U_ID='47'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
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
                while($row = mysqli_fetch_assoc($result))
            {
        ?>

            <h1 class="head1"><img src="./petro.jpg" height="60" width="140"><label class="sub2">Hi <?php echo $row['U_ID'];?></label></h1>
            <div class="sub">
                <div class="row">
                    <div class="column1">
                    <img class="image"src="./profile1.jpg" alt="a cat staring at you" height="190" width="190"/><br><br>
                    <div class="but1">
                        <button type="submit"><a href="working.php" class="same">Pumping History</a></button><br><br><br>
                        <button type="submit"><a href="change_password.php" class="same">Change Password</a></button><br><br>
                    </div>
                    </div>
                    <div class="column">
                            <label>User Account Details</label><br><br>
                            <label class="textarea">Pumper ID:<?php echo $row['U_ID'];?></label><br><br>
                            <label class="textarea">Name:<?php echo $row['Email'];?> <?php echo $row['Last_name'];?></label><br><br>
                            <label class="textarea">Email:<?php echo $row['Role'];?></label><br><br>
                            <label class="textarea">Password:<input type="password" value="<?php echo $row['password']; ?>" id="myInput" readonly="readonly" style="width:25%">&nbsp;<input type="checkbox" onclick="myFunction()"></label>
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
