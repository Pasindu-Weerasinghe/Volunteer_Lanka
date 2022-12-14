<?php
require 'conn.php';
session_start();

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
}
include 'Navbar/navbar_log.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/publish_advertisement.css">
    <title>Publish Advertiesment</title>
</head>

<body>
    <div class="main" id="main">
        <h1>Publish Advertiesment</h1><br />
        <p class="p1">You can publish your company's adverisement from here. It will be sent to our admins and get published after they accept</p> <br><br>
<<<<<<< HEAD
        <div class="content">
            <form action="publish_advertisment.php" method="post" enctype="multipart/form-data">
=======
        <div class="container">
            <form action="upload_image.php" method="post" enctype="multipart/form-data">

>>>>>>> f3a24957d5ea45d0ae99431785d5a8ccb9edfbdf
                <label for="photo"><b>Add Photos: <br></label>
                <input class="file1" type="file" name="file[]" multiple="multiple"><br><br><br><br>

                <label for="des"><b>Description: <br></label>
<<<<<<< HEAD
                <textarea class="des" name="comment" required></textarea> </p2><br />
=======
                <textarea class="des" name="comment" required></textarea><br/>
>>>>>>> f3a24957d5ea45d0ae99431785d5a8ccb9edfbdf
                <br><br><br>

                <button class="btn1"><a href="home_sponsor.php">Cancel</a></button>
                <button class="btn2" name="request"><a href="publish_advertisment.php"></a>Publish</button>
                
            </form>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_REQUEST["request"])) {

    $uid = $_SESSION['uid'];
    $description = $_POST['comment'];

    $targetDir = "images/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

    if (!empty($_FILES["file"]["name"])) {

        $total = count($_FILES['file']['name']);
        for ($i = 0; $i < $total; $i++) {
            $fileName = $_FILES['file']['name'][$i];
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $targetFilePath)) {
                    $query = "INSERT INTO advertisement (Description, Image, Status, Sponsor) VALUES ('" . $description . "', '" . $fileName . "','Pending', '" . $uid . "')";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        echo "<script> alert('The file " . $fileName . " has been uploaded successfully.'); </script>";
                    } else {
                        echo "<script> alert('File upload failed, please try again.'); </script>";
                    }
                }
            } else {
                echo "<script> alert('File upload failed, Only JPG, JPEG, PNG & GIF files are allowed to upload.'); </script>";
            }
        }
    }
}
?>