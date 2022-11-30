<?php 

require 'conn.php';
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
}
include 'Navbar/navbar_log.php';

if (isset($_REQUEST["request"])){

    $uid = $_SESSION['uid'];
    $description = $_POST['des'];
 
    $targetDir = "images/";
    $allowTypes = array('jpg','png','jpeg','gif');

    $query = "INSERT INTO advertisement (Description, status, Sponsor) VALUES ('$description', 'pending', '$uid')";
    $result = mysqli_query($conn, $query);

    $query2 = "SELECT AD_ID FROM advertisement WHERE U_ID = '$uid'";
    $result2 = mysqli_query($conn, $query2);

    $row = mysqli_fetch_array($result2);
    $idea = $row['AD_ID'];
    print($idea);

    if (!empty($_FILES["file"]["name"])) {

        $total = count($_FILES['file']['name']);
        for ($i = 0; $i < $total; $i++) {
            $fileName = $_FILES['file']['name'][$i];
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            if(in_array($fileType, $allowTypes)){
                if(move_uploaded_file($_FILES["file"]["tmp_name"][$i], $targetFilePath)){
                    
                    $query3 = "INSERT into ad_image (AD_ID, Image) VALUES ('".$idea."','".$fileName."')";
                    $result3 = mysqli_query($conn, $query3);
                    if($result3){
                        $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                    }else{
                        $statusMsg = "File upload failed, please try again.";
                    } 
                }
            }else{
                $statusMsg = 'Only JPG, JPEG, PNG & GIF files are allowed to upload.';
            }
        }
    }
    echo $statusMsg;
    if ($result) {
            echo "<script> alert ('Request Sent!');</script>";
            header ("Location: publish_advertisment.php");
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/view.css">
    <title>Published Advertiesment</title>
</head>

<body>
    <div class="main" id="main">
    <h2>Published Advertiesment</h2><br />
    <p>You can publish your company's adverisement from here. It will be sent to our admins and get published after they accept</p> <br />


    <p><strong>Upload Advertiesment</strong> </p2><br />

    <div class="container-image">
        <div class="vertically-center">

            <form name="from_file_upload" action="upload.php" method="post" enctype="multipart/form-data">
                <div class="">
                    <input type="file" name="upload_file">
                </div>
            </form>

        </div>

        <img src="cards/img1.jpg">
    </div>
            <?php 
                $idea = $request["AD_ID"];
                $sql2 = "SELECT Image FROM ad_image WHERE $idea = AD_ID";
                echo $uid;
                $result2 = mysqli_query($conn, $sql2);
                while($row = $result2->fetch_assoc()) { 
                    $image = $row['Image'];
            ?>
                <img src="images/<?= $image?>">
                <?php } ?>
    <br>
    <p><strong>Description</strong><textarea rows="10" cols="70" name="comment" placeholder="Enter here!"></textarea> </p2><br />
    <div class="silver">

    </div>
    <div>
        <br><br><br><br><br>
        <button class="btn1"><a href="publish_advertisment.php">Cancel</a></button>
        <button class="btn2"><a href="publish_advertisment.php">Send Request</a></button>
    </div>


    </div>
</body>

</html>