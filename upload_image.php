<?php 
require 'conn.php';
session_start();

if (isset($_REQUEST["request"])){

    $uid = $_SESSION['uid'];
    $description = $_POST['comment'];
 
    $targetDir = "images/";
    $allowTypes = array('jpg','png','jpeg','gif');

    if (!empty($_FILES["file"]["name"])) {

        $total = count($_FILES['file']['name']);
        for ($i = 0; $i < $total; $i++) {
            $fileName = $_FILES['file']['name'][$i];
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            if(in_array($fileType, $allowTypes)){
                if(move_uploaded_file($_FILES["file"]["tmp_name"][$i], $targetFilePath)){
                    $query = "INSERT INTO advertisement (Description, Image, Status, Sponsor) VALUES ('".$description."', '".$fileName."','Pending', '".$uid."')";
                    $result = mysqli_query($conn, $query);

                    if($result){
                        // $statusMsg = "The file ".$fileName." has been uploaded successfully.";
                        echo "<script> alert('The file ".$fileName." has been uploaded successfully.'); </script>";
                        header("Location: publish_advertisment.php");
                    }else{
                        // $statusMsg = "File upload failed, please try again.";
                        echo "<script> alert('File upload failed, please try again.'); </script>";
                        header("Location: publish_advertisment.php");
                    } 
                }
            }
            else{
                // $statusMsg = 'File upload failed, Only JPG, JPEG, PNG & GIF files are allowed to upload.';
                echo "<script> alert('File upload failed, Only JPG, JPEG, PNG & GIF files are allowed to upload.'); </script>";
                //header("Location: publish_advertisment.php");
            }
        }
    }
    //echo $statusMsg;
    
}
?>
