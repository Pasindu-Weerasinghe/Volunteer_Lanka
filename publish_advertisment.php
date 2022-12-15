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
    <title>Publish Advertisement</title>
</head>

<body>
    <div class="main" id="main">
        <h1>Publish Advertisement</h1><br />
        <p class="p1">You can publish your company's advertisement from here. It will be sent to our admins and get published after they accept</p> <br><br>
        <div class="container">
            <form action="publish_advertisment.php" method="post" enctype="multipart/form-data">

                <label for="photo"><b>Add Photos: <br></label><br>
                <input class="file1" type="file" name="file[]" multiple="multiple"><br><br><br><br>

                <label for="des"><b>Description: <br></label><br>
                <textarea class="des" name="comment" required></textarea><br/>
                <br><br><br>

               <div class="btn-area">
               <button class="btn1"><a href="home_sponsor.php">Cancel</a></button>
                <button class="btn2" name="request"><a href="publish_advertisment.php"></a>Publish</button>
               </div>
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
                        echo "<script> alert('The file " .$fileName. " has been uploaded successfully.'); </script>";
                    } else {
                        echo "<script> alert('File upload failed, please try again.'); window.location.href='publish_advertisment.php';</script>";
                    }
                }
            } else {
                echo "<script> alert('File upload failed, Only JPG, JPEG, PNG & GIF files are allowed to upload.'); window.location.href='publish_advertisment.php'; </script>";
            }
        }
    }
}
?>