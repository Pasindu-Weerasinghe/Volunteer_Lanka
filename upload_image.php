<?php 
require 'conn.php';
session_start();

if (isset($_REQUEST["request"])){

    $uid = $_SESSION['uid'];
    $description = $_POST['des'];
    $status = $_POST['status'];
    $sponsor = $_POST['sponsor'];
 
    $targetDir = "images/";
    $allowTypes = array('jpg','png','jpeg','gif');

    $query = "INSERT INTO advertisment (Description, status, sponsor) VALUES ('$description', '$status', '$sponsor')";
    $result = mysqli_query($conn, $query);

    $query2 = "SELECT AD_ID FROM advertisment WHERE U_ID = '$uid'";
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
            header ("Location: newideas_volunteer.php");
    }
    
}
?>