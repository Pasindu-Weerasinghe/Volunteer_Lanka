<?php 
require 'conn.php';
session_start();

if (isset($_REQUEST["request"])){

    $uid = $_SESSION['uid'];
    $description = $_POST['comment'];
 
    $targetDir = "images/";
    $allowTypes = array('jpg','png','jpeg','gif');

    // $query2 = "SELECT AD_ID FROM advertisement WHERE Sponsor = '".$uid."'";
    // $result2 = mysqli_query($conn, $query2);
    // $row = mysqli_fetch_array($result2);
    // $add = $row['AD_ID'];

    if (!empty($_FILES["file"]["name"])) {

        $total = count($_FILES['file']['name']);
        for ($i = 0; $i < $total; $i++) {
            $fileName = $_FILES['file']['name'][$i];
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            if(in_array($fileType, $allowTypes)){
                if(move_uploaded_file($_FILES["file"]["tmp_name"][$i], $targetFilePath)){
                    $query = "INSERT INTO advertisement (Description, Image, Status, Sponsor) VALUES ('$description', '$fileName','Pending', '$uid')";
                    $result = mysqli_query($conn, $query);

                    if($result){
                        $statusMsg = "The file ".$fileName." has been uploaded successfully.";
                        header("Location: publish_advertisment.php");
                    }else{
                        $statusMsg = "File upload failed, please try again.";
                        header("Location: publish_advertisment.php");
                    } 
                }
            }
            else{
                $statusMsg = 'File upload failed, Only JPG, JPEG, PNG & GIF files are allowed to upload.';
                header("Location: publish_advertisment.php");
            }
        }
    }
    echo $statusMsg;
}
